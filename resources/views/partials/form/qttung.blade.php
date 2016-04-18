{!! Form::open(array('url' => '/quyet-toan', 'method' => 'post', 'class' => 'form-horizontal', 'files' => true, 'name' => 'content', 'id' => 'content1')) !!}
<div class="form-group required">
	{!! Form::label('stclai', 'So tien', array('class' => 'col-md-4 control-label')) !!}
	<div class='col-md-4'>{!! Form::text('stclai', null, array('class' => 'form-control', 'id' => 'stclai'))!!}</div>
</div>
<div class='col-md-8 col-md-offset-4'><h4>CHI TIET CAC KHOAN CHI</h4></div>
<div class='col-md-8 col-md-offset-3'>&nbsp;</div>
<table class='table table-bordered' id="qttu">
<thead>
	<tr>
		<th>Ly do chi</th>
		<th>So tien</th>
		<th>Hoa don</th>
		<th>Ngay chi</th>
		<th>Xoa</th>
	</tr>
</thead>
<tbody id='qtoan'>
</tbody>
</table>
<button id='them' class="btn btn-primary">Them</button>
<button id='them' class="btn btn-primary">Quyet toan</button>
{!! Form::close() !!}
