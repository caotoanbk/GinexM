$(function() {
	var $table = $('#tung').DataTable({
		"processing": true,
		"select": {
			style: 'os',
			selector: 'td:first-child'
		},
		"responsive": {
			details: {
				type: 'column',
				target: 1
			}
		},
		"columnDefs": [{
				orderable: false,
				className: 'select-checkbox',
				targets: 0
			},{
				className: 'control',
				orderable: false,
				targets: 1
			}],
		"serverSide": true,
		"ajax": '/secrectary/data',
		"dom": 'Bfrtip',
		"buttons": [
			{
				text: 'In phieu chi',
				className: 'btn',
				action: function(e, dt, node, config){
					var selectedRows = dt.rows( {selected: true}).toArray();
					var ids=[];
					selectedRows[0].forEach(function(item){
						ids.push(dt.rows(item).data().toArray()[0].id);
					});
					window.location.href = '/bieumau/phieuchi?arr=' + JSON.stringify(ids);
				}
			},
			{
				text: 'In phieu thu',
				className: 'btn',
				action: function(e, dt, node, config){
					var selectedRows = dt.rows( {selected: true}).toArray();
					var ids = [];
					selectedRows[0].forEach(function(item){
						ids.push(dt.rows(item).data().toArray()[0].id);
					});
					$.ajax({
						url: '/check-done?arr=' + JSON.stringify(ids),
						method: 'get',
						success: function(data){
							if(data == 'ok'){

								window.location.href = '/bieumau/phieuthu?arr=' + JSON.stringify(ids);
							}else{
								$.alert({
									title: '',
									content: 'Ban da lua chon 1 de nghi tam ung chua hoan thanh',
									backgroundDismiss: true,
								});
							}
						},
						error: function(data){
							alert('Error');
						}
					});
				}
			},
			{
				text: 'Select none',
				action: function(e, dt, node, config){
					dt.rows().deselect();
				}
			}
		],
		"columns": [
			{data: 'resp', name: 'resp', searchable: false, orderable: false},
			{data: 'check', name: 'check'},
			{data: 'created_at', name: 'created_at'},
			{data: 'bill', name: 'bill'},
			{data: 'reason', name: 'reason'},
			{data: 'ttien', name: 'ttien', render: $.fn.dataTable.render.number(',','.',0,'', ' đ') },
			{data: 'khang', name: 'khang', className: 'none' },
			{data: 'slc20', name: 'slc20', className: 'none'},
			{data: 'slc40', name: 'slc40', className: 'none'},
			{data: 'lcont', name: 'lcont', className: 'none'},
			{data: 'tghung', name: 'tghung'},
			{data: 'bke', name: 'bke', searchable: false, orderable: false, className: 'none'},
			{data: 'status', name: 'status', searchable: false, orderable: false},
			{data: 'cuoc', name: 'cuoc', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none"  },
			{data: 'nang', name: 'nang', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none" },
			{data: 'ha', name: 'ha', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none" },
			{data: 'hquan', name: 'hquan', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none"},
			{data: 'psinh', name: 'psinh', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none"},
		],
		"order": [[2, "desc"]]
	});
});
