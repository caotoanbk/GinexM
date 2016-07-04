$(function() {
	function myFormatCurrency (money) {
		return	money.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")+' đ';
	}
	var $table = $('#tung').DataTable({
		"processing": true,
		"responsive": false ,
        "select": {
            style:    'os',
			selector: 'tr'
        },
		"responsive": true,
		"serverSide": true,
		"ajax": '/director/tucqtoan/data',
		"dom": 'Bfrtip',
		"buttons": [
			{
				text: 'In mẫu đề nghị tạm ứng',
				className: 'btn',
				action: function(e, dt, node, config){
					var selectedRows = dt.rows( {selected: true}).toArray();
					var ids=[];
					selectedRows[0].forEach(function(item){
						ids.push(dt.rows(item).data().toArray()[0].id);
					});
					window.location.href = '/bieumau/denghitamung?arr=' + JSON.stringify(ids);		
				}
			},
		],
		"columns": [
			{data: 'created_at', name: 'dntungs.created_at'},
			{data: 'name', name: 'users.name'},
			{data: 'bill', name: 'dntungs.bill'},
			{data: 'reason', name: 'dntungs.reason'},
			{data: 'filebooking', name: 'filebooking', className: 'none', searchable: false, orderable: false},
			{data: 'khachhang', name: 'khachhang', className: 'none'},
			{data: 'loaihang', name: 'loaihang', className: 'none'},
			{data: 'tuyenduong', name: 'tuyenduong', className: 'none'},
			{data: 'ttien', name: 'dntungs.ttien', render: $.fn.dataTable.render.number(',','.',0,'', ' đ') },
			{data: 'ttien_ltron', name: 'dntungs.ttien_ltron', render: $.fn.dataTable.render.number(',','.',0,'', ' đ') },
			{data: 'khang', name: 'dntungs.khang', className: 'none' },
			{data: 'slc20', name: 'dntungs.slc20', className: 'none'},
			{data: 'slc40', name: 'dntungs.slc40', className: 'none'},
			{data: 'lcont', name: 'dntungs.lcont', className: 'none'},
			{data: 'ndonghang', name: 'dntungs.ndonghang', className: 'text-center'},
			{data: 'tghung', name: 'dntungs.tghung', className: 'text-center none'},
			{data: 'nyeucau', name: 'dntungs.nyeucau', className: 'text-center none'},
			{data: 'ngiaohang', name: 'dntungs.ngiaohang', className: 'text-center none'},
			{data: 'nnhanhang', name: 'dntungs.nnhanhang', className: 'text-center none'},
			{data: 'status', name: 'status', searchable: false, orderable: false, className: 'text-center'},
			{data: 'cuoc', name: 'dntungs.cuoc', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none"  },
			{data: 'nang', name: 'dntungs.nang', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none" },
			{data: 'ha', name: 'dntungs.ha', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none" },
			{data: 'hquan', name: 'dntungs.hquan', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none"},
			{data: 'psinh', name: 'dntungs.psinh', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none"},
		],
		"order": [[0, 'desc']]
	});
});
