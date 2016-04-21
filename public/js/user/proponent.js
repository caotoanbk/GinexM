$(function() {
	var sttu, stdchi;
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
		"ajax": '/yclhang/data',
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
				extend: 'excel',
				title: 'title',
				className: 'btn',
				text: 'Export excel file',
			},
			{
				extend: 'print',
				text: 'Print',
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
			{data: 'resp', name: 'resp', searchable: false, orderable: false},
			{data: 'check', name: 'check'},
			{data: 'created_at', name: 'created_at'},
			{data: 'bill', name: 'bill'},
			{data: 'reason', name: 'reason'},
			{data: 'ttien', name: 'ttien', render: $.fn.dataTable.render.number(',','.',0,'', ' đ') },
			{data: 'khang', name: 'khang', className: 'none' },
			{data: 'slc20', name: 'slc20', className: 'none'},
			{data: 'slc40', name: 'slc40', className: 'none'},
			{data: 'lcont', name: 'lcont', className: 'none'},
			{data: 'tghung', name: 'tghung'},
			{data: 'bke', name: 'bke', searchable: false, orderable: false, className: 'none'},
			{data: 'status', name: 'status',searchable: false, orderable: false},
			{data: 'cuoc', name: 'cuoc', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none"  },
			{data: 'nang', name: 'nang', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none" },
			{data: 'ha', name: 'ha', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none" },
			{data: 'hquan', name: 'hquan', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none"},
			{data: 'psinh', name: 'psinh', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none"},
		],
		"order": [[2, 'desc'], [7, 'asc']]
	});

	$('#myModal').on('show.bs.modal', function(e) {
		var $modal = $(this);
		$('#bill').val('');
		$('input[name=reason]').val('');
		$('input[name=slc20]').val('');
		$('input[name=slc40]').val('');
		$('select[name=lcont]').val('');
		$('select[name=khang]').val('');
		$('input[name=ttien]').val('');
		$('input[name=cuoc]').val('');
		$('input[name=nang]').val('');
		$('input[name=ha]').val('');
		$('input[name=hquan]').val('');
		$('input[name=psinh]').val('');
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
		$('input[name=cuoc]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		$('input[name=nang]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		$('input[name=ha]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		$('input[name=hquan]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		$('input[name=psinh]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		//jquery validation
		var validator = $('#content').validate({
			rules: {
				reason: {
					required: true,
				},
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
				},
				bke: {
					required: true,
				}
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
				bke: {
					required: '<div class="text-danger"><em><small>Bạn chưa chọn file</small></em></div>'
				}
			},
		});
		validator.resetForm();
	});
	$('#myModal1').on('hidden.bs.modal', function(e){
		var trs = $('#qttu tbody tr').toArray();
		trs.forEach(function(entry){
			entry.remove();
		});

	});
	$('#them').click(function(e){
		e.preventDefault();
		$('tbody#qtoan').append('<tr class="input_fields_wrap"><td class="col-md-5"><input type="text" name="ldo[]" class="form-control"/></td> <td class="col-md-3"><input type="text" name="stien[]" class="form-control"/></td> <td class="col-md-2"><input type="text" name="hdon[]" class="form-control"/></td><td class="col-md-2"><input type="date" name="nchi[]" class="form-control"/></td><td class="text-center col-md-1"><a href="#" id="remove_item" class="text-danger">&times;</a></td></tr>');
		
		$('input[name="stien[]"]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		$('input[name="stien[]"]').on('change', function(e){
			var arr = $('input[name="stien[]"]').toArray();
			var stclai = sttu;
			arr.forEach(function(item){
				stclai = stclai - parseInt($(item).val().replace(/\./g, ''), 10);	
			});
			var value1 = stclai.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
			$('span#stclai').text(value1+" đ");
		});
	});
	$('#myModal1').on('show.bs.modal', function(e){
		stdchi=0;
		id = $(e.relatedTarget).data('id'); 
		$('input[name="stclai"]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		$('#qttu').on('click', 'a#remove_item', function(e){
			e.preventDefault();
			$(this).parent('td').parent('tr').remove();
		});
		$.ajax({
			url: '/qt-tam-ung/'+id,
			method: 'get',
			success: function(data){
				sttu = data['dntung'].ttien;
				$('span#ldtu').text(data['dntung'].reason);
				var value = (data['dntung'].ttien).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
				$('span#sttu').text(value+' đ');
				$('span#ntu').text(data['dntung'].created_at);
				if(data['qtoan'].length > 0){
					data['qtoan'].forEach(function(item){
					$('tbody#qtoan').append('<tr class="input_fields_wrap"><td class="col-md-5">'+item.ldo+'</td> <td class="col-md-3" id="stien">'+item.stien+'</td> <td class="col-md-2">'+item.hdon+'</td><td class="col-md-2">'+item.nchi+'</td><td class="text-center col-md-1"><a href="#" id="remove_item_ajax" data-id = "'+item.id+'" class="text-danger">&times;</a></td></tr>');
					});
				}
			},
			error: function(data){
				console.log('Error');
			}

		});
		//jquery validation
		var validator = $('#content1').validate({
			submitHandler: function(form, event){
				event.preventDefault();
				data = $(form).serialize();
				$.ajax({
					traditional: true,
					url: '/quyet-toan/'+id,
					method: 'post',
					data: data,
					success: function(data){
						$.alert({
							title: '',
							content: 'Gửi thông tin quyết toán thành công',
							autoClose: 'confirm|3000',
							backgroundDismiss: true,
						});
						$('#myModal1').modal('hide');

					},
					error: function(data){
						console.log('error');
					}
				});
			}
		});
		validator.resetForm();
		$('#qttu').on('click', 'a#remove_item_ajax', function(e){
			e.preventDefault();
			$tempt = $(this);
			qtid = $(this).data('id');
			$.ajax({
				url: '/delete-quyet-toan/'+id+'/'+qtid,
				method: 'get',
				success: function(data){
					$tempt.parent('td').parent('tr').remove();
				},
				error: function(data){
					console.log('Error');
				}
			});
		});
	});
});
