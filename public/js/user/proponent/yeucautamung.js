$(function(){
		$('input[name=cuoc]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		$('input[name=playlenh]').autoNumeric('init', {
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
		$('input[name=pbtokhai]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		$('input[name=phqtiepnhan]').autoNumeric('init', {
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
		$('input[name=pitokhai]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		$('input[name=pkddongvat]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		$('input[name=pkdthucvat]').autoNumeric('init', {
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
		//$('#checkbct').prop('checked', false);
		//$('#input-hidden').addClass('hidden');
		$('input[name=cuoc]').on('change', function(e){
			var cuoc, playlenh, nang, ha, pbtokhai, phqtiepnhan, hquan, pitokhai, pkddongvat, pkdthucvat, psinh;
			if($('input[name=cuoc]').autoNumeric('get') ==""){
				 cuoc = 0;
			}else{
				 cuoc = parseInt($('input[name=cuoc]').autoNumeric('get'));
			}
			if($('input[name=playlenh]').val() == ""){
				playlenh = 0;
			}else{
				playlenh = parseInt($('input[name=playlenh]').autoNumeric('get'));
			}
			if($('input[name=nang]').val() == ""){
				nang = 0;
			}else{
				nang = parseInt($('input[name=nang]').autoNumeric('get'));
			}
			if($('input[name=ha]').val() == ""){
				ha = 0;
			}else{
				ha = parseInt($('input[name=ha]').autoNumeric('get'));
			}
			if($('input[name=pbtokhai]').val() == ""){
				pbtokhai = 0;
			}else{
				pbtokhai = parseInt($('input[name=pbtokhai]').autoNumeric('get'));
			}
			if($('input[name=phqtiepnhan]').val() == ""){
				phqtiepnhan = 0;
			}else{
				phqtiepnhan = parseInt($('input[name=phqtiepnhan]').autoNumeric('get'));
			}
			if($('input[name=hquan]').val() == ""){
				hquan = 0;
			}else{
				hquan = parseInt($('input[name=hquan]').autoNumeric('get'));
			}
			if($('input[name=pitokhai]').val() == ""){
				pitokhai = 0;	
			}else{
				pitokhai = parseInt($('input[name=pitokhai]').autoNumeric('get'));
			}
			if($('input[name=pkddongvat]').val() == ""){
				pkddongvat = 0;
			}else{
				pkddongvat = parseInt($('input[name=pkddongvat]').autoNumeric('get'));
			}
			if($('input[name=pkdthucvat]').val() == ""){
				pkdthucvat = 0;
			}else{
				pkdthucvat = parseInt($('input[name=pkdthucvat]').autoNumeric('get'));
			}
			if($('input[name=psinh]').val() == ""){
				psinh = 0;
			}else{
				psinh = parseInt($('input[name=psinh]').autoNumeric('get'));
			}
			ttien = cuoc + playlenh + nang + ha +pbtokhai + phqtiepnhan + hquan + pitokhai + pkddongvat + pkdthucvat + psinh;
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
		$('input[name=playlenh]').on('change', function(e){
			var cuoc, playlenh, nang, ha, pbtokhai, phqtiepnhan, hquan, pitokhai, pkddongvat, pkdthucvat, psinh;
			if($('input[name=cuoc]').autoNumeric('get') ==""){
				 cuoc = 0;
			}else{
				 cuoc = parseInt($('input[name=cuoc]').autoNumeric('get'));
			}
			if($('input[name=playlenh]').val() == ""){
				playlenh = 0;
			}else{
				playlenh = parseInt($('input[name=playlenh]').autoNumeric('get'));
			}
			if($('input[name=nang]').val() == ""){
				nang = 0;
			}else{
				nang = parseInt($('input[name=nang]').autoNumeric('get'));
			}
			if($('input[name=ha]').val() == ""){
				ha = 0;
			}else{
				ha = parseInt($('input[name=ha]').autoNumeric('get'));
			}
			if($('input[name=pbtokhai]').val() == ""){
				pbtokhai = 0;
			}else{
				pbtokhai = parseInt($('input[name=pbtokhai]').autoNumeric('get'));
			}
			if($('input[name=phqtiepnhan]').val() == ""){
				phqtiepnhan = 0;
			}else{
				phqtiepnhan = parseInt($('input[name=phqtiepnhan]').autoNumeric('get'));
			}
			if($('input[name=hquan]').val() == ""){
				hquan = 0;
			}else{
				hquan = parseInt($('input[name=hquan]').autoNumeric('get'));
			}
			if($('input[name=pitokhai]').val() == ""){
				pitokhai = 0;	
			}else{
				pitokhai = parseInt($('input[name=pitokhai]').autoNumeric('get'));
			}
			if($('input[name=pkddongvat]').val() == ""){
				pkddongvat = 0;
			}else{
				pkddongvat = parseInt($('input[name=pkddongvat]').autoNumeric('get'));
			}
			if($('input[name=pkdthucvat]').val() == ""){
				pkdthucvat = 0;
			}else{
				pkdthucvat = parseInt($('input[name=pkdthucvat]').autoNumeric('get'));
			}
			if($('input[name=psinh]').val() == ""){
				psinh = 0;
			}else{
				psinh = parseInt($('input[name=psinh]').autoNumeric('get'));
			}
			ttien = cuoc + playlenh + nang + ha +pbtokhai + phqtiepnhan + hquan + pitokhai + pkddongvat + pkdthucvat + psinh;
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
			var cuoc, playlenh, nang, ha, pbtokhai, phqtiepnhan, hquan, pitokhai, pkddongvat, pkdthucvat, psinh;
			if($('input[name=cuoc]').autoNumeric('get') ==""){
				 cuoc = 0;
			}else{
				 cuoc = parseInt($('input[name=cuoc]').autoNumeric('get'));
			}
			if($('input[name=playlenh]').val() == ""){
				playlenh = 0;
			}else{
				playlenh = parseInt($('input[name=playlenh]').autoNumeric('get'));
			}
			if($('input[name=nang]').val() == ""){
				nang = 0;
			}else{
				nang = parseInt($('input[name=nang]').autoNumeric('get'));
			}
			if($('input[name=ha]').val() == ""){
				ha = 0;
			}else{
				ha = parseInt($('input[name=ha]').autoNumeric('get'));
			}
			if($('input[name=pbtokhai]').val() == ""){
				pbtokhai = 0;
			}else{
				pbtokhai = parseInt($('input[name=pbtokhai]').autoNumeric('get'));
			}
			if($('input[name=phqtiepnhan]').val() == ""){
				phqtiepnhan = 0;
			}else{
				phqtiepnhan = parseInt($('input[name=phqtiepnhan]').autoNumeric('get'));
			}
			if($('input[name=hquan]').val() == ""){
				hquan = 0;
			}else{
				hquan = parseInt($('input[name=hquan]').autoNumeric('get'));
			}
			if($('input[name=pitokhai]').val() == ""){
				pitokhai = 0;	
			}else{
				pitokhai = parseInt($('input[name=pitokhai]').autoNumeric('get'));
			}
			if($('input[name=pkddongvat]').val() == ""){
				pkddongvat = 0;
			}else{
				pkddongvat = parseInt($('input[name=pkddongvat]').autoNumeric('get'));
			}
			if($('input[name=pkdthucvat]').val() == ""){
				pkdthucvat = 0;
			}else{
				pkdthucvat = parseInt($('input[name=pkdthucvat]').autoNumeric('get'));
			}
			if($('input[name=psinh]').val() == ""){
				psinh = 0;
			}else{
				psinh = parseInt($('input[name=psinh]').autoNumeric('get'));
			}
			ttien = cuoc + playlenh + nang + ha +pbtokhai + phqtiepnhan + hquan + pitokhai + pkddongvat + pkdthucvat + psinh;
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
			var cuoc, playlenh, nang, ha, pbtokhai, phqtiepnhan, hquan, pitokhai, pkddongvat, pkdthucvat, psinh;
			if($('input[name=cuoc]').autoNumeric('get') ==""){
				 cuoc = 0;
			}else{
				 cuoc = parseInt($('input[name=cuoc]').autoNumeric('get'));
			}
			if($('input[name=playlenh]').val() == ""){
				playlenh = 0;
			}else{
				playlenh = parseInt($('input[name=playlenh]').autoNumeric('get'));
			}
			if($('input[name=nang]').val() == ""){
				nang = 0;
			}else{
				nang = parseInt($('input[name=nang]').autoNumeric('get'));
			}
			if($('input[name=ha]').val() == ""){
				ha = 0;
			}else{
				ha = parseInt($('input[name=ha]').autoNumeric('get'));
			}
			if($('input[name=pbtokhai]').val() == ""){
				pbtokhai = 0;
			}else{
				pbtokhai = parseInt($('input[name=pbtokhai]').autoNumeric('get'));
			}
			if($('input[name=phqtiepnhan]').val() == ""){
				phqtiepnhan = 0;
			}else{
				phqtiepnhan = parseInt($('input[name=phqtiepnhan]').autoNumeric('get'));
			}
			if($('input[name=hquan]').val() == ""){
				hquan = 0;
			}else{
				hquan = parseInt($('input[name=hquan]').autoNumeric('get'));
			}
			if($('input[name=pitokhai]').val() == ""){
				pitokhai = 0;	
			}else{
				pitokhai = parseInt($('input[name=pitokhai]').autoNumeric('get'));
			}
			if($('input[name=pkddongvat]').val() == ""){
				pkddongvat = 0;
			}else{
				pkddongvat = parseInt($('input[name=pkddongvat]').autoNumeric('get'));
			}
			if($('input[name=pkdthucvat]').val() == ""){
				pkdthucvat = 0;
			}else{
				pkdthucvat = parseInt($('input[name=pkdthucvat]').autoNumeric('get'));
			}
			if($('input[name=psinh]').val() == ""){
				psinh = 0;
			}else{
				psinh = parseInt($('input[name=psinh]').autoNumeric('get'));
			}
			ttien = cuoc + playlenh + nang + ha +pbtokhai + phqtiepnhan + hquan + pitokhai + pkddongvat + pkdthucvat + psinh;
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
		$('input[name=pbtokhai]').on('change', function(e){
			var cuoc, playlenh, nang, ha, pbtokhai, phqtiepnhan, hquan, pitokhai, pkddongvat, pkdthucvat, psinh;
			if($('input[name=cuoc]').autoNumeric('get') ==""){
				 cuoc = 0;
			}else{
				 cuoc = parseInt($('input[name=cuoc]').autoNumeric('get'));
			}
			if($('input[name=playlenh]').val() == ""){
				playlenh = 0;
			}else{
				playlenh = parseInt($('input[name=playlenh]').autoNumeric('get'));
			}
			if($('input[name=nang]').val() == ""){
				nang = 0;
			}else{
				nang = parseInt($('input[name=nang]').autoNumeric('get'));
			}
			if($('input[name=ha]').val() == ""){
				ha = 0;
			}else{
				ha = parseInt($('input[name=ha]').autoNumeric('get'));
			}
			if($('input[name=pbtokhai]').val() == ""){
				pbtokhai = 0;
			}else{
				pbtokhai = parseInt($('input[name=pbtokhai]').autoNumeric('get'));
			}
			if($('input[name=phqtiepnhan]').val() == ""){
				phqtiepnhan = 0;
			}else{
				phqtiepnhan = parseInt($('input[name=phqtiepnhan]').autoNumeric('get'));
			}
			if($('input[name=hquan]').val() == ""){
				hquan = 0;
			}else{
				hquan = parseInt($('input[name=hquan]').autoNumeric('get'));
			}
			if($('input[name=pitokhai]').val() == ""){
				pitokhai = 0;	
			}else{
				pitokhai = parseInt($('input[name=pitokhai]').autoNumeric('get'));
			}
			if($('input[name=pkddongvat]').val() == ""){
				pkddongvat = 0;
			}else{
				pkddongvat = parseInt($('input[name=pkddongvat]').autoNumeric('get'));
			}
			if($('input[name=pkdthucvat]').val() == ""){
				pkdthucvat = 0;
			}else{
				pkdthucvat = parseInt($('input[name=pkdthucvat]').autoNumeric('get'));
			}
			if($('input[name=psinh]').val() == ""){
				psinh = 0;
			}else{
				psinh = parseInt($('input[name=psinh]').autoNumeric('get'));
			}
			ttien = cuoc + playlenh + nang + ha +pbtokhai + phqtiepnhan + hquan + pitokhai + pkddongvat + pkdthucvat + psinh;
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
		$('input[name=phqtiepnhan]').on('change', function(e){
			var cuoc, playlenh, nang, ha, pbtokhai, phqtiepnhan, hquan, pitokhai, pkddongvat, pkdthucvat, psinh;
			if($('input[name=cuoc]').autoNumeric('get') ==""){
				 cuoc = 0;
			}else{
				 cuoc = parseInt($('input[name=cuoc]').autoNumeric('get'));
			}
			if($('input[name=playlenh]').val() == ""){
				playlenh = 0;
			}else{
				playlenh = parseInt($('input[name=playlenh]').autoNumeric('get'));
			}
			if($('input[name=nang]').val() == ""){
				nang = 0;
			}else{
				nang = parseInt($('input[name=nang]').autoNumeric('get'));
			}
			if($('input[name=ha]').val() == ""){
				ha = 0;
			}else{
				ha = parseInt($('input[name=ha]').autoNumeric('get'));
			}
			if($('input[name=pbtokhai]').val() == ""){
				pbtokhai = 0;
			}else{
				pbtokhai = parseInt($('input[name=pbtokhai]').autoNumeric('get'));
			}
			if($('input[name=phqtiepnhan]').val() == ""){
				phqtiepnhan = 0;
			}else{
				phqtiepnhan = parseInt($('input[name=phqtiepnhan]').autoNumeric('get'));
			}
			if($('input[name=hquan]').val() == ""){
				hquan = 0;
			}else{
				hquan = parseInt($('input[name=hquan]').autoNumeric('get'));
			}
			if($('input[name=pitokhai]').val() == ""){
				pitokhai = 0;	
			}else{
				pitokhai = parseInt($('input[name=pitokhai]').autoNumeric('get'));
			}
			if($('input[name=pkddongvat]').val() == ""){
				pkddongvat = 0;
			}else{
				pkddongvat = parseInt($('input[name=pkddongvat]').autoNumeric('get'));
			}
			if($('input[name=pkdthucvat]').val() == ""){
				pkdthucvat = 0;
			}else{
				pkdthucvat = parseInt($('input[name=pkdthucvat]').autoNumeric('get'));
			}
			if($('input[name=psinh]').val() == ""){
				psinh = 0;
			}else{
				psinh = parseInt($('input[name=psinh]').autoNumeric('get'));
			}
			ttien = cuoc + playlenh + nang + ha +pbtokhai + phqtiepnhan + hquan + pitokhai + pkddongvat + pkdthucvat + psinh;
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
			var cuoc, playlenh, nang, ha, pbtokhai, phqtiepnhan, hquan, pitokhai, pkddongvat, pkdthucvat, psinh;
			if($('input[name=cuoc]').autoNumeric('get') ==""){
				 cuoc = 0;
			}else{
				 cuoc = parseInt($('input[name=cuoc]').autoNumeric('get'));
			}
			if($('input[name=playlenh]').val() == ""){
				playlenh = 0;
			}else{
				playlenh = parseInt($('input[name=playlenh]').autoNumeric('get'));
			}
			if($('input[name=nang]').val() == ""){
				nang = 0;
			}else{
				nang = parseInt($('input[name=nang]').autoNumeric('get'));
			}
			if($('input[name=ha]').val() == ""){
				ha = 0;
			}else{
				ha = parseInt($('input[name=ha]').autoNumeric('get'));
			}
			if($('input[name=pbtokhai]').val() == ""){
				pbtokhai = 0;
			}else{
				pbtokhai = parseInt($('input[name=pbtokhai]').autoNumeric('get'));
			}
			if($('input[name=phqtiepnhan]').val() == ""){
				phqtiepnhan = 0;
			}else{
				phqtiepnhan = parseInt($('input[name=phqtiepnhan]').autoNumeric('get'));
			}
			if($('input[name=hquan]').val() == ""){
				hquan = 0;
			}else{
				hquan = parseInt($('input[name=hquan]').autoNumeric('get'));
			}
			if($('input[name=pitokhai]').val() == ""){
				pitokhai = 0;	
			}else{
				pitokhai = parseInt($('input[name=pitokhai]').autoNumeric('get'));
			}
			if($('input[name=pkddongvat]').val() == ""){
				pkddongvat = 0;
			}else{
				pkddongvat = parseInt($('input[name=pkddongvat]').autoNumeric('get'));
			}
			if($('input[name=pkdthucvat]').val() == ""){
				pkdthucvat = 0;
			}else{
				pkdthucvat = parseInt($('input[name=pkdthucvat]').autoNumeric('get'));
			}
			if($('input[name=psinh]').val() == ""){
				psinh = 0;
			}else{
				psinh = parseInt($('input[name=psinh]').autoNumeric('get'));
			}
			ttien = cuoc + playlenh + nang + ha +pbtokhai + phqtiepnhan + hquan + pitokhai + pkddongvat + pkdthucvat + psinh;
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
		$('input[name=pitokhai]').on('change', function(e){
			var cuoc, playlenh, nang, ha, pbtokhai, phqtiepnhan, hquan, pitokhai, pkddongvat, pkdthucvat, psinh;
			if($('input[name=cuoc]').autoNumeric('get') ==""){
				 cuoc = 0;
			}else{
				 cuoc = parseInt($('input[name=cuoc]').autoNumeric('get'));
			}
			if($('input[name=playlenh]').val() == ""){
				playlenh = 0;
			}else{
				playlenh = parseInt($('input[name=playlenh]').autoNumeric('get'));
			}
			if($('input[name=nang]').val() == ""){
				nang = 0;
			}else{
				nang = parseInt($('input[name=nang]').autoNumeric('get'));
			}
			if($('input[name=ha]').val() == ""){
				ha = 0;
			}else{
				ha = parseInt($('input[name=ha]').autoNumeric('get'));
			}
			if($('input[name=pbtokhai]').val() == ""){
				pbtokhai = 0;
			}else{
				pbtokhai = parseInt($('input[name=pbtokhai]').autoNumeric('get'));
			}
			if($('input[name=phqtiepnhan]').val() == ""){
				phqtiepnhan = 0;
			}else{
				phqtiepnhan = parseInt($('input[name=phqtiepnhan]').autoNumeric('get'));
			}
			if($('input[name=hquan]').val() == ""){
				hquan = 0;
			}else{
				hquan = parseInt($('input[name=hquan]').autoNumeric('get'));
			}
			if($('input[name=pitokhai]').val() == ""){
				pitokhai = 0;	
			}else{
				pitokhai = parseInt($('input[name=pitokhai]').autoNumeric('get'));
			}
			if($('input[name=pkddongvat]').val() == ""){
				pkddongvat = 0;
			}else{
				pkddongvat = parseInt($('input[name=pkddongvat]').autoNumeric('get'));
			}
			if($('input[name=pkdthucvat]').val() == ""){
				pkdthucvat = 0;
			}else{
				pkdthucvat = parseInt($('input[name=pkdthucvat]').autoNumeric('get'));
			}
			if($('input[name=psinh]').val() == ""){
				psinh = 0;
			}else{
				psinh = parseInt($('input[name=psinh]').autoNumeric('get'));
			}
			ttien = cuoc + playlenh + nang + ha +pbtokhai + phqtiepnhan + hquan + pitokhai + pkddongvat + pkdthucvat + psinh;
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
		$('input[name=pkddongvat]').on('change', function(e){
			var cuoc, playlenh, nang, ha, pbtokhai, phqtiepnhan, hquan, pitokhai, pkddongvat, pkdthucvat, psinh;
			if($('input[name=cuoc]').autoNumeric('get') ==""){
				 cuoc = 0;
			}else{
				 cuoc = parseInt($('input[name=cuoc]').autoNumeric('get'));
			}
			if($('input[name=playlenh]').val() == ""){
				playlenh = 0;
			}else{
				playlenh = parseInt($('input[name=playlenh]').autoNumeric('get'));
			}
			if($('input[name=nang]').val() == ""){
				nang = 0;
			}else{
				nang = parseInt($('input[name=nang]').autoNumeric('get'));
			}
			if($('input[name=ha]').val() == ""){
				ha = 0;
			}else{
				ha = parseInt($('input[name=ha]').autoNumeric('get'));
			}
			if($('input[name=pbtokhai]').val() == ""){
				pbtokhai = 0;
			}else{
				pbtokhai = parseInt($('input[name=pbtokhai]').autoNumeric('get'));
			}
			if($('input[name=phqtiepnhan]').val() == ""){
				phqtiepnhan = 0;
			}else{
				phqtiepnhan = parseInt($('input[name=phqtiepnhan]').autoNumeric('get'));
			}
			if($('input[name=hquan]').val() == ""){
				hquan = 0;
			}else{
				hquan = parseInt($('input[name=hquan]').autoNumeric('get'));
			}
			if($('input[name=pitokhai]').val() == ""){
				pitokhai = 0;	
			}else{
				pitokhai = parseInt($('input[name=pitokhai]').autoNumeric('get'));
			}
			if($('input[name=pkddongvat]').val() == ""){
				pkddongvat = 0;
			}else{
				pkddongvat = parseInt($('input[name=pkddongvat]').autoNumeric('get'));
			}
			if($('input[name=pkdthucvat]').val() == ""){
				pkdthucvat = 0;
			}else{
				pkdthucvat = parseInt($('input[name=pkdthucvat]').autoNumeric('get'));
			}
			if($('input[name=psinh]').val() == ""){
				psinh = 0;
			}else{
				psinh = parseInt($('input[name=psinh]').autoNumeric('get'));
			}
			ttien = cuoc + playlenh + nang + ha +pbtokhai + phqtiepnhan + hquan + pitokhai + pkddongvat + pkdthucvat + psinh;
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
		$('input[name=pkdthucvat]').on('change', function(e){
			var cuoc, playlenh, nang, ha, pbtokhai, phqtiepnhan, hquan, pitokhai, pkddongvat, pkdthucvat, psinh;
			if($('input[name=cuoc]').autoNumeric('get') ==""){
				 cuoc = 0;
			}else{
				 cuoc = parseInt($('input[name=cuoc]').autoNumeric('get'));
			}
			if($('input[name=playlenh]').val() == ""){
				playlenh = 0;
			}else{
				playlenh = parseInt($('input[name=playlenh]').autoNumeric('get'));
			}
			if($('input[name=nang]').val() == ""){
				nang = 0;
			}else{
				nang = parseInt($('input[name=nang]').autoNumeric('get'));
			}
			if($('input[name=ha]').val() == ""){
				ha = 0;
			}else{
				ha = parseInt($('input[name=ha]').autoNumeric('get'));
			}
			if($('input[name=pbtokhai]').val() == ""){
				pbtokhai = 0;
			}else{
				pbtokhai = parseInt($('input[name=pbtokhai]').autoNumeric('get'));
			}
			if($('input[name=phqtiepnhan]').val() == ""){
				phqtiepnhan = 0;
			}else{
				phqtiepnhan = parseInt($('input[name=phqtiepnhan]').autoNumeric('get'));
			}
			if($('input[name=hquan]').val() == ""){
				hquan = 0;
			}else{
				hquan = parseInt($('input[name=hquan]').autoNumeric('get'));
			}
			if($('input[name=pitokhai]').val() == ""){
				pitokhai = 0;	
			}else{
				pitokhai = parseInt($('input[name=pitokhai]').autoNumeric('get'));
			}
			if($('input[name=pkddongvat]').val() == ""){
				pkddongvat = 0;
			}else{
				pkddongvat = parseInt($('input[name=pkddongvat]').autoNumeric('get'));
			}
			if($('input[name=pkdthucvat]').val() == ""){
				pkdthucvat = 0;
			}else{
				pkdthucvat = parseInt($('input[name=pkdthucvat]').autoNumeric('get'));
			}
			if($('input[name=psinh]').val() == ""){
				psinh = 0;
			}else{
				psinh = parseInt($('input[name=psinh]').autoNumeric('get'));
			}
			ttien = cuoc + playlenh + nang + ha +pbtokhai + phqtiepnhan + hquan + pitokhai + pkddongvat + pkdthucvat + psinh;
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
			var cuoc, playlenh, nang, ha, pbtokhai, phqtiepnhan, hquan, pitokhai, pkddongvat, pkdthucvat, psinh;
			if($('input[name=cuoc]').autoNumeric('get') ==""){
				 cuoc = 0;
			}else{
				 cuoc = parseInt($('input[name=cuoc]').autoNumeric('get'));
			}
			if($('input[name=playlenh]').val() == ""){
				playlenh = 0;
			}else{
				playlenh = parseInt($('input[name=playlenh]').autoNumeric('get'));
			}
			if($('input[name=nang]').val() == ""){
				nang = 0;
			}else{
				nang = parseInt($('input[name=nang]').autoNumeric('get'));
			}
			if($('input[name=ha]').val() == ""){
				ha = 0;
			}else{
				ha = parseInt($('input[name=ha]').autoNumeric('get'));
			}
			if($('input[name=pbtokhai]').val() == ""){
				pbtokhai = 0;
			}else{
				pbtokhai = parseInt($('input[name=pbtokhai]').autoNumeric('get'));
			}
			if($('input[name=phqtiepnhan]').val() == ""){
				phqtiepnhan = 0;
			}else{
				phqtiepnhan = parseInt($('input[name=phqtiepnhan]').autoNumeric('get'));
			}
			if($('input[name=hquan]').val() == ""){
				hquan = 0;
			}else{
				hquan = parseInt($('input[name=hquan]').autoNumeric('get'));
			}
			if($('input[name=pitokhai]').val() == ""){
				pitokhai = 0;	
			}else{
				pitokhai = parseInt($('input[name=pitokhai]').autoNumeric('get'));
			}
			if($('input[name=pkddongvat]').val() == ""){
				pkddongvat = 0;
			}else{
				pkddongvat = parseInt($('input[name=pkddongvat]').autoNumeric('get'));
			}
			if($('input[name=pkdthucvat]').val() == ""){
				pkdthucvat = 0;
			}else{
				pkdthucvat = parseInt($('input[name=pkdthucvat]').autoNumeric('get'));
			}
			if($('input[name=psinh]').val() == ""){
				psinh = 0;
			}else{
				psinh = parseInt($('input[name=psinh]').autoNumeric('get'));
			}
			ttien = cuoc + playlenh + nang + ha +pbtokhai + phqtiepnhan + hquan + pitokhai + pkddongvat + pkdthucvat + psinh;
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
		//$('input[id=nyeucau]').datepicker({dateFormat: 'yy-mm-dd'});
		//$('input[id=ndonghang]').datepicker({dateFormat: 'yy-mm-dd'});
		//$('input[id=ngiaohang]').datepicker({dateFormat: 'yy-mm-dd'});
		//$('input[id=nnhanhang]').datepicker({dateFormat: 'yy-mm-dd'});
		$('input[id=nhoanung]').datepicker({dateFormat: 'yy-mm-dd'});
		//jquery validation
		var validator = $('#content').validate({
			rules: {
				reason: { required: true, },
				ttien: { required: true, },
				tghung: { required: true, },
			},
			messages: {
				reason: {
					required: '<div class="text-danger"><em><small>Bạn chưa nhập lý do tạm ứng</small></em></div>'
				},
				ttien: {
					required: '<div class="text-danger"><em><small>Bạn chưa nhập số tiền</small></em></div>'
				},
				tghung: {
					required: '<div class="text-danger"><em><small>Bạn chưa nhập thời gian hoàn ứng</small></em></div>'
				},
			},
		});
		validator.resetForm();
});
