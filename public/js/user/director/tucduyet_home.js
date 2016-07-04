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
		"ajax": '/director/tucduyet/data',
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
			{data: 'created_at', name: 'dntungs.created_at'},
			{data: 'name', name: 'users.name'},
			{data: 'bill', name: 'dntungs.bill'},
			{data: 'reason', name: 'dntungs.reason'},
			{data: 'filebooking', name: 'filebooking', className: 'none', searchable: false, orderable: false},
			{data: 'khachhang', name: 'khachhang', className: 'none'},
			{data: 'loaihang', name: 'loaihang', className: 'none'},
			{data: 'tuyenduong', name: 'tuyenduong', className: 'none'},
			{data: 'ttien', name: 'dntungs.ttien', render: $.fn.dataTable.render.number(',','.',0,'', ' đ') },
			{data: 'ttien_ltron', name: 'dntungs.ttien_ltron', render: $.fn.dataTable.render.number(',','.',0,'', ' đ') },
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
			{data: 'nang', name: 'dntungs.nang', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none" },
			{data: 'ha', name: 'dntungs.ha', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none" },
			{data: 'hquan', name: 'dntungs.hquan', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none"},
			{data: 'psinh', name: 'dntungs.psinh', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none"},
		],
		"order": [[0, 'desc']]
	});
	$('#myModal').on('show.bs.modal', function(e) {
		var $modal = $(this);
		$('input[name=ttien]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		$('input[name=ttien_ltron]').autoNumeric('init', {
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
		$('#bill').val('');
		$('input[name=reason]').val('');
		$('input[name=slc20]').val('');
		$('input[name=slc40]').val('');
		$('select[name=lcont]').val('');
		$('select[name=khang]').val('');
		$('input[name=ttien]').val('');
		$('input[name=ttien_ltron]').val('');
		$('input[name=cuoc]').autoNumeric('set', 0);
		$('input[name=nang]').autoNumeric('set', 0);
		$('input[name=ha]').autoNumeric('set', 0);
		$('input[name=loaihang]').val('');
		$('input[name=tuyenduong]').val('');
		$('input[name=khachhang]').val('');
		$('input[name=hquan]').autoNumeric('set', 0);
		$('input[name=psinh]').autoNumeric('set', 0);
		$('#checkbct').prop('checked', false);
		$('#input-hidden').addClass('hidden');
		$('#checkbct').click(function(){
			if($(this).prop('checked') == false){
				$('#input-hidden').addClass('hidden');
			} else {
				$('#input-hidden').removeClass('hidden');
			}
		});
		$('input[name=cuoc]').on('change', function(e){
			var cuoc = parseInt($('input[name=cuoc]').autoNumeric('get'));
			var nang = parseInt($('input[name=nang]').autoNumeric('get'));
			var ha = parseInt($('input[name=ha]').autoNumeric('get'));
			var hquan = parseInt($('input[name=hquan]').autoNumeric('get'));
			var psinh = parseInt($('input[name=psinh]').autoNumeric('get'));
			var ttien = cuoc + nang + ha + hquan + psinh;
			$('input[name=ttien]').autoNumeric('set', ttien);
			var ttien_ltron;
			var sodu = ttien%100000;
			if(sodu == 0){
				ttien_ltron = ttien;
			}else{
				ttien_ltron = ttien - sodu + 100000;
			}
			$('input[name=ttien_ltron]').autoNumeric('set', ttien_ltron);
		});
		$('input[name=nang]').on('change', function(e){
			var cuoc = parseInt($('input[name=cuoc]').autoNumeric('get'));
			var nang = parseInt($('input[name=nang]').autoNumeric('get'));
			var ha = parseInt($('input[name=ha]').autoNumeric('get'));
			var hquan = parseInt($('input[name=hquan]').autoNumeric('get'));
			var psinh = parseInt($('input[name=psinh]').autoNumeric('get'));
			var ttien = cuoc + nang + ha + hquan + psinh;
			$('input[name=ttien]').autoNumeric('set', ttien);
			var ttien_ltron;
			var sodu = ttien%100000;
			if(sodu == 0){
				ttien_ltron = ttien;
			}else{
				ttien_ltron = ttien - sodu + 100000;
			}
			$('input[name=ttien_ltron]').autoNumeric('set', ttien_ltron);
		});
		$('input[name=ha]').on('change', function(e){
			var cuoc = parseInt($('input[name=cuoc]').autoNumeric('get'));
			var nang = parseInt($('input[name=nang]').autoNumeric('get'));
			var ha = parseInt($('input[name=ha]').autoNumeric('get'));
			var hquan = parseInt($('input[name=hquan]').autoNumeric('get'));
			var psinh = parseInt($('input[name=psinh]').autoNumeric('get'));
			var ttien = cuoc + nang + ha + hquan + psinh;
			$('input[name=ttien]').autoNumeric('set', ttien);
			var ttien_ltron;
			var sodu = ttien%100000;
			if(sodu == 0){
				ttien_ltron = ttien;
			}else{
				ttien_ltron = ttien - sodu + 100000;
			}
			$('input[name=ttien_ltron]').autoNumeric('set', ttien_ltron);
		});
		$('input[name=hquan]').on('change', function(e){
			var cuoc = parseInt($('input[name=cuoc]').autoNumeric('get'));
			var nang = parseInt($('input[name=nang]').autoNumeric('get'));
			var ha = parseInt($('input[name=ha]').autoNumeric('get'));
			var hquan = parseInt($('input[name=hquan]').autoNumeric('get'));
			var psinh = parseInt($('input[name=psinh]').autoNumeric('get'));
			var ttien = cuoc + nang + ha + hquan + psinh;
			$('input[name=ttien]').autoNumeric('set', ttien);
			var ttien_ltron;
			var sodu = ttien%100000;
			if(sodu == 0){
				ttien_ltron = ttien;
			}else{
				ttien_ltron = ttien - sodu + 100000;
			}
			$('input[name=ttien_ltron]').autoNumeric('set', ttien_ltron);
		});
		$('input[name=psinh]').on('change', function(e){
			var cuoc = parseInt($('input[name=cuoc]').autoNumeric('get'));
			var nang = parseInt($('input[name=nang]').autoNumeric('get'));
			var ha = parseInt($('input[name=ha]').autoNumeric('get'));
			var hquan = parseInt($('input[name=hquan]').autoNumeric('get'));
			var psinh = parseInt($('input[name=psinh]').autoNumeric('get'));
			var ttien = cuoc + nang + ha + hquan + psinh;
			$('input[name=ttien]').autoNumeric('set', ttien);
			var ttien_ltron;
			var sodu = ttien%100000;
			if(sodu == 0){
				ttien_ltron = ttien;
			}else{
				ttien_ltron = ttien - sodu + 100000;
			}
			$('input[name=ttien_ltron]').autoNumeric('set', ttien_ltron);
		});
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
	$('#tung').on('click', 'a.duyet',  function(e){
		e.preventDefault();
		var id = $(this).data('id');
		$.ajax({
			url: '/director/duyet?id='+id,
			success: function(data){
				$table.ajax.reload();
			},
			error: function(data){
				alert('Error');
			}
		});
	});
});
