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
		"ajax": '/director/data',
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
			{
				text: 'Select none',
				action: function(e, dt, node, config) {
					dt.rows().deselect();
				}
			}	

		],
		"columns": [
			{data: 'created_at', name: 'created_at'},
			{data: 'bill', name: 'bill'},
			{data: 'reason', name: 'reason'},
			{data: 'ttien', name: 'ttien', render: $.fn.dataTable.render.number(',','.',0,'', ' đ') },
			{data: 'khang', name: 'khang', className: 'none' },
			{data: 'slc20', name: 'slc20', className: 'none'},
			{data: 'slc40', name: 'slc40', className: 'none'},
			{data: 'lcont', name: 'lcont', className: 'none'},
			{data: 'tghung', name: 'tghung', className: 'text-center'},
			{data: 'bke', name: 'bke', searchable: false, orderable: false, className: 'none'},
			{data: 'status', name: 'status', searchable: false, orderable: false, className: 'text-center'},
			{data: 'cuoc', name: 'cuoc', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none"  },
			{data: 'nang', name: 'nang', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none" },
			{data: 'ha', name: 'ha', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none" },
			{data: 'hquan', name: 'hquan', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none"},
			{data: 'psinh', name: 'psinh', render: $.fn.dataTable.render.number(',','.',0,'', ' đ'), className: "none"},
		],
		"order": [[0, 'desc']]
	});
	$('#tung').on('click', 'button.duyet', function(e){
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
	$('#myModal1').on('hidden.bs.modal', function(e){
		$('#myModal1 #chapnhan').prop('disabled', false);
		var trs = $('#qttu tbody tr').toArray();
		trs.forEach(function(entry){
			entry.remove();
		});

	});
	$('#myModal1').on('show.bs.modal', function(e){
		var id = $(e.relatedTarget).data('id');
		$.ajax({
			url: '/qt-tam-ung/'+id,
			method: 'get',
			success: function(data){
				sttu = data['dntung'].ttien;
				
				stclai=sttu;
				$('span#ldtu').text(data['dntung'].reason);
				var value = (data['dntung'].ttien).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
				$('span#sttu').text(value+' đ');
				$('span#ntu').text(data['dntung'].created_at);
				if(data['qtoan'].length > 0){
					var stchdon=0
					data['qtoan'].forEach(function(item){
					var value1 = item.stien.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
					if(item.hdon){
						stchdon += item.stien;
					}
					stclai=stclai -item.stien;	
					$('tbody#qtoan').append('<tr class="input_fields_wrap"><td class="col-md-5">'+item.ldo+'</td> <td class="col-md-3" id="stien">'+value1+' đ</td> <td class="col-md-2">'+item.hdon+'</td><td class="col-md-2">'+item.nchi+'</td></tr>');
					});
					$('tbody#qtoan').append('<tr class="text-center"><td colspan="4"><em>Tong so tien da chi:&nbsp; <strong>'+myFormatCurrency(sttu-stclai)+' </strong></em></td></tr>');
					$('tbody#qtoan').append('<tr class="text-center"><td colspan="4"><em>So tien co hoa don:&nbsp; <strong>'+myFormatCurrency(stchdon)+' </strong></em>&nbsp;&nbsp;&nbsp;<em>So tien khong hoa don:&nbsp; <strong>'+myFormatCurrency(sttu-stclai-stchdon)+' </strong></em></td></tr>');
					$('tbody#qtoan').append('<tr class="text-center"><td colspan="4"><em>So tien chi ho khach hang:&nbsp; <strong>'+myFormatCurrency(1000)+' </strong></em></td></tr>');
				}else{
					$('tbody#qtoan').append('<tr class="text-center"><td colspan="4"><em>Chua co thong tin ve cac khoan chi</em></td></tr>');
					$('#myModal1 #chapnhan').prop('disabled', true);
				}
				var span_stclai = stclai.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
				$('span#stclai').text(span_stclai+' đ');
			},
			error: function(data){
				console.log('Error');
			}
		});
		$('#myModal1 #chapnhan').on('click', function(e){
			e.preventDefault();
			$.ajax({
				url: '/hoan-thanh/'+id,
				type: 'get',
				success: function(data){
					$('#myModal1').modal('hide');
				},
				error: function(data){
					alert('Error');
				}
			});
		});
	});





});
