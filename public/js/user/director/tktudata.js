$(function(){
	var $table = $('#tdbooking').DataTable({
		"processing": true,
		"select": {
			style: 'os',
			selector: 'tr'
		},
		"responsive": true,
		"serverSide": true,
		"ajax": '/tong-ket/booking/data/'+year+'/'+month,
		"dom": 'Bfrtip',
		"buttons": ['excel'],
		columns: [
			{data: 'mschuyen', name: 'mschuyen', orderable: false, searchable: false},
			{data: 'loaihang', name: 'dntungs.loaihang'},
			{data: 'khang', name: 'dntungs.khang' },
			{data: 'tuyenduong', name: 'dntungs.tuyenduong'},
			{data: 'nxchay', name: 'q_t_conts.nxchay'},
			{data: 'bsxe', name: 'q_t_conts.bsxe'},
			{data: 'lxe', name: 'q_t_conts.lxe'},
			{data: 'scont', name: 'q_t_conts.scont'},
			{data: 'ccont', name: 'q_t_conts.ccont'},
			{data: 'lcont', name: 'q_t_conts.lcont'},
			{data: 'bill', name: 'dntungs.bill'},
			{data: 'khachhang', name: 'dntungs.khachhang'},
			{data: 'nxe', name: 'q_t_conts.nxe'},
			{data: 'pnha', name: 'q_t_conts.pnha', render: $.fn.dataTable.render.number('.',',',0,'', '')},
			{data: 'pnhaVAT', name: 'pnhaVAt', searchable: false, orderable: false, render: $.fn.dataTable.render.number('.',',',0,'', '')},
			{data: 'khquan', name: 'q_t_conts.khquan', render: $.fn.dataTable.render.number('.',',',0,'', '')},
			{data: 'cxe', name: 'q_t_conts.cxe', render: $.fn.dataTable.render.number('.',',',0,'', '')},
			{data: 'cgui', name: 'q_t_conts.cgui', render: $.fn.dataTable.render.number('.',',',0,'', '')},
			{data: 'cmua', name: 'q_t_conts.cmua', render: $.fn.dataTable.render.number('.',',',0,'', '')},
			{data: 'gvcVAT', name: 'q_t_conts.gvcVAT', render: $.fn.dataTable.render.number('.',',',0,'', '')},
			{data: 'VATgvon', name: 'VATgvon', searchable: false, orderable: false, render: $.fn.dataTable.render.number('.',',',0,'', '')},
			{data: 'gvdchinh', name: 'gvdchinh', searchable: false,orderable: false, render: $.fn.dataTable.render.number('.',',',0,'', '')},
			{data: 'VATgvdchinh', name: 'VATgvdchinh', searchable: false, orderable: false, render: $.fn.dataTable.render.number('.',',',0,'', '')},
			{data: 'cbcVAT', name: 'cbcVAT', searchable: false, orderable: false, render: $.fn.dataTable.render.number('.',',',0,'', '')},
			{data: 'lngop1', name: 'lngop1', searchable: false, orderable: false, render: $.fn.dataTable.render.number('.',',',0,'', '')},
			{data: 'lngop2', name: 'lngop2', searchable: false, orderable: false, render: $.fn.dataTable.render.number('.',',',0,'', '')},
		]
	});
	var $table1 = $('#tdtung').DataTable({
		"processing": true,
		"select": {
			style: 'os',
			selector: 'tr'
		},
		"responsive": true,
		"serverSide": true,
		"ajax": '/tong-ket/hang-muc/data/'+year+'/'+month,
		"dom": 'Bfrtip',
		"buttons": ['excel'],
		columns: [
			{data: 'nchi', name: 'quyettoans.nchi'},
			{data: 'ldo', name: 'quyettoans.ldo'},
			{data: 'tongcont', name: 'tongcont'},
			{data: 'slc20', name: 'dntungs.slc20'},
			{data: 'slc40', name: 'dntungs.slc40'},
			{data: 'lcont', name: 'dntungs.lcont'},
			{data: 'khang', name: 'dntungs.khang'},
			{data: 'bill', name: 'dntungs.bill'},
			{data: 'hdon', name: 'quyettoans.hdon', className: 'none'},
			{data: 'stien', name: 'quyettoans.stien', className: 'none', render: $.fn.dataTable.render.number('.',',',0,'', '')},
			{data: 'tienchuaVAT', name: 'tienchuaVAT', className: 'none', render: $.fn.dataTable.render.number('.',',',0,'', '')},
			{data: 'VAT', name: 'VAT', className: 'none', render: $.fn.dataTable.render.number('.',',',0,'', '')},
			{data: 'qtoancty', name: 'qtoancty', className: 'none', render: $.fn.dataTable.render.number('.',',',0,'', '')},
			{data: 'gchu', name: 'quyettoans.gchu', className: 'none'}
		]
	});
});
