$(function() {
	$('div.alert').delay(3000).slideUp(300);
	var sttu, stclai, stclaitemp;
	var $table = $('#tung').DataTable({
		"processing": true,
		"responsive": false ,
        "select": {
            style:    'single',
			selector: 'tr'
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
			targets:0 
		},{
			className: 'control',
			orderable: false,
			targets:1 
		}],
		"serverSide": true,
		"ajax": {'url':'/secrectary/khlhang/data', 'type': 'get', 'headers': { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }},
		"dom": 'Bfrtip',
		"buttons": [ ],
		"columns": [
			{data: 'resp', name: 'resp', searchable: false, orderable: false},
			{data: 'check', name: 'check', searchable: false, orderable: false},
			{data: 'name', name: 'name', className: 'desktop'},
			{data: 'created_at', name: 'dntungs.created_at'},
			{data: 'khang', name: 'khang', className: 'desktop'},
			{data: 'loaihang', name: 'loaihang', className: 'desktop'},
			{data: 'khachhang', name: 'khachhang', className: 'desktop'},
			{data: 'bill', name: 'bill', className: 'all'},
			{data: 'stokhai', name: 'stokhai'},
			{data: 'slcont', name: 'slcont', className: 'none', className: 'desktop'},
			{data: 'slc20', name: 'slc20', className: 'none'},
			{data: 'slc40', name: 'slc40', className: 'none'},
			{data: 'slchroi', name: 'slchroi', className: 'none'},
			{data: 'slcnong', name: 'slcnong', className: 'none'},
			{data: 'slclanh', name: 'slclanh', className: 'none'},
			{data: 'hangtau', name: 'hangtau'},
			{data: 'tuyenduong', name: 'tuyenduong', className: 'none'},
			{data: 'nyeucau', name: 'dntungs.nyeucau', className: 'none'},
			{data: 'ndonghang', name: 'dntungs.ndonghang', className: 'desktop'},
			{data: 'ngiaohang', name: 'dntungs.ngiaohang', className: 'desktop'},
			{data: 'nhaxe', name: 'nhaxe', className: 'none'},
			{data: 'filebooking', name: 'filebooking', className: 'none', searchable: false, orderable: false},
			{data: 'status', name: 'status', searchable: false, orderable: false, className: 'all'},
		],
		"order": [[3, 'desc']]
	});
});
