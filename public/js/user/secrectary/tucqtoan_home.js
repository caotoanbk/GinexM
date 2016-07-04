$(function() {
	function myFormatCurrency (money) {
		return	money.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")+' đ';
	}
	var $table = $('#tung').DataTable({
		"processing": true,
		"select": {
			style: 'os',
			selector: 'td:first-child'
		},
		"responsive": {
			details: {
				type: 'column',
				target: 1
			}
		},
		"columnDefs": [{
				orderable: false,
				className: 'select-checkbox',
				targets: 0
			},{
				className: 'control',
				orderable: false,
				targets: 1
			}],
		"serverSide": true,
		"ajax": '/secrectary/tucqtoan/data',
		"dom": 'Bfrtip',
		"buttons": [
			{
				text: 'In phieu thu',
				className: 'btn',
				action: function(e, dt, node, config){
					var selectedRows = dt.rows( {selected: true}).toArray();
					var ids = [];
					selectedRows[0].forEach(function(item){
						ids.push(dt.rows(item).data().toArray()[0].id);
					});
					$.ajax({
						url: '/check-done?arr=' + JSON.stringify(ids),
						method: 'get',
						success: function(data){
							if(data == 'ok'){

								window.location.href = '/bieumau/phieuthu?arr=' + JSON.stringify(ids);
							}else{
								$.alert({
									title: '',
									content: 'Ban da lua chon 1 de nghi tam ung chua hoan thanh',
									backgroundDismiss: true,
								});
							}
						},
						error: function(data){
							alert('Error');
						}
					});
				}
			},
			{
				text: 'Select none',
				action: function(e, dt, node, config){
					dt.rows().deselect();
				}
			}
		],
		"columns": [
			{data: 'resp', name: 'resp', searchable: false, orderable: false},
			{data: 'check', name: 'check'},
			{data: 'created_at', name: 'dntungs.created_at'},
			{data: 'name', name: 'name'},
			{data: 'bill', name: 'dntungs.bill'},
			{data: 'reason', name: 'dntungs.reason'},
			{data: 'filebooking', name: 'filebooking', className: 'none', searchable: false, orderable: false},
			{data: 'khachhang', name: 'khachhang', className: 'none'},
			{data: 'loaihang', name: 'loaihang', className: 'none'},
			{data: 'tuyenduong', name: 'tuyenduong', className: 'none'},
			{data: 'ttien', name: 'dntungs.ttien', render: $.fn.dataTable.render.number(',','.',0,'', ' đ') },
			{data: 'ttien_ltron', name: 'dntungs.ttien_ltron', render: $.fn.dataTable.render.number(',','.',0,'', ' đ') },
			{data: 'ndonghang', name: 'dntungs.ndonghang'},
			{data: 'khang', name: 'dntungs.khang', className: 'none' },
			{data: 'slc20', name: 'dntungs.slc20', className: 'none'},
			{data: 'slc40', name: 'dntungs.slc40', className: 'none'},
			{data: 'lcont', name: 'dntungs.lcont', className: 'none'},
			{data: 'tghung', name: 'dntungs.tghung', className: 'none'},
			{data: 'nyeucau', name: 'dntungs.nyeucau', className: 'none'},
			{data: 'ngiaohang', name: 'dntungs.ngiaohang', className: 'none'},
			{data: 'nnhanhang', name: 'dntungs.nnhanhang', className: 'none'},
			{data: 'status', name: 'status', searchable: false, orderable: false},
			{data: 'cuoc', name: 'dntungs.cuoc', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none"  },
			{data: 'nang', name: 'dntungs.nang', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none" },
			{data: 'ha', name: 'dntungs.ha', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none" },
			{data: 'hquan', name: 'dntungs.hquan', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none"},
			{data: 'psinh', name: 'dntungs.psinh', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none"},
		],
		"order": [[2, "desc"]]
	});
});
