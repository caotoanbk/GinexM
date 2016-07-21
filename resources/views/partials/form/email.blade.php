{!! Form::open(array('url' => '/sendemail', 'method' => 'post', 'class' => 'form-horizontal', 'files' => true, 'name' => 'content', 'id' => 'content')) !!}
	{!! Form::hidden('id') !!}
	<div class='form-group'>
		<label class="col-md-3 control-label">Số bill/booking</label>
		<div class='col-md-8' id="emailmodal_booking"></div>
	</div>
	<div class='form-group'>
	{!! Form::label('yeucauemail', 'Nội dung', ['class' => 'col-md-3 control-label']) !!}
	<div class='col-md-8'>
	{!! Form::textarea('yeucauemail', null, ['class' => 'form-control']) !!}
	</div>
	</div>
	<div class="form-group"><div class="col-md-8 col-md-offset-3">
		<button type="submit" class="btn btn-primary" id='dntung'>Send Email</button> </div> </div>
{!! Form::close() !!}
