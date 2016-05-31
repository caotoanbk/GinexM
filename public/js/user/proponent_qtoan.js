$(function(){
	var url = location.href;
	var tuid = url.split('/').pop();
	$('form#content1').attr('action', '/quyet-toan/'+tuid);
	$('#them_cont').click(function(e){
		e.preventDefault();
		$('tbody#qtoan_cont').append('<tr class="input_fields_wrap"><td class="text-danger text-center"><a href="#" id="remove_item" class="text-danger">&times;</a></td><td><input type="date" name="nchay[]"/></td><td><input type="text" name="bsxe[]" size="15"/></td><td><input type="text" name="lxe[]" size="15"/></td><td><input type="text" name="scont[]" size="15"/></td><td><input type="text" name="ccont[]" size="10"/></td><td><input type="text" name="lcont[]" size="15"/></td><td><input type="text" name="nxe[]" size="15"/></td><td><input type="text" name="pnha[]" size="15"/></td><td><input type="text" name="khquan[]" size="20"/></td><td><input type="text" name="cxe[]" size="15"/></td><td><input type="text" name="cgui[]" size="15"/></td><td><input type="text" name="cmua[]" size="15"/></td><td><input type="text" name="gvcVAT[]" size="15"/></td><td><input type="text" name="gvdchinh[]" size="15"/></td><td><input type="text" name="cbcVAT[]" size="20"/></td></tr>');

	
		$('input[name="pnha[]"]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		$('input[name="khquan[]"]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		$('input[name="cxe[]"]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		$('input[name="cgui[]"]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		$('input[name="cmua[]"]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		$('input[name="gvcVAT[]"]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		$('input[name="cbcVAT[]"]').autoNumeric('init', {
			aSep:'.',
			aDec: ',',
			aSign: ' VND',
			pSign: 's',
			aPad: false,	
		});
		$('input[name="gvdchinh[]"]').autoNumeric('init', {
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
