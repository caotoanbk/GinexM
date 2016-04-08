{!! Form::open(array('url' => '/make-goods', 'method' => 'post', 'class' => 'form-horizontal', 'files' => true, 'name' => 'content', 'id' => 'content')) !!}
<div class="form-group required">
	{!! Form::label('bill', 'Booking/BL', array('class' => 'col-md-3 control-label')) !!}
	<div class='col-md-8'>{!! Form::text('bill', null, array('class' => 'form-control', 'id' => 'bill'))!!}</div>
</div>
<div class='form-group'>
	<div class='col-md-8 col-md-offset-3'>
	<input id='checkbct' type='checkbox' name='checbct' value='check' checked=false>Toi da kiem tra bo chung tu
	</div>
</div>
<div id='input-hidden' class='hidden'>
<div class='form-group'><div class="col-md-8 col-md-offset-3"><h4>DE NGHI TAM UNG</h4></div></div>
<div class='form-group required'>
{!! Form::label('reason', 'Ly do tam ung', ['class' => 'col-md-3 control-label']) !!}
<div class='col-md-8'>
{!! Form::text('reason', null, ['class' => 'form-control']) !!}
</div>
</div>
<div class='form-group'>
{!! Form::label('slc20', 'So luong cont 20', ['class' => 'col-md-3 control-label']) !!}
<div class='col-md-8'>
{!! Form::number('slc20', null, ['class' => 'form-control']) !!}
</div>
</div>
<div class='form-group'>
{!! Form::label('slc40', 'So luong cont 40', ['class' => 'col-md-3 control-label']) !!}
<div class='col-md-8'>
{!! Form::number('slc40', null, ['class' => 'form-control']) !!}
</div>
</div>
<div class='form-group required'>
{!! Form::label('lcont', 'Loai cont', ['class' => 'col-md-3 control-label']) !!}
<div class='col-md-8'>
{!! Form::select('lcont', ['Nong' => 'Nong', 'Lanh' => 'Lanh'], null, ['placeholder' => 'Chon loai cont', 'class' => 'form-control']) !!}
</div>
</div>
<div class='form-group required'>
{!! Form::label('khang', 'Hinh thuc hang', ['class' => 'col-md-3 control-label']) !!}
<div class='col-md-8'>
{!! Form::select('khang', ['Xuat' => 'Xuat', 'Nhap' => 'Nhap'], null, ['placeholder' => 'Chon hinh thuc hang', 'class' => 'form-control']) !!}
</div>
</div>
<div class='form-group'>
{!! Form::label('cuoc', 'Cuoc', array('class' => 'col-md-3 control-label')) !!}
<div class='col-md-8'>{!! Form::text('cuoc', null, array('class' => 'form-control')) !!}</div>
</div>
<div class='form-group'>
{!! Form::label('nang', 'Nang', array('class' => 'col-md-3 control-label')) !!}
<div class='col-md-8'>{!! Form::text('nang', null, array('class' => 'form-control')) !!}</div>
</div>
<div class='form-group'>
{!! Form::label('ha', 'Ha', array('class' => 'col-md-3 control-label')) !!}
<div class='col-md-8'>{!! Form::text('ha', null, array('class' => 'form-control')) !!}</div>
</div>
<div class='form-group'>
{!! Form::label('hquan', 'Ki HQ giam sat', array('class' => 'col-md-3 control-label')) !!}
<div class='col-md-8'>{!! Form::text('hquan', null, array('class' => 'form-control')) !!}</div>
</div>
<div class='form-group'>
{!! Form::label('psinh', 'Phat sinh(neu co)', array('class' => 'col-md-3 control-label')) !!}
<div class='col-md-8'>{!! Form::text('psinh', null, array('class' => 'form-control')) !!}</div>
</div>
<div class='form-group'>
{!! Form::label('ttien', 'Tong', array('class' => 'col-md-3 control-label')) !!}
<div class='col-md-8'>{!! Form::text('ttien', null, array('class' => 'form-control')) !!}</div>
</div>
<div class='form-group required'>
	{!! Form::label('tghung','Hoan ung', array('class' => 'col-md-3 control-label')) !!}
	<div class='col-md-8'>{!! Form::date('tghung', \Carbon\Carbon::now(), array('class' => 'form-control'))!!}</div>
</div>
<div class='form-group required'>
	{!! Form::label('bke', 'Ban ke chi tiet', array('class' => 'col-md-3 control-label')) !!}
	<div class='col-md-8'>{!! Form::file('bke',null) !!}</div>
</div>

<div class="form-group"><div class="col-md-8 col-md-offset-3">
		<button type="submit" class="btn btn-primary" id='dntung'>De Nghi Tam Ung</button> </div> </div>
</div>
{!! Form::close() !!}
