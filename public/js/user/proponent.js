$(function() {
	$('#message').confirm({
		title: '',
		content: 'Gui yeu cau lam hang thanh cong!',
		autoClose: 'confirm|3000',
		backgroundDismiss: true,
	});
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
				text: 'Yeu cau lam hang',
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
				text: 'In mau de nghi tam ung',
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
			{data: 'status', name: 'status', searchable: false, orderable: false},
			{data: 'cuoc', name: 'cuoc', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none"  },
			{data: 'nang', name: 'nang', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none" },
			{data: 'ha', name: 'ha', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none" },
			{data: 'hquan', name: 'hquan', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none"},
			{data: 'psinh', name: 'psinh', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none"},
		],
		"order": [[2, 'desc'], [7, 'desc']]
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
					required: '<div class="text-danger"><em><small>Ban chua nhap ly do tam ung</small></em></div>'
				},
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
				bke: {
					required: '<div class="text-danger"><em><small>Ban chua chon file</small></em></div>'
				}
			},
		});
		validator.resetForm();
	});
});
