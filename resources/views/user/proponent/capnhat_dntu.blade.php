@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
<h3 class='col-md-8 col-md-offset-3'>CAP NHAT DE NGHI TAM UNG</h3>
{!! Form::model($dntu, ['method' => 'PATCH','url' => ['/dntu/cap-nhat', $dntu->id], 'class' => 'form-horizontal', 'id' => 'content']) !!}
<div class="form-group required">
	{!! Form::label('bill', 'Booking/BL', array('class' => 'col-md-3 control-label')) !!}
	<div class='col-md-8'>{!! Form::text('bill', null, array('class' => 'form-control', 'id' => 'bill'))!!}</div>
</div>
<div class='form-group required'>
{!! Form::label('reason', 'Lý do tạm ứng', ['class' => 'col-md-3 control-label']) !!}
<div class='col-md-8'>
{!! Form::text('reason', null, ['class' => 'form-control']) !!}
</div>
</div>
<div class='form-group'>
{!! Form::label('khachhang', 'Khách hàng', ['class' => 'col-md-3 control-label']) !!}
<div class='col-md-8'>
{!! Form::text('khachhang', null, ['class' => 'form-control']) !!}
</div>
</div>
<div class='form-group'>
{!! Form::label('loaihang', 'Loại hàng', ['class' => 'col-md-3 control-label']) !!}
<div class='col-md-8'>
{!! Form::text('loaihang', null, ['class' => 'form-control']) !!}
</div>
</div>
<div class='form-group required'>
	{!! Form::label('ndonghang','Ngày đóng hàng', array('class' => 'col-md-3 control-label')) !!}
	<div class='col-md-8'>{!! Form::text('ndonghang', $dntu->ndonghang, array('class' => 'form-control', 'id' => 'ndonghang'))!!}</div>
</div>
<div class='form-group'>
{!! Form::label('tuyenduong', 'Tuyến đường', ['class' => 'col-md-3 control-label']) !!}
<div class='col-md-8'>
{!! Form::text('tuyenduong', null, ['class' => 'form-control']) !!}
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
<div class='form-group required'>
{!! Form::label('lcont', 'Loại cont', ['class' => 'col-md-3 control-label']) !!}
<div class='col-md-8'>
{!! Form::select('lcont', ['Nóng' => 'Nóng', 'Lạnh' => 'Lạnh'], null, ['placeholder' => 'Chọn loại cont', 'class' => 'form-control']) !!}
</div>
</div>
<div class='form-group required'>
{!! Form::label('khang', 'Hình thức hàng', ['class' => 'col-md-3 control-label']) !!}
<div class='col-md-8'>
{!! Form::select('khang', ['Xuất' => 'Xuất', 'Nhập' => 'Nhập'], null, ['placeholder' => 'Chọn kiểu hàng', 'class' => 'form-control']) !!}
</div>
</div>
<div class='form-group'>
{!! Form::label('cuoc', 'Cược', array('class' => 'col-md-3 control-label')) !!}
<div class='col-md-8'>{!! Form::text('cuoc', null, array('class' => 'form-control')) !!}</div>
</div>
<div class='form-group'>
{!! Form::label('nang', 'Nâng', array('class' => 'col-md-3 control-label')) !!}
<div class='col-md-8'>{!! Form::text('nang', null, array('class' => 'form-control')) !!}</div>
</div>
<div class='form-group'>
{!! Form::label('ha', 'Hạ', array('class' => 'col-md-3 control-label')) !!}
<div class='col-md-8'>{!! Form::text('ha', null, array('class' => 'form-control')) !!}</div>
</div>
<div class='form-group'>
{!! Form::label('hquan', 'Kí HQ giám sát', array('class' => 'col-md-3 control-label')) !!}
<div class='col-md-8'>{!! Form::text('hquan', null, array('class' => 'form-control')) !!}</div>
</div>
<div class='form-group'>
{!! Form::label('psinh', 'Phát sinh(nếu có)', array('class' => 'col-md-3 control-label')) !!}
<div class='col-md-8'>{!! Form::text('psinh', null, array('class' => 'form-control')) !!}</div>
</div>
<div class='form-group'>
{!! Form::label('ttien', 'Tổng', array('class' => 'col-md-3 control-label')) !!}
<div class='col-md-8'>{!! Form::text('ttien', null, array('class' => 'form-control', 'readonly' => 'true')) !!}</div>
</div>
<div class='form-group'>
{!! Form::label('ttien_ltron', 'Tổng tiền làm tròn', array('class' => 'col-md-3 control-label')) !!}
<div class='col-md-8'>{!! Form::text('ttien_ltron', null, array('class' => 'form-control', 'readonly' => 'true')) !!}</div>
</div>
<div class='form-group required'>
	{!! Form::label('tghung','Hoàn ứng', array('class' => 'col-md-3 control-label')) !!}
	<div class='col-md-8'>{!! Form::text('tghung', null, array('class' => 'form-control', 'id' => 'nhoanung'))!!}</div>
</div>
<div class='form-group'>
	{!! Form::label('nyeucau','Ngay yeu cau', array('class' => 'col-md-3 control-label')) !!}
	<div class='col-md-8'>{!! Form::text('nyeucau', null, array('class' => 'form-control', 'id' => 'nyeucau'))!!}</div>
</div>
<div class='form-group'>
	{!! Form::label('ngiaohang','Ngay giao hang', array('class' => 'col-md-3 control-label')) !!}
	<div class='col-md-8'>{!! Form::text('ngiaohang', null, array('class' => 'form-control', 'id' => 'ngiaohang'))!!}</div>
</div>
<div class='form-group'>
	{!! Form::label('nnhanhang','Ngay nhan hang', array('class' => 'col-md-3 control-label')) !!}
	<div class='col-md-8'>{!! Form::text('nnhanhang', null, array('class' => 'form-control', 'id' => 'nnhanhang'))!!}</div>
</div>

<div class="form-group"><div class="col-md-8 col-md-offset-3">
		<button type="submit" class="btn btn-primary" id='dntung'>Cập Nhật</button>
{!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
@section('javascript')
<script type='text/javascript' src='/js/user/proponent/capnhat_dntung.js'></script>
@endsection