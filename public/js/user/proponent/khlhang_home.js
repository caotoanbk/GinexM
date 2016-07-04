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
		"ajax": {'url':'/proponent/khlhang/data', 'type': 'get', 'headers': { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }},
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
				text: 'Chi tiet cont',
				className: 'btn',	
				action: function (e, dt, node, config){
					$('#myModal').modal('show');
				}
			},
			{
				text: 'Xóa',
				action: function(e, dt, node, config) {
					var selectedRows = dt.rows( {selected: true}).toArray();
				    var count = dt.rows( { selected: true } ).count();
					if(count>0){
					var r = confirm('Bạn muốn xóa đề nghị tạm ứng này?');
					if(r == true){
					var id = dt.rows(selectedRows[0][0]).data().toArray()[0].id;
					window.location.href = '/tam-ung/xoa/'+id;
					}
					}else{
						alert('Bạn chưa chọn đề nghị tạm ứng nào');
					}
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
						alert('Bạn chưa chọn đề nghị tạm ứng nào');
					}
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
			{data: 'check', name: 'check', searchable: false, orderable: false},
		],
	});
	$('#myModal').on('show.bs.modal', function(e) {
		var $modal = $(this);
		$('input[id=nyeucau]').datepicker({dateFormat: 'yy-mm-dd'});
		$('input[id=ndonghang]').datepicker({dateFormat: 'yy-mm-dd'});
		$('input[id=ngiaohang]').datepicker({dateFormat: 'yy-mm-dd'});
		$('input[id=nnhanhang]').datepicker({dateFormat: 'yy-mm-dd'});
		$('input[id=nhoanung]').datepicker({dateFormat: 'yy-mm-dd'});
		//jquery validation
		var validator = $('#content').validate({
			rules: {
				reason: { required: true, },
				bill: { required: true, },
				slc20: { required: true, },
				slc40: { required: true, },
				lcont: { required: true, },
				khang: { required: true, },
				ttien: { required: true, },
				tghung: { required: true, },
				loaihang: {required: true},
				tuyenduong: {required: true},
				khachhang: {required: true},
			},
			messages: {
				reason: {
					required: '<div class="text-danger"><em><small>Bạn chưa nhập lý do tạm ứng</small></em></div>'
				},
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
				ttien: {
					required: '<div class="text-danger"><em><small>Bạn chưa nhập số tiền</small></em></div>'
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
