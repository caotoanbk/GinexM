$(function(){
	var url = location.href;
	var tuid = url.split('/').pop();
	$('form#content1').attr('action', '/hoan-thanh/'+tuid);
});
