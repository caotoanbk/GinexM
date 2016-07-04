$(function(){
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
				ndonghang: {required: true, },
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
				ndonghang: {
					required: '<div class="text-danger"><em><small>Bạn chưa nhập thời gian đóng hàng</small></em></div>'
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
})