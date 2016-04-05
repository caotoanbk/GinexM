$(function() {
	$('#message').confirm({
		title: '',
		content: 'Gui yeu cau lam hang thanh cong!',
		autoClose: 'confirm|3000',
		backgroundDismiss: true,
	});
	var $table = $('#tung').DataTable({
		"processing": true,
		"responsive": true,
		"serverSide": true,
		"ajax": '/yclhang/data',
		"dom": 'Bfrtip',
		"buttons": [
			{
				extend: 'excel',
				title: 'title',
				className: 'btn btn-default',
				text: 'Export excel file',
			}
		],
		"columns": [
			{data: 'created_at', name: 'created_at'},
			{data: 'bill', name: 'bill'},
			{data: 'ttien', name: 'ttien', render: $.fn.dataTable.render.number(',','.',0,'') },
			{data: 'khang', name: 'khang'},
			{data: 'slc20', name: 'slc20'},
			{data: 'slc40', name: 'slc40'},
			{data: 'lcont', name: 'lcont'},
			{data: 'tghung', name: 'tghung'},
			{data: 'bke', name: 'bke', searchable: false, orderable: false},
			{data: 'status', name: 'status', searchable: false, orderable: false},
		]
	});

	$('#myModal').on('show.bs.modal', function(e) {
		var $modal = $(this);
		$('#bill').val('');
		$('input[name=slc20]').val('');
		$('input[name=slc40]').val('');
		$('select[name=lcont]').val('');
		$('select[name=khang]').val('');
		$('input[name=ttien]').val('');
		$('#checkbct').prop('checked', false);
		$('#input-hidden').addClass('hidden');
		$('#checkbct').click(function(){
			if($(this).prop('checked') == false){
				$('#input-hidden').addClass('hidden');
			} else {
				$('#input-hidden').removeClass('hidden');
			}

		});

		$('input[name=ttien]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});

		//jquery validation
		var validator = $('#content').validate({
			rules: {
				bill: {
					required: true,
				},
				slc20: {
					required: true,
				},
				slc40: {
					required: true,
				},
				lcont: {
					required: true,
				},
				khang: {
					required: true,
				},
				ttien: {
					required: true,
				},
				tghung: {
					required: true,
				}
			},
			messages: {
				bill: {
					required: '<div class="text-danger"><em><small>Ban chua nhap so chung tu</small></em></div>'
				},
				slc20: {
					required: '<div class="text-danger"><em><small>Ban chua nhap so luong cont 20</small></em></div>'
				},
				slc40: {
					required: '<div class="text-danger"><em><small>Ban chua nhap so luong cont 40</small></em></div>'
				},
				lcont: {
					required: '<div class="text-danger"><em><small>Ban chua chon loai cont</small></em></div>'
				},
				khang: {
					required: '<div class="text-danger"><em><small>Ban chua chon kieu hang</small></em></div>'
				},
				ttien: {
					required: '<div class="text-danger"><em><small>Ban chua nhap so tien</small></em></div>'
				},
				tghung: {
					required: '<div class="text-danger"><em><small>Ban chua chon thoi gian hoan ung</small></em></div>'
				},
			},
			submitHandler: function(form){
				// get the form data 
				var formData = {
					'bill': $('input[name=bill]').val(),
					'slc20': $('input[name=slc20]').val(),
					'slc40': $('input[name=slc40]').val(),
					'lcont': $('select[name=lcont]').val(),
					'khang': $('select[name=khang]').val(),
					'ttien': $('input[name=ttien]').val(),
					'tghung': $('input[name=tghung]').val(),
				};
				console.log(formData);
				$.ajax({
					type: 'get',
					url: '/make-goods',
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
