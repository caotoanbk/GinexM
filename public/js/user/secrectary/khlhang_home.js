$(function() {
	$('div.alert').delay(3000).slideUp(300);
	var sttu, stclai, stclaitemp;
	var $table = $('#tung').DataTable({
		"processing": true,
		"responsive": false ,
        "select": {
            style:    'single',
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
		"ajax": {'url':'/secrectary/khlhang/data', 'type': 'get', 'headers': { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }},
		"dom": 'Bfrtip',
		"buttons": [
			{
				text: 'Da kiem tra',
				className: 'btn',	
				action: function (e, dt, node, config){
					var selectedRows = dt.rows( {selected: true}).toArray();
				    var count = dt.rows( { selected: true } ).count();
					if(count>0){
					var id = dt.rows(selectedRows[0][0]).data().toArray()[0].id;
					$.ajax({
						url: '/secrectary/check/'+ id,
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
				text: 'Huy kiem tra',
				className: 'btn',	
				action: function (e, dt, node, config){
					var selectedRows = dt.rows( {selected: true}).toArray();
				    var count = dt.rows( { selected: true } ).count();
					if(count>0){
					var id = dt.rows(selectedRows[0][0]).data().toArray()[0].id;
					$.ajax({
						url: '/secrectary/uncheck/'+ id,
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
				text: 'Gui email yeu cau',
				className: 'btn',	
				action: function (e, dt, node, config){
					var selectedRows = dt.rows( {selected: true}).toArray();
				    var count = dt.rows( { selected: true } ).count();
					if(count>0){
					var id = dt.rows(selectedRows[0][0]).data().toArray()[0].id;
					var booking, nyeucau;
					$.ajax({
						url: '/data/khlhang/details/'+id,
						method: 'get',
						success: function(data){
							$('#emailmodal_booking').text("Hello world");
							$('#emailmodal_nyeucau').text("Cao Van Toan");
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
			{data: 'name', name: 'name'},
			{data: 'created_at', name: 'created_at'},
			{data: 'khang', name: 'khang'},
			{data: 'loaihang', name: 'loaihang'},
			{data: 'khachhang', name: 'khachhang'},
			{data: 'bill', name: 'bill'},
			{data: 'stokhai', name: 'stokhai'},
			{data: 'slcont', name: 'slcont', className: 'none'},
			{data: 'slc20', name: 'slc20', className: 'none'},
			{data: 'slc40', name: 'slc40', className: 'none'},
			{data: 'slchroi', name: 'slchroi', className: 'none'},
			{data: 'slcnong', name: 'slcnong', className: 'none'},
			{data: 'slclanh', name: 'slclanh', className: 'none'},
			{data: 'hangtau', name: 'hangtau'},
			{data: 'tuyenduong', name: 'tuyenduong', className: 'none'},
			{data: 'ndonghang', name: 'ndonghang'},
			{data: 'nhaxe', name: 'nhaxe', className: 'none'},
			{data: 'filebooking', name: 'filebooking', className: 'none', searchable: false, orderable: false},
			{data: 'status', name: 'status', searchable: false, orderable: false},
		],
		"order": [[3, 'desc']]
	});
});
