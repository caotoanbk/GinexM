$(function(){
	var validator = $('#tongkettamung').validate({
		rules: {
			month_tket: { required: true },
		},
		messages: {
			month_tket: {
				required: '<div class="text-danger"><em><small>Bạn chưa nhập tháng tổng kết</small></em></div>'
			}
		}
	});
	validator.resetForm();
});
