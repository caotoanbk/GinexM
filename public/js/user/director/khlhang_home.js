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
		"ajax": {'url':'/director/khlhang/data', 'type': 'get', 'headers': { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }},
		"dom": 'Bfrtip',
		"buttons": [
			{
				text: 'Làm hàng',
				className: 'btn',	
				action: function (e, dt, node, config){
					$('#myModal').modal('show');
				}
			},
			{
				text: 'Sửa',
				action: function(e ,dt, node, config) {
					var selectedRows = dt.rows( {selected: true}).toArray();
				    var count = dt.rows( { selected: true } ).count();
					if(count){
						var id = dt.rows(selectedRows[0][0]).data().toArray()[0].id;
						window.location.href = '/tam-ung/sua/'+id;
					}else{
						alert('Bạn chưa chọn ke hoach lam hang nào');
					}
				}
			},
			{
				text: 'Xóa',
				action: function(e, dt, node, config) {
					var selectedRows = dt.rows( {selected: true}).toArray();
				    var count = dt.rows( { selected: true } ).count();
					if(count>0){
					var r = confirm('Bạn muốn xóa ke hoach lam hang này?');
					if(r == true){
					var id = dt.rows(selectedRows[0][0]).data().toArray()[0].id;
					window.location.href = '/tam-ung/xoa/'+id;
					}
					}else{
						alert('Bạn chưa chọn ke hoach lam hang nào');
					}
				}
			},
			{
				text: 'Da duyet',
				className: 'btn',	
				action: function (e, dt, node, config){
					var selectedRows = dt.rows( {selected: true}).toArray();
				    var count = dt.rows( { selected: true } ).count();
					if(count>0){
					var id = dt.rows(selectedRows[0][0]).data().toArray()[0].id;
					$.ajax({
						url: '/director/approve/'+ id,
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
				text: 'Huy duyet',
				className: 'btn',	
				action: function (e, dt, node, config){
					var selectedRows = dt.rows( {selected: true}).toArray();
				    var count = dt.rows( { selected: true } ).count();
					if(count>0){
					var id = dt.rows(selectedRows[0][0]).data().toArray()[0].id;
					$.ajax({
						url: '/director/unapprove/'+ id,
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
		],
		"columns": [
			{data: 'resp', name: 'resp', searchable: false, orderable: false},
			{data: 'check', name: 'check', searchable: false, orderable: false},
			{data: 'name', name: 'name'},
			{data: 'created_at', name: 'dntungs.created_at'},
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
	$('#myModal').on('show.bs.modal', function(e) {
		var $modal = $(this);
		$('#bill').val('');
		$('input[name=slc20]').val('');
		$('input[name=slc40]').val('');
		$('select[name=lcont]').val('');
		$('select[name=khang]').val('');
		$('input[name=loaihang]').val('');
		$('input[name=tuyenduong]').val('');
		$('input[name=khachhang]').val('');
		$('input[name=stkhai]').val('');
		$('input[name=slcont]').val('');
		$('input[name=slchroi]').val('');
		$('input[name=slcnong]').val('');
		$('input[name=slclanh]').val('');
		$('input[name=nhaxe]').val('');
		$('input[name=hangtau]').val('');
		$('input[name=filebooking]').val(null);
		$('input[id=nyeucau]').datepicker({dateFormat: 'yy-mm-dd'});
		$('input[id=ndonghang]').datepicker({dateFormat: 'yy-mm-dd'});
		$('input[id=ngiaohang]').datepicker({dateFormat: 'yy-mm-dd'});
		$('input[id=nnhanhang]').datepicker({dateFormat: 'yy-mm-dd'});
		$('input[id=nhoanung]').datepicker({dateFormat: 'yy-mm-dd'});
		$('select[name=khang]').change(function(e){
			if($(this).val() == 'Xuất'){
				$('#input-ngaynhanhang').removeClass('hidden');
				$('#input-ngaynhanhang').removeClass('disabled');
				$('#input-ngaygiaohang').addClass('hidden');
				$('#input-ngaygiaohang').addClass('disabled');
				$('input[name=ngiaohang]').attr('disabled', 'disabled');
				$('input[name=nnhanhang]').removeAttr('disabled');
			}else if(($(this).val() == 'Nhập') || ($(this).val() == 'Kinh doanh nội địa')){
				$('#input-ngaygiaohang').removeClass('hidden');
				$('#input-ngaygiaohang').removeClass('disabled');
				$('#input-ngaynhanhang').addClass('hidden');
				$('#input-ngaynhanhang').addClass('disabled');
				$('input[name=nnhanhang]').attr('disabled', 'disabled');
				$('input[name=ngiaohang]').removeAttr('disabled');
			}else{
				$('#input-ngaygiaohang').addClass('hidden');
				$('#input-ngaygiaohang').addClass('disabled');
				$('#input-ngaynhanhang').addClass('hidden');
				$('#input-ngaynhanhang').addClass('disabled');
				$('input[name=nnhanhang]').attr('disabled', 'disabled');
				$('input[name=ngiaohang]').attr('disabled', 'disabled');
			}
		});
		//jquery validation
		var validator = $('#content').validate({
			rules: {
				bill: { required: true, },
				slc20: { required: true, },
				slc40: { required: true, },
				lcont: { required: true, },
				khang: { required: true, },
				tghung: { required: true, },
				loaihang: {required: true},
				tuyenduong: {required: true},
				khachhang: {required: true},
			},
			messages: {
				bill: {
					required: '<div class="text-danger"><em><small>Bạn chưa nhập số chứng từ</small></em></div>'
				},
				slc20: {
					required: '<div class="text-danger"><em><small>Bạn chưa nhập số lượng cont 20</small></em></div>'
				},
				slc40: {
					required: '<div class="text-danger"><em><small>Bạn chưa nhập số lượng cont 40</small></em></div>'
				},
				lcont: {
					required: '<div class="text-danger"><em><small>Bạn chưa chọn loại cont</small></em></div>'
				},
				khang: {
					required: '<div class="text-danger"><em><small>Bạn chưa chọn kiểu hàng</small></em></div>'
				},
				tghung: {
					required: '<div class="text-danger"><em><small>Bạn chưa nhập thời gian hoàn ứng</small></em></div>'
				},
				loaihang: {
					required: '<div class="text-danger"><em><small>Bạn chưa nhập loại hàng (nguyên cont hay rời)</small></em></div>'
				},
				tuyenduong: {
					required: '<div class="text-danger"><em><small>Bạn chưa nhập tuyến đường</small></em></div>'
				},
				khachhang: {
					required: '<div class="text-danger"><em><small>Bạn chưa nhập khách hàng</small></em></div>'
				},
			},
		});
		validator.resetForm();
	});
});
