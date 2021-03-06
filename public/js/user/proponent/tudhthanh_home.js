$(function() {
	$('div.alert').delay(3000).slideUp(300);
	var sttu, stclai, stclaitemp;
	var $table = $('#tung').DataTable({
		"processing": true,
		"responsive": false ,
        "select": {
            style:    'os',
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
			targets:0 
		},{
			className: 'control',
			orderable: false,
			targets:1 
		}],
		"serverSide": true,
		"ajax": '/proponent/tudhthanh/data',
		"dom": 'Bfrtip',
		"buttons": [
			{
				text: 'In giấy thanh toán tạm ứng',
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

								window.location.href = '/bieumau/thanhtoantamung?arr=' + JSON.stringify(ids);
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
				action: function(e, dt, node, config) {
					dt.rows().deselect();
				}
			}	

		],
		"columns": [
			{data: 'resp', name: 'resp', searchable: false, orderable: false},
			{data: 'check', name: 'check'},
			{data: 'created_at', name: 'created_at'},
			{data: 'bill', name: 'bill'},
			{data: 'reason', name: 'reason', className: 'none'},
			{data: 'filebooking', name: 'filebooking', className: 'none', searchable: false, orderable: false},
			{data: 'khachhang', name: 'khachhang', className: 'none'},
			{data: 'loaihang', name: 'loaihang', className: 'none'},
			{data: 'tuyenduong', name: 'tuyenduong', className: 'none'},
			{data: 'ndonghang', name: 'ndonghang'},
			{data: 'ttien', name: 'ttien', render: $.fn.dataTable.render.number(',','.',0,'', ' đ') },
			{data: 'ttien_ltron', name: 'ttien_ltron', render: $.fn.dataTable.render.number(',','.',0,'', ' đ') },
			{data: 'khang', name: 'khang', className: 'none' },
			{data: 'slc20', name: 'slc20', className: 'none'},
			{data: 'slc40', name: 'slc40', className: 'none'},
			{data: 'lcont', name: 'lcont', className: 'none'},
			{data: 'tghung', name: 'tghung'},
			{data: 'nyeucau', name: 'nyeucau', className: 'none'},
			{data: 'ngiaohang', name: 'ngiaohang', className: 'none'},
			{data: 'nnhanhang', name: 'nnhanhang', className: 'none'},
			{data: 'status', name: 'status',searchable: false, orderable: false, className: 'desktop'},
			{data: 'cuoc', name: 'cuoc', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none"  },
			{data: 'playlenh', name: 'playlenh', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none"  },
			{data: 'nang', name: 'nang', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none" },
			{data: 'ha', name: 'ha', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none" },
			{data: 'pbtokhai', name: 'pbtokhai', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none" },
			{data: 'phqtiepnhan', name: 'phqtiepnhan', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none" },
			{data: 'hquan', name: 'hquan', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none"},
			{data: 'pitokhai', name: 'pitokhai', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none"},
			{data: 'pkddongvat', name: 'pkddongvat', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none"},
			{data: 'pkdthucvat', name: 'pkdthucvat', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none"},
			{data: 'psinh', name: 'psinh', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none"},
		],
		"order": [[2, 'desc'], [7, 'asc']]
	});
});
