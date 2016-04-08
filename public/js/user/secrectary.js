$(function() {
	$('#message').confirm({
		title: '',
		content: 'Gui yeu cau lam hang thanh cong!',
		autoClose: 'confirm|3000',
		backgroundDismiss: true,
	});
	var $table = $('#tung').DataTable({
		"processing": true,
		"responsive": true,
		"serverSide": true,
		"ajax": '/secrectary/data',
		"dom": 'Bfrtip',
		"buttons": [
			{
				extend: 'excel',
				title: 'title',
				className: 'btn',
				text: 'Export excel file',
			},
			{
				extend: 'print',
				text: 'Print',
			},	

		],
		"columns": [
			{data: 'created_at', name: 'created_at'},
			{data: 'bill', name: 'bill'},
			{data: 'reason', name: 'reason'},
			{data: 'ttien', name: 'ttien', render: $.fn.dataTable.render.number(',','.',0,'') },
			{data: 'khang', name: 'khang', className: 'none' },
			{data: 'slc20', name: 'slc20', className: 'none'},
			{data: 'slc40', name: 'slc40', className: 'none'},
			{data: 'lcont', name: 'lcont', className: 'none'},
			{data: 'tghung', name: 'tghung'},
			{data: 'bke', name: 'bke', searchable: false, orderable: false},
			{data: 'status', name: 'status', searchable: false, orderable: false},
			{data: 'cuoc', name: 'cuoc', render: $.fn.dataTable.render.number(',','.',0,''), className: "none"  },
			{data: 'nang', name: 'nang', render: $.fn.dataTable.render.number(',','.',0,''), className: "none" },
			{data: 'ha', name: 'ha', render: $.fn.dataTable.render.number(',','.',0,''), className: "none" },
			{data: 'hquan', name: 'hquan', render: $.fn.dataTable.render.number(',','.',0,''), className: "none"},
			{data: 'psinh', name: 'psinh', render: $.fn.dataTable.render.number(',','.',0,''), className: "none"},
		]
	});

	$('button#test').click(function(e){
		alert('Hello world');
	});
	
});