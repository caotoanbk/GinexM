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
		"ajax": '/director/dntung/data',
		"dom": 'Bfrtip',
		"buttons": [			
				{
				text: 'Đã duyệt t/ư',
				className: 'btn',	
				action: function (e, dt, node, config){
					var selectedRows = dt.rows( {selected: true}).toArray();
				    var count = dt.rows( { selected: true } ).count();
					if(count>0){
					var id = dt.rows(selectedRows[0][0]).data().toArray()[0].id;
					$.ajax({
						url: '/director/check-tu/'+ id,
						method: 'get',
						success: function(data){
							dt.ajax.reload();
							console.log(data);
						},
						error: function(data){
							alert('error');
						}
					});
					}else{
						alert('Bạn chưa chọn ke hoach lam hang nào');
					}
				}
			},
			{
				text: 'Hủy duyệt t/ư',
				className: 'btn',	
				action: function (e, dt, node, config){
					var selectedRows = dt.rows( {selected: true}).toArray();
				    var count = dt.rows( { selected: true } ).count();
					if(count>0){
					var id = dt.rows(selectedRows[0][0]).data().toArray()[0].id;
					$.ajax({
						url: '/director/uncheck-tu/'+ id,
						method: 'get',
						success: function(data){
							dt.ajax.reload();
							console.log(data);
						},
						error: function(data){
							alert('error');
						}
					});
					}else{
						alert('Bạn chưa chọn ke hoach lam hang nào');
					}
				}
			},
			{
				text: 'Gửi email yêu cầu',
				className: 'btn',	
				action: function (e, dt, node, config){
					var selectedRows = dt.rows( {selected: true}).toArray();
				    var count = dt.rows( { selected: true } ).count();
					if(count>0){
					var id = dt.rows(selectedRows[0][0]).data().toArray()[0].id;
					var booking, nyeucau;
					$('#emailmodal_booking').text('');
					$('textarea[name=yeucauemail]').val('');
					$.ajax({
						url: '/data/khlhang/details/'+id,
						method: 'get',
						success: function(data){
							console.log(data);
							$('#emailmodal_booking').text(data.bill);
						},
						error: function(data){
							alert('error');
						}
					});
					$('input[name=id]').val(id);
					$('#myModalEmail').modal('show').draggable();
					}else{
						alert('Bạn chưa chọn ke hoach lam hang nào');
					}
				}
			},
			{
				text: 'Yêu cầu tạm ứng',
				className: 'btn',	
				action: function (e, dt, node, config){
					var selectedRows = dt.rows( {selected: true}).toArray();
				    var count = dt.rows( { selected: true } ).count();
					if(count>0){
					var id = dt.rows(selectedRows[0][0]).data().toArray()[0].id;
					window.location.href = '/lam-hang/tam-ung/'+id;
					}else{
						alert('Bạn chưa chọn ke hoach lam hang nào');
					}
					//$('#myModal').modal('show');
				}
			},
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
			{
				text: 'Select none',
				action: function(e, dt, node, config) {
					dt.rows().deselect();
				}
			}
		
		],
		"columns": [
			{data: 'created_at', name: 'dntungs.created_at'},
			{data: 'name', name: 'users.name', className: 'desktop'},
			{data: 'bill', name: 'dntungs.bill', className: 'all'},
			{data: 'reason', name: 'dntungs.reason', className: 'none'},
			{data: 'filebooking', name: 'filebooking', className: 'none', searchable: false, orderable: false},
			{data: 'khachhang', name: 'khachhang', className: 'none'},
			{data: 'loaihang', name: 'loaihang', className: 'none'},
			{data: 'tuyenduong', name: 'tuyenduong', className: 'none'},
			{data: 'ttien', name: 'dntungs.ttien', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: 'desktop' },
			{data: 'ttien_ltron', name: 'dntungs.ttien_ltron', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: 'desktop' },
			{data: 'khang', name: 'dntungs.khang', className: 'none' },
			{data: 'slc20', name: 'dntungs.slc20', className: 'none'},
			{data: 'slc40', name: 'dntungs.slc40', className: 'none'},
			{data: 'lcont', name: 'dntungs.lcont', className: 'none'},
			{data: 'ndonghang', name: 'dntungs.ndonghang', className: 'text-center none'},
			{data: 'tghung', name: 'dntungs.tghung', className: 'text-center none'},
			{data: 'nyeucau', name: 'dntungs.nyeucau', className: 'text-center none'},
			{data: 'ngiaohang', name: 'dntungs.ngiaohang', className: 'text-center none'},
			{data: 'nnhanhang', name: 'dntungs.nnhanhang', className: 'text-center none'},
			{data: 'status', name: 'status', searchable: false, orderable: false, className: 'text-center'},
			{data: 'cuoc', name: 'dntungs.cuoc', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none"  },
			{data: 'playlenh', name: 'dntungs.playlenh', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none"  },
			{data: 'nang', name: 'dntungs.nang', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none" },
			{data: 'ha', name: 'dntungs.ha', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none" },
			{data: 'pbtokhai', name: 'dntungs.pbtokhai', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none" },
			{data: 'phqtiepnhan', name: 'dntungs.phqtiepnhan', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none" },
			{data: 'hquan', name: 'dntungs.hquan', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none"},
			{data: 'pitokhai', name: 'dntungs.pitokhai', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none"},
			{data: 'pkddongvat', name: 'dntungs.pkddongvat', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none"},
			{data: 'pkdthucvat', name: 'dntungs.pkdthucvat', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none"},
			{data: 'psinh', name: 'dntungs.psinh', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none"},
		],
		"order": [[0, 'desc']]
	});
});
