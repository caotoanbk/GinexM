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
				text: 'In giay thanh toan tam ung',
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
				reason: { required: true, },
				bill: { required: true, },
				slc20: { required: true, },
				slc40: { required: true, },
				lcont: { required: true, },
				khang: { required: true, },
				ttien: { required: true, },
				tghung: { required: true, },
				bke: { required: true, }
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
		$('tbody#qtoan').append('<tr class="input_fields_wrap"><td><input type="text" name="ldo[]" /></td> <td"><input type="text" name="stien[]" class="form-control"/></td> <td><input type="text" name="hdon[]" class="form-control"/></td><td><select name="ccho[]" class="form-control"><option value="Ginex">Ginex</option><option value="Custom">Khach hang</option></select></td><td><input type="date" name="nchi[]" class="form-control"/></td><td class="text-center"><a href="#" id="remove_item" class="text-danger">&times;</a></td><td><input type="text" class="form-control" size="20"></td><td>One</td><td><input type="text" class="form-control" size="20"></td><td><input type="text" class="form-control" size="20"></td><td><input type="text" class="form-control" size="20"></td><td><input type="text" class="form-control" size="20"></td><td><input type="text" class="form-control" size="20"></td></tr>');
		
		$('input[name="stien[]"]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		$('input[name="stien[]"]').on('change', function(e){
			var arr = $('input[name="stien[]"]').toArray();
			stclaitemp = stclai;
			if(typeof arr !== 'undefined' && arr.length>0){
				arr.forEach(function(item){
					if($(item).val()){
						stclaitemp = stclaitemp - parseInt($(item).val().replace(/\./g, ''), 10);	
					}
				});
			}
			var value1 = stclaitemp.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
			$('span#stclai').text(value1+" đ");
		});
	});
	$('#myModal1').on('show.bs.modal', function(e){
		id = $(e.relatedTarget).data('id'); 
		$('#qttu').on('click', 'a#remove_item', function(e){
			e.preventDefault();
			if($('input[name="stien[]"]').toArray().length == 1){

				var value1 = stclai.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
				$('span#stclai').text(value1+" đ");
			}
			$(this).parent('td').parent('tr').remove();
			$('input[name="stien[]"]').trigger('change');
		});
		$.ajax({
			url: '/qt-tam-ung/'+id,
			method: 'get',
			success: function(data){
				sttu = data['dntung'].ttien;
				
				stclai=sttu;
				$('span#ldtu').text(data['dntung'].reason);
				var value = (data['dntung'].ttien).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
				$('span#sttu').text(value+' đ');
				$('span#ntu').text(data['dntung'].created_at);
				if(data['qtoan'].length > 0){
					data['qtoan'].forEach(function(item){
						var value1 = item.stien.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
					stclai=stclai -item.stien;	
					$('tbody#qtoan').append('<tr class="input_fields_wrap"><td class="col-md-4">'+item.ldo+'</td> <td class="col-md-2" id="stien">'+value1+' đ</td> <td class="col-md-2">'+item.hdon+'</td><td class="col-md-2">'+item.chicho+'</td><td class="col-md-2">'+item.nchi+'</td><td class="text-center col-md-1"><a href="#" id="remove_item_ajax" data-id = "'+item.id+'" class="text-danger">&times;</a></td></tr>');
					});
				}
				var span_stclai = stclai.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
				$('span#stclai').text(span_stclai+' đ');
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
			},
		});
		validator.resetForm();
		$('#qttu').on('click', 'a#remove_item_ajax', function(e){
			e.preventDefault();
			$tempt = $(this);
			var chi = $(this).parent('td').parent('tr').find('td#stien').html();
			chi = chi.replace(/\D/g,'').replace(',', '', chi);
			qtid = $(this).data('id');
			$.ajax({
				url: '/delete-quyet-toan/'+id+'/'+qtid,
				method: 'get',
				success: function(data){
					stclai += parseInt(chi);
					var span_stclai = stclai.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
					$('span#stclai').text(span_stclai +' đ');
					$tempt.parent('td').parent('tr').remove();
				},
				error: function(data){
					console.log('Error');
				}
			});
		});
	});
});
