{!! Form::open(array('url' => '/make-goods', 'method' => 'post', 'class' => 'form-horizontal', 'files' => true, 'name' => 'content', 'id' => 'content')) !!}
<div class="form-group required">
	{!! Form::label('bill', 'Booking/BL', array('class' => 'col-md-3 control-label')) !!}
	<div class='col-md-8'>{!! Form::text('bill', null, array('class' => 'form-control', 'id' => 'bill'))!!}</div>
</div>
<div class='form-group'>
	<div class='col-md-8 col-md-offset-3'>
	<input id='checkbct' type='checkbox' name='checbct' value='check' checked=false>Tôi đã kiểm tra bộ chứng từ
	</div>
</div>
<div id='input-hidden' class='hidden'>
<div class='form-group'><div class="col-md-8 col-md-offset-3"><h4>ĐỀ NGHỊ TẠM ỨNG</h4></div></div>
<div class='form-group required'>
	{!! Form::label('nyeucau','Ngày yêu cầu', array('class' => 'col-md-3 control-label')) !!}
	<div class='col-md-8'>{!! Form::text('nyeucau', \Carbon\Carbon::now()->format('Y-m-d'), array('class' => 'form-control', 'id' => 'nyeucau'))!!}</div>
</div>
<div class='form-group required'>
	{!! Form::label('filebooking','File Booking', array('class' => 'col-md-3 control-label')) !!}
	<div class='col-md-8'>{!! Form::file('filebooking', null)!!}</div>
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
	<div class='col-md-8'>{!! Form::text('ndonghang', \Carbon\Carbon::now()->format('Y-m-d'), array('class' => 'form-control', 'id' => 'ndonghang'))!!}</div>
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
<div id="khang" class='form-group required'>
{!! Form::label('khang', 'Hình thức hàng', ['class' => 'col-md-3 control-label']) !!}
<div class='col-md-8'>
{!! Form::select('khang', ['Xuất' => 'Xuất', 'Nhập' => 'Nhập', 'Kinh doanh nội địa' => 'Kinh doanh nội địa'], null, ['placeholder' => 'Chọn kiểu hàng', 'class' => 'form-control']) !!}
</div>
</div>
<div id="input-ngaygiaohang" class='form-group required hidden disabled'>
	{!! Form::label('ngiaohang','Ngày giao hàng', array('class' => 'col-md-3 control-label')) !!}
	<div class='col-md-8'>{!! Form::text('ngiaohang', \Carbon\Carbon::now()->format('Y-m-d'), array('class' => 'form-control', 'id' => 'ngiaohang'))!!}</div>
</div>
<div id="input-ngaynhanhang" class='form-group required hidden disabled'>
	{!! Form::label('nnhanhang','Ngày nhận hàng', array('class' => 'col-md-3 control-label')) !!}
	<div class='col-md-8'>{!! Form::text('nnhanhang', \Carbon\Carbon::now()->format('Y-m-d'), array('class' => 'form-control', 'id' => 'nnhanhang'))!!}</div>
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
	<div class='col-md-8'>{!! Form::text('tghung', \Carbon\Carbon::now()->format('Y-m-d'), array('class' => 'form-control', 'id' => 'nhoanung'))!!}</div>
</div>

<div class="form-group"><div class="col-md-8 col-md-offset-3">
		<button type="submit" class="btn btn-primary" id='dntung'>Đề Nghị Tạm Ứng</button> </div> </div>
</div>
{!! Form::close() !!}
