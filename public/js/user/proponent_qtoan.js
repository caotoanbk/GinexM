$(function(){
	var url = location.href;
	var tuid = url.split('/').pop();
	$('form#content1').attr('action', '/quyet-toan/'+tuid);
	$('#them_cont').click(function(e){
		e.preventDefault();
		$('tbody#qtoan_cont').append('<tr class="input_fields_wrap"><td class="text-danger text-center"><a href="#" id="remove_item" class="text-danger">&times;</a></td><td><input type="date" name="nchay[]"/></td><td><input type="text" name="scont[]" size="15"/></td><td><input type="text" name="ccont[]" size="10"/></td><td><input type="text" name="lcont[]" size="15"/></td><td><input type="text" name="bainang[]" size="25" /></td><td><input type="text" name="baiha[]" size="25" /></td><td><input type="number" name="trongluong[]" /></td><td><input type="text" name="dieuxe[]" size="20" /></td><td><input type="text" name="lxe[]" size="15"/></td><td><input type="text" name="bsxe[]" size="15"/></td><td><input type="text" name="diadiemdongtrahang[]" size="25"/></td><td><input type="text" name="phinangchuaVAT[]" size="15"/></td><td><input type="text" name="VATphinang[]" size="15"/></td><td><input type="text" name="sohoadonnang[]" size="15"/></td><td><input type="date" name="nxuathoadonnang[]"/></td><td><input type="text" name="dvicaphoadonnang[]" size="15"/></td><td><input type="text" name="phihachuaVAT[]" size="15"/></td><td><input type="text" name="VATphiha[]" size="15"/></td><td><input type="text" name="sohoadonha[]" size="15"/></td><td><input type="date" name="nxuathoadonha[]"/></td><td><input type="text" name="dvicaphoadonha[]" size="15"/></td><td><input type="text" name="boctokhai[]" size="15"/></td><td><input type="text" name="hquantiepnhan[]" size="15"/></td><td><input type="text" name="hquangiamsat[]" size="15"/></td><td><input type="text" name="hquankiemhoa[]" size="15"/></td><td><input type="text" name="cuoccont[]" size="15"/></td><td><input type="text" name="llenhhangtau[]" size="15"/></td><td><input type="text" name="luucont[]" size="15"/></td><td><input type="text" name="luubai[]" size="15"/></td><td><input type="text" name="phivesinh[]" size="15"/></td><td><input type="text" name="phicatday[]" size="15"/></td><td><input type="text" name="boctem[]" size="15"/></td><td><input type="text" name="kddtvchuaVAT[]" size="30"/></td><td><input type="text" name="VATkddtv[]" size="30"/></td><td><input type="text" name="phingoaikddtv[]" size="30"/></td><td><input type="text" name="cackhoankhacchokhach[]" size="30"/></td><td><input type="text" name="tong[]" size="15"/></td><td><input type="text" name="ghichu[]" size="50"/></td></tr>');

	
		$('input[name="phinangchuaVAT[]"]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		$('input[name="VATphinang[]"]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		$('input[name="phihachuaVAT[]"]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		$('input[name="VATphiha[]"]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		$('input[name="boctokhai[]"]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		$('input[name="hquantiepnhan[]"]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		$('input[name="hquangiamsat[]"]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		$('input[name="hquankiemhoa[]"]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		$('input[name="cuoccont[]"]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		$('input[name="llenhhangtau[]"]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		$('input[name="luucont[]"]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		$('input[name="luubai[]"]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		$('input[name="phivesinh[]"]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		$('input[name="phicatday[]"]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		$('input[name="boctem[]"]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		$('input[name="kddtvchuaVAT[]"]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		$('input[name="VATkddtv[]"]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		$('input[name="phingoaikddtv[]"]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		$('input[name="cackhoankhacchokhach[]"]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
	});

	$('#them_psinh').click(function(e){
		e.preventDefault();
		$('tbody#cppsinh').append('<tr><td class="text-danger text-center"><a href="#" id="remove_item" class="text-danger">&times;</a></td><td><input type="text" name="ldo[]" size="50"/></td><td><input type="text" name="stien[]" size="15"/></td><td><input type="text" name="hdon[]" size="15"/></td><td><input type="text" name="nphanh[]" size="15"/></td><td><input type="text" name="ccho[]" size="15"/></td><td><input type="date" name="nchi[]"/></td><td><input type="text" name="gchu[]" size="50"/></td></tr>');
		$('input[name="stien[]"]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
	});

	$('#qttu_cont').on('click', 'a#remove_item', function(e){
		e.preventDefault();
		$(this).parent('td').parent('tr').remove();
	});
	$('#qttu_ps').on('click', 'a#remove_item', function(e){
		e.preventDefault();
		$(this).parent('td').parent('tr').remove();
	});
	$('#qtoan_cont').on('click', 'a#remove_item_ajax', function(e){
		e.preventDefault();
		$tempt = $(this);
		qtcid = $(this).data('id');
		$.ajax({
			url: '/delete-quyet-toan-cont/'+tuid+'/'+qtcid,
			method: 'get',
			success: function(data){
				console.log('Success');
				$tempt.parent('td').parent('tr').remove();
			},
			error: function(data){
				console.log('Error');
			}
		});
	});
	$('#cppsinh').on('click', 'a#remove_item_ajax', function(e){
		e.preventDefault();
		$tempt = $(this);
		cppsid = $(this).data('id');
		$.ajax({
			url: '/delete-quyet-toan-phat-sinh/'+tuid+'/'+cppsid,
			method: 'get',
			success: function(data){
				console.log('Success');
				$tempt.parent('td').parent('tr').remove();
			},
			error: function(data){
				console.log('Error');
			}
		});
	});
});
