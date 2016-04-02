{!! Form::open(array('url' => '/make-goods', 'method' => 'post', 'class' => 'form-horizontal', 'name' => 'content', 'id' => 'content')) !!}
<div class="form-group">
	{!! Form::label('bill', 'Booking/BL', array('class' => 'col-md-4 control-label')) !!}
	<div class='col-md-6'>{!! Form::text('bill', null, array('class' => 'form-control', 'id' => 'bill'))!!}</div>
</div>
<div class="form-group"><div class="col-md-6 col-md-offset-4">
		<button type="submit" class="btn btn-primary">Yeu cau</button> </div> </div>
{!! Form::close() !!}
