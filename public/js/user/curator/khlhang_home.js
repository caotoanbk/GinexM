$(function() {
	$('div.alert').delay(3000).slideUp(300);
	var sttu, stclai, stclaitemp;
	var $table = $('#tung').DataTable({
		"processing": true,
		"responsive": false ,
        "select": {
            style:    'single',
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
		},{
			className: 'control',
			orderable: false,
			targets:1 
		}],
		"serverSide": true,
		"ajax": {'url':'/curator/khlhang/data', 'type': 'get', 'headers': { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }},
		"dom": 'Bfrtip',
		"buttons": [
			{
				text: 'Đã kiểm tra',
				className: 'btn',	
				action: function (e, dt, node, config){
					var selectedRows = dt.rows( {selected: true}).toArray();
				    var count = dt.rows( { selected: true } ).count();
					if(count>0){
					var id = dt.rows(selectedRows[0][0]).data().toArray()[0].id;
					$.ajax({
						url: '/curator/check/'+ id,
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
				text: 'Hủy kiểm tra',
				className: 'btn',	
				action: function (e, dt, node, config){
					var selectedRows = dt.rows( {selected: true}).toArray();
				    var count = dt.rows( { selected: true } ).count();
					if(count>0){
					var id = dt.rows(selectedRows[0][0]).data().toArray()[0].id;
					$.ajax({
						url: '/curator/uncheck/'+ id,
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
		],
		"columns": [
			{data: 'resp', name: 'resp', searchable: false, orderable: false},
			{data: 'check', name: 'check', searchable: false, orderable: false},
			{data: 'name', name: 'name', className: 'desktop'},
			{data: 'created_at', name: 'dntungs.created_at'},
			{data: 'khang', name: 'khang'},
			{data: 'loaihang', name: 'loaihang'},
			{data: 'khachhang', name: 'khachhang'},
			{data: 'bill', name: 'bill', className: 'all'},
			{data: 'stokhai', name: 'stokhai'},
			{data: 'slcont', name: 'slcont', className: 'desktop'},
			{data: 'slc20', name: 'slc20', className: 'none'},
			{data: 'slc40', name: 'slc40', className: 'none'},
			{data: 'slchroi', name: 'slchroi', className: 'none'},
			{data: 'slcnong', name: 'slcnong', className: 'none'},
			{data: 'slclanh', name: 'slclanh', className: 'none'},
			{data: 'hangtau', name: 'hangtau'},
			{data: 'tuyenduong', name: 'tuyenduong', className: 'none'},
			{data: 'nyeucau', name: 'dntungs.nyeucau', className: 'none'},
			{data: 'ndonghang', name: 'ndonghang', className: 'desktop'},
			{data: 'ngiaohang', name: 'ngiaohang', className: 'desktop'},
			{data: 'nhaxe', name: 'nhaxe', className: 'none'},
			{data: 'filebooking', name: 'filebooking', className: 'none', searchable: false, orderable: false},
			{data: 'status', name: 'status', searchable: false, orderable: false, className: 'desktop'},
		],
		"order": [[3, 'desc']]
	});
});
