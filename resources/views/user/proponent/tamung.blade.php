@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
<h3 class='col-md-8 col-md-offset-3'><u>ĐỀ NGHỊ TẠM ỨNG</u></h3>
<div class='form-group'>
<div class='col-md-3 control-label' style="text-align: right;"><b>Loại hình</b></div>
<div class='col-md-8'>{{$dntu->khang}}</div>
</div>
<div class='form-group'>
<div class='col-md-3 control-label' style="text-align: right;"><b>Tên hàng</b></div>
<div class='col-md-8'>{{$dntu->loaihang}}</div>
</div>
<div class='form-group'>
<div class='col-md-3 control-label' style="text-align: right;"><b>Chủ hàng</b></div>
<div class='col-md-8'>{{$dntu->khachhang}}</div>
</div>
<div class='form-group'>
<div class='col-md-3 control-label' style="text-align: right;"><b>Số bill/booking</b></div>
<div class='col-md-8'>{{$dntu->bill}}</div>
</div>
<div class='col-md-12'>&nbsp;</div>
{!! Form::model($dntu, ['method' => 'PATCH','url' => ['/lam-hang/tam-ung', $dntu->id], 'class' => 'form-horizontal', 'id' => 'content']) !!}
<div class='form-group required'>
{!! Form::label('reason', 'Lý do tạm ứng', ['class' => 'col-md-3 control-label']) !!}
<div class='col-md-8'>
{!! Form::text('reason', null, ['class' => 'form-control']) !!}
</div>
</div>
<div class='form-group'>
{!! Form::label('cuoc', 'Cược', array('class' => 'col-md-3 control-label')) !!}
<div class='col-md-8'>{!! Form::text('cuoc', null, array('class' => 'form-control')) !!}</div>
</div>
<div class='form-group'>
{!! Form::label('playlenh', 'Phí lấy lệnh', array('class' => 'col-md-3 control-label')) !!}
<div class='col-md-8'>{!! Form::text('playlenh', null, array('class' => 'form-control')) !!}</div>
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
{!! Form::label('pbtokhai', 'Phí bóc tờ khai', array('class' => 'col-md-3 control-label')) !!}
<div class='col-md-8'>{!! Form::text('pbtokhai', null, array('class' => 'form-control')) !!}</div>
</div>
<div class='form-group'>
{!! Form::label('phqtiepnhan', 'Phí HQ tiếp nhận', array('class' => 'col-md-3 control-label')) !!}
<div class='col-md-8'>{!! Form::text('phqtiepnhan', null, array('class' => 'form-control')) !!}</div>
</div>
<div class='form-group'>
{!! Form::label('hquan', 'Phí HQ giám sát', array('class' => 'col-md-3 control-label')) !!}
<div class='col-md-8'>{!! Form::text('hquan', null, array('class' => 'form-control')) !!}</div>
</div>
<div class='form-group'>
{!! Form::label('pitokhai', 'Phí in tờ khai, mã vạch, đổi lệnh', array('class' => 'col-md-3 control-label')) !!}
<div class='col-md-8'>{!! Form::text('pitokhai', null, array('class' => 'form-control')) !!}</div>
</div>
<div class='form-group'>
{!! Form::label('pkddongvat', 'Phí kiểm dịch động vật', array('class' => 'col-md-3 control-label')) !!}
<div class='col-md-8'>{!! Form::text('pkddongvat', null, array('class' => 'form-control')) !!}</div>
</div>
<div class='form-group'>
{!! Form::label('pkdthucvat', 'Phí kiểm dịch thực vật', array('class' => 'col-md-3 control-label')) !!}
<div class='col-md-8'>{!! Form::text('pkdthucvat', null, array('class' => 'form-control')) !!}</div>
</div>
<div class='form-group'>
{!! Form::label('psinh', 'Phát sinh', array('class' => 'col-md-3 control-label')) !!}
<div class='col-md-8'>{!! Form::text('psinh', null, array('class' => 'form-control')) !!}</div>
</div>
<div class='form-group'>
{!! Form::label('ttien', 'Tổng tiền', array('class' => 'col-md-3 control-label')) !!}
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
<div class="form-group"><div class="col-md-8 col-md-offset-3">
		<button type="submit" class="btn btn-primary" id='dntung'>Yêu Cầu Tạm Ứng</button> </div> </div>
{!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
@section('javascript')
<script type='text/javascript' src='/js/user/proponent/yeucautamung.js'></script>
@endsection
