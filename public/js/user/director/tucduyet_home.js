$(function() {
	function myFormatCurrency (money) {
		return	money.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")+' đ';
	}
	var $table = $('#tung').DataTable({
		"processing": true,
		"responsive": false ,
        "select": {
            style:    'os',
			selector: 'td:first-child'
        },
		"responsive": true,
		"serverSide": true,
		"ajax": '/director/tucduyet/data',
		"dom": 'Bfrtip',
		"buttons": [
		],
		"columns": [
			{data: 'created_at', name: 'dntungs.created_at'},
			{data: 'name', name: 'users.name'},
			{data: 'bill', name: 'dntungs.bill'},
			{data: 'reason', name: 'dntungs.reason'},
			{data: 'ttien', name: 'dntungs.ttien', render: $.fn.dataTable.render.number(',','.',0,'', ' đ') },
			{data: 'khang', name: 'dntungs.khang', className: 'none' },
			{data: 'slc20', name: 'dntungs.slc20', className: 'none'},
			{data: 'slc40', name: 'dntungs.slc40', className: 'none'},
			{data: 'lcont', name: 'dntungs.lcont', className: 'none'},
			{data: 'tghung', name: 'dntungs.tghung', className: 'text-center'},
			{data: 'status', name: 'status', searchable: false, orderable: false, className: 'text-center'},
			{data: 'cuoc', name: 'dntungs.cuoc', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none"  },
			{data: 'nang', name: 'dntungs.nang', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none" },
			{data: 'ha', name: 'dntungs.ha', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none" },
			{data: 'hquan', name: 'dntungs.hquan', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none"},
			{data: 'psinh', name: 'dntungs.psinh', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none"},
		],
		"order": [[0, 'desc']]
	});
	$('#tung').on('click', 'a.duyet',  function(e){
		alert('Hello');
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
