@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
<h3 class='col-md-8 col-md-offset-3'>CAP NHAT DE NGHI TAM UNG</h3>
{!! Form::model($dntu, ['method' => 'PATCH','url' => ['/dntu/cap-nhat', $dntu->id], 'files' => true, 'class' => 'form-horizontal', 'id' => 'content']) !!}

<div id="khang" class='form-group required'>
{!! Form::label('khang', 'Hình thức hàng', ['class' => 'col-md-3 control-label']) !!}
<div class='col-md-8'>
{!! Form::select('khang', ['Xuất' => 'Xuất', 'Nhập' => 'Nhập', 'Kinh doanh nội địa' => 'Kinh doanh nội địa'], null, ['placeholder' => 'Chọn kiểu hàng', 'class' => 'form-control']) !!}
</div>
</div>
<div class='form-group'>
{!! Form::label('loaihang', 'Loại hàng', ['class' => 'col-md-3 control-label']) !!}
<div class='col-md-8'>
{!! Form::text('loaihang', null, ['class' => 'form-control']) !!}
</div>
</div>
<div class='form-group'>
{!! Form::label('khachhang', 'Khách hàng', ['class' => 'col-md-3 control-label']) !!}
<div class='col-md-8'>
{!! Form::text('khachhang', null, ['class' => 'form-control']) !!}
</div>
</div>
<div class="form-group required">
	{!! Form::label('bill', 'Booking/Bill', array('class' => 'col-md-3 control-label')) !!}
	<div class='col-md-8'>{!! Form::text('bill', null, array('class' => 'form-control', 'id' => 'bill'))!!}</div>
</div>
<div class='form-group'>
{!! Form::label('stkhai', 'So to khai', ['class' => 'col-md-3 control-label']) !!}
<div class='col-md-8'>
{!! Form::text('stkhai', null, ['class' => 'form-control']) !!}
</div>
</div>
<div class='form-group required'>
{!! Form::label('lcont', 'Loại cont', ['class' => 'col-md-3 control-label']) !!}
<div class='col-md-8'>
{!! Form::select('lcont', ['Nóng' => 'Nóng', 'Lạnh' => 'Lạnh', 'nonglanh' => 'Nóng & Lạnh'], null, ['placeholder' => 'Chọn loại cont', 'class' => 'form-control']) !!}
</div>
</div>
<div class='form-group'>
{!! Form::label('slcont', 'Số lượng cont', ['class' => 'col-md-3 control-label']) !!}
<div class='col-md-8'>
{!! Form::number('slcont', null, ['class' => 'form-control']) !!}
</div>
</div>
<div class='form-group'>
{!! Form::label('slc20', 'Số lượng cont 20', ['class' => 'col-md-3 control-label']) !!}
<div class='col-md-8'>
{!! Form::number('slc20', null, ['class' => 'form-control']) !!}
</div>
</div>
<div class='form-group'>
{!! Form::label('slc40', 'Số lượng cont 40', ['class' => 'col-md-3 control-label']) !!}
<div class='col-md-8'>
{!! Form::number('slc40', null, ['class' => 'form-control']) !!}
</div>
</div>
<div class='form-group'>
{!! Form::label('slchroi', 'Số lượng cont hang roi', ['class' => 'col-md-3 control-label']) !!}
<div class='col-md-8'>
{!! Form::number('slchroi', null, ['class' => 'form-control']) !!}
</div>
</div>
<div class='form-group'>
{!! Form::label('slcnong', 'Số lượng cont nong', ['class' => 'col-md-3 control-label']) !!}
<div class='col-md-8'>
{!! Form::number('slcnong', null, ['class' => 'form-control']) !!}
</div>
</div>
<div class='form-group'>
{!! Form::label('slclanh', 'Số lượng cont lanh', ['class' => 'col-md-3 control-label']) !!}
<div class='col-md-8'>
{!! Form::number('slclanh', null, ['class' => 'form-control']) !!}
</div>
</div>
<div class='form-group'>
{!! Form::label('nhaxe', 'Nha xe', ['class' => 'col-md-3 control-label']) !!}
<div class='col-md-8'>
{!! Form::text('nhaxe', null, ['class' => 'form-control']) !!}
</div>
</div>
<div class='form-group'>
{!! Form::label('hangtau', 'Hang tau', ['class' => 'col-md-3 control-label']) !!}
<div class='col-md-8'>
{!! Form::text('hangtau', null, ['class' => 'form-control']) !!}
</div>
</div>
<div class='form-group'>
{!! Form::label('tuyenduong', 'Tuyến đường', ['class' => 'col-md-3 control-label']) !!}
<div class='col-md-8'>
{!! Form::text('tuyenduong', null, ['class' => 'form-control']) !!}
</div>
</div>
<div class='form-group required'>
	{!! Form::label('nyeucau','Ngày yêu cầu', array('class' => 'col-md-3 control-label')) !!}
	<div class='col-md-8'>{!! Form::text('nyeucau', \Carbon\Carbon::now()->format('Y-m-d'), array('class' => 'form-control', 'id' => 'nyeucau'))!!}</div>
</div>
<div class='form-group required'>
	{!! Form::label('ndonghang','Ngày đóng hàng', array('class' => 'col-md-3 control-label')) !!}
	<div class='col-md-8'>{!! Form::text('ndonghang', \Carbon\Carbon::now()->format('Y-m-d'), array('class' => 'form-control', 'id' => 'ndonghang'))!!}</div>
</div>
<div id="input-ngaygiaohang" class='form-group required hidden disabled'>
	{!! Form::label('ngiaohang','Ngày giao hàng', array('class' => 'col-md-3 control-label')) !!}
	<div class='col-md-8'>{!! Form::date('ngiaohang', \Carbon\Carbon::now(), array('class' => 'form-control'))!!}</div>
</div>
<div id="input-ngaynhanhang" class='form-group required hidden disabled'>
	{!! Form::label('nnhanhang','Ngày nhận hàng', array('class' => 'col-md-3 control-label')) !!}
	<div class='col-md-8'>{!! Form::date('nnhanhang', \Carbon\Carbon::now(), array('class' => 'form-control'))!!}</div>
</div>
<div class='form-group required'>
	{!! Form::label('filebooking','File Booking', array('class' => 'col-md-3 control-label')) !!}
	<div class='col-md-8'>{!! Form::file('filebooking')!!}</div>
</div>
<div class="form-group"><div class="col-md-8 col-md-offset-3">
		<button type="submit" class="btn btn-primary" id='dntung'>Cap Nhat</button> </div> </div>
{!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
@section('javascript')
<script type='text/javascript' src='/js/user/proponent/capnhat_dntung.js'></script>
@endsection
