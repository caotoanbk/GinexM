{!! Form::open(array('url' => '/quyet-toan', 'method' => 'post', 'class' => 'form-horizontal', 'files' => true, 'name' => 'content', 'id' => 'content1')) !!}
<div class="form-group required">
	{!! Form::label('stclai', 'Số tiền', array('class' => 'col-md-4 control-label')) !!}
	<div class='col-md-4'>{!! Form::text('stclai', null, array('class' => 'form-control', 'id' => 'stclai'))!!}</div>
</div>
<div class='col-md-8 col-md-offset-4'><h4>CHI TIẾT CÁC KHOẢN CHI</h4></div>
<div class='col-md-8 col-md-offset-3'>&nbsp;</div>
<table class='table table-bordered' id="qttu">
<thead>
	<tr>
		<th>Lý do chi</th>
		<th>Số tiền</th>
		<th>Hóa đơn</th>
		<th>Ngày chi</th>
		<th>Xóa</th>
	</tr>
</thead>
<tbody id='qtoan'>
</tbody>
</table>
<button id='them' class="btn btn-primary">Thêm</button>
<button id='them' class="btn btn-primary">Quyết toán</button>
{!! Form::close() !!}
