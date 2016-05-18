$(function(){
	$('#them_cont').click(function(e){
		e.preventDefault();
		$('tbody#qtoan_cont').append('<tr class="input_fields_wrap"><td class="text-danger text-center"><a href="#" id="remove_item" class="text-danger">&times;</a></td><td><input type="date" name="nchay[]" /></td><td><input type="text" name="bsxe[]" size="15"/></td><td><input type="text" name="lxe[]" size="15"/></td><td><input type="text" name="scont[]" size="15"/></td><td><input type="text" name="ccont[]" size="10"/></td><td><input type="text" name="lcont[]" size="15"/></td><td><input type="text" name="nxe[]" size="15"/></td><td><input type="text" name="pnha[]" size="15"/></td><td><input type="text" name="khquan[]" size="15"/></td><td><input type="text" name="cxe[]" size="15"/></td><td><input type="text" name="cgui[]" size="15"/></td><td><input type="text" name="cmua[]" size="15"/></td><td><input type="text" name="gvcVAT[]" size="15"/></td><td><input type="text" name="cbcVAT[]" size="15"/></td></tr>');

	
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
	});

	$('#them_psinh').click(function(e){
		e.preventDefault();
		alert('Them phat sinh');
	});

	$('#qttu_cont').on('click', 'a#remove_item', function(e){
		e.preventDefault();
		$(this).parent('td').parent('tr').remove();
	});
});
