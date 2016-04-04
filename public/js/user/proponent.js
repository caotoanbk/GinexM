$(function() {
	$('#message').confirm({
		title: '',
		content: 'Gui yeu cau lam hang thanh cong!',
		autoClose: 'confirm|3000',
		backgroundDismiss: true,
	});
	var $table = $('#yclhang').DataTable({
		"processing": true,
		"responsive": true,
		"serverSide": true,
		"ajax": 'yclhang/data',
		"columns": [
			{data: 'bill', name: 'bill'},
			{data: 'created_at', name: 'created_at'},
			{data: 'status', name: 'status', searchable: false, orderable: false},
			{data: 'id', name: 'id', searchable: false, orderable: false},
		]
	});

	$('#myModal').on('show.bs.modal', function(e) {
		var $modal = $(this);
		$('#bill').val('');
		$('#checkbct').prop('checked', false);
		$('#input-hidden').addClass('hidden');
		$('#checkbct').click(function(){
			if($(this).prop('checked') == false){
				$('#input-hidden').addClass('hidden');
			} else {
				$('#input-hidden').removeClass('hidden');
			}

		});

		//jquery validation
		var validator = $('#content').validate({
			rules: {
				bill: {
					required: true,
				}
			},
			messages: {
				bill: {
					required: '<div class="text-danger"><em><small>Ban chua nhap so chung tu</small></em></div>'
				}
			},
			submitHandler: function(form){
				// get the form data 
				var formData = {
					'bill': $('input[name=bill]').val(),
				};
				$.ajax({
					type: 'get',
					url: 'make-goods',
					data: formData,
					encode: true,
					success: function(data){
						$('#myModal').modal('hide');
						$table.ajax.reload();
						$('#message').trigger('click');
					},
					error: function(data){
						$('#myModal').modal('hide');
						alert('Error!');
					}
				});
				event.preventDefault();
			}
		});
		validator.resetForm();
	});
});
