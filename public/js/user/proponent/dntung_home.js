$(function() {
	$('div.alert').delay(3000).slideUp(300);
	var sttu, stclai, stclaitemp;
	var $table = $('#tung').DataTable({
		"processing": true,
		"responsive": false ,
        "select": {
            style:    'os',
			selector: 'tr'
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
		},
		{
			className: 'control',
			orderable: false,
			targets:1 
		}],
		"serverSide": true,
		"ajax": {'url':'/proponent/dntung/data', 'type': 'get', 'headers': { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }},
		"dom": 'Bfrtip',
		"buttons": [
			{
				text: 'Yêu cầu tạm ứng',
				className: 'btn',	
				action: function (e, dt, node, config){
					var selectedRows = dt.rows( {selected: true}).toArray();
				    var count = dt.rows( { selected: true } ).count();
					if(count>0){
					var id = dt.rows(selectedRows[0][0]).data().toArray()[0].id;
					$.ajax({
						url: '/proponent/get-secrectary-check-tu/'+id,
						method: 'get',
						success: function(data) {
							if(data==0){
								window.location.href = '/lam-hang/tam-ung/'+id;
							}else{
								alert('Tam ung nay khong the sua.');
							}
						},
						error: function(data) {
							console.log(data);
						}
					});
					}else{
						alert('Bạn chưa chọn kế hoạch làm hàng nào!');
					}
					//$('#myModal').modal('show');
				}
			},
			{
				text: 'Mẫu đề nghị tạm ứng',
				className: 'btn',
				action: function(e, dt, node, config){
					var selectedRows = dt.rows( {selected: true}).toArray();
					var ids=[];
					selectedRows[0].forEach(function(item){
						ids.push(dt.rows(item).data().toArray()[0].id);
					});
					if(ids.length == 0){
						alert('Bạn chưa chọn kế hoạch làm hàng nào!');
					}else{
						window.location.href = '/bieumau/denghitamung?arr=' + JSON.stringify(ids);		
					}
				}
			},
		],
		"columns": [
			{data: 'resp', name: 'resp', searchable: false, orderable: false},
			{data: 'check', name: 'check'},
			{data: 'created_at', name: 'created_at', className: 'desktop'},
			{data: 'bill', name: 'bill', className: 'all'},
			{data: 'reason', name: 'reason', className: 'none'},
			{data: 'filebooking', name: 'filebooking', className: 'none', searchable: false, orderable: false},
			{data: 'khachhang', name: 'khachhang', className: 'none'},
			{data: 'loaihang', name: 'loaihang', className: 'none'},
			{data: 'tuyenduong', name: 'tuyenduong', className: 'none'},
			{data: 'ndonghang', name: 'ndonghang'},
			{data: 'ttien', name: 'ttien', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: 'desktop' },
			{data: 'ttien_ltron', name: 'ttien_ltron', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: 'desktop' },
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
