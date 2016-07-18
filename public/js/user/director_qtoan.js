$(function(){
	function danhso(){
	  var rows = $('table#qttu_cont').find('tbody').find('tr');
	  for (var i = 0, len = rows.length; i < len; i++){
		  $(rows[i]).children("td:nth-child(1)").html(i+1);
  }
	  var rows_second = $('table#qttu_ps').find('tbody').find('tr');
	  for (var i = 0, len = rows_second.length; i < len; i++){
		  $(rows_second[i]).children("td:nth-child(1)").html(i+1);
  }
	}
	danhso();
	var url = location.href;
	var tuid = url.split('/').pop();
	$('form#content1').attr('action', '/hoan-thanh/'+tuid);
});
