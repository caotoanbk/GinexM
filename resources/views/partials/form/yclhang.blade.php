{!! Form::open(array('url' => '/make-goods', 'method' => 'post', 'class' => 'form-horizontal', 'files' => true, 'name' => 'content', 'id' => 'content')) !!}
<div class="form-group">
	{!! Form::label('bill', 'Booking/BL', array('class' => 'col-md-4 control-label')) !!}
	<div class='col-md-6'>{!! Form::text('bill', null, array('class' => 'form-control', 'id' => 'bill'))!!}</div>
</div>
<div class='form-group'>
	<div class='col-md-6 col-md-offset-4'>
	<input id='checkbct' type='checkbox' name='checbct' value='check' checked=false>Toi da kiem tra bo chung tu
	</div>
</div>
<div id='input-hidden' class='hidden'>
<div class='form-group'><div class="col-md-6 col-md-offset-4"><h4>De Nghi Tam Ung</h4></div></div>
<div class='form-group'>
	{!! Form::label('tghung','Thoi gian hoan ung', array('class' => 'col-md-4 control-label')) !!}
	<div class='col-md-6'>{!! Form::text('tghung', null, array('class' => 'form-control'))!!}</div>
	{!! Form::label('bke', 'Ban ke chi tiet', array('class' => 'col-md-4 control-label')) !!}
	<div class='col-md-6'>{!! Form::file('bke') !!}</div>
</div>

<div class="form-group"><div class="col-md-6 col-md-offset-4">
		<button type="submit" class="btn btn-primary" id='dntung'>De Nghi Tam Ung</button> </div> </div>
</div>
{!! Form::close() !!}
