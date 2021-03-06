@extends('layouts.app')
@section('content')
<?php 
function format($value){
	return number_format($value, 0, ",", ".");
}
?>
<div style="margin-left: 25px;">
<h4 class="modal-title text-info" id="myModalLabel">QUYẾT TOÁN TẠM ỨNG</h4>
<div><strong>Lý do tạm ứng &nbsp;&nbsp;&nbsp;&nbsp;: </strong><em><span id='ldtu' style="padding-left: 1.5em;">{{$dntung->reason}}</span></em></div>
<div><strong>Loai hinh &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><em><span id='ldtu' style="padding-left: 1.5em;">{{$dntung->khang}}</span></em></div>
<div><strong>Khach hang &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><em><span id='ldtu' style="padding-left: 1.5em;">{{$dntung->khachhang}}</span></em></div>
<div><strong>So to khai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><em><span id='ldtu' style="padding-left: 1.5em;">{{$dntung->sotokhai}}</span></em></div>
<div><strong>Số booking &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><em><span id='ldtu' style="padding-left: 1.5em;">{{$dntung->bill}}</span></em></div>
<div><strong>Tuyen duong &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><em><span id='ldtu' style="padding-left: 1.5em;">{{$dntung->tuyenduong}}</span></em></div>
<div><strong>Nha xe &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><em><span id='ldtu' style="padding-left: 1.5em;">{{$dntung->nhaxe}}</span></em></div>
<div><strong>Ngày tạm ứng &nbsp;&nbsp;&nbsp;&nbsp;: </strong><em><span id='ntu' style='padding-left: 1.5em;'>{{$dntung->created_at}}</span></em></div>
<div><strong>Số tiền tạm ứng &nbsp;:</strong> <em><span id='sttu' style='padding-left: 1.5em;'>{{format($dntung->ttien_ltron)}}</span></em></div>
<?php
$stdachi = 0;
$ttien_ltron = $dntung->ttien_ltron;
foreach ($qtpsinh as $qt)
{
	$stdachi += $qt['tong'];	
}
?>
<div><strong>Số tiền còn lại &nbsp;&nbsp;&nbsp;&nbsp;: </strong><em><span id='stclai' style='padding-left: 1.5em;'>{{format($ttien_ltron - $stdachi)}}</span></em></div>
</div>
<div style="margin-left: 25px;">
{!! Form::open(array('method' => 'post', 'class' => 'form-horizontal', 'files' => true, 'name' => 'content', 'id' => 'content1')) !!}
<div><h4>CƯỚC PHÍ CÁC CONT</h4></div>
<div>&nbsp;</div>
<div style="overflow: auto;">
<table class='table table-bordered' id="qttu_cont" style="width: 450em;">
<thead>
	<tr>
		<th style="width: 1em;">STT</th>
		<th style="width: 8em;">Ngày</th>
		<th>Số cont</th>
		<th>Số chì</th>
		<th>Cỡ cont</th>
		<th>Loại cont</th>
		<th>Bãi nâng hàng/vỏ</th>
		<th>Bãi hạ hàng/vỏ</th>
		<th>Trọng lượng (tấn)</th>
		<th>Điều xe</th>
		<th>Loại xe</th>
		<th>Biển số xe</th>
		<th>Địa điểm đóng trả hàng</th>
		<th>Phí nâng chưa VAT</th>
		<th>VAT phí nâng</th>
		<th>Số hóa đơn nâng</th>
		<th>Ngày xuất HD nâng</th>
		<th>Đơn vị cấp HD nâng</th>
		<th>Phí hạ chưa VAT</th>
		<th>VAT phí hạ</th>
		<th>Số HD hạ</th>
		<th>Ngày xuất HD hạ</th>
		<th>Đơn vị cấp HD hạ</th>
		<th>Bóc tờ khai</th>
		<th>HQ tiếp nhận</th>
		<th>HQ giám sát cảng</th>
		<th>HQ kiểm hóa</th>
		<th>Cược cont</th>
		<th>Lấy lệnh hãng tàu</th>
		<th>Lưu cont</th>
		<th>Lưu bãi</th>
		<th>Phí vệ sinh</th>
		<th>Phí cắt dây</th>
		<th>Bóc tem</th>
		<th>Kiểm dịch đông/thực vật chưa VAT</th>
		<th>VAT phí kiểm dịch đông/thực vật</th>
		<th>Chi phí ngoài cho k/d động/thực vật</th>
		<th>Các khoản ứng khác cho khách</th>
		<th>Phát sinh</th>
		<th>Tổng</th>
		<th>Ghi chú</th>
	</tr>
</thead>
<tbody id='qtoan_cont'>
@if($qtconts)
@foreach($qtconts as $qtcont)
<tr>
	<td>&nbsp;</td>
	<td>{{$qtcont['nxchay']}}</td>
	<td>{{$qtcont['scont']}}</td>
	<td>{{$qtcont['sochi']}}</td>
	<td>{{$qtcont['ccont']}}</td>
	<td>{{$qtcont['lcont']}}</td>
	<td>{{$qtcont['bainang']}}</td>
	<td>{{$qtcont['baiha']}}</td>
	<td>{{$qtcont['trongluong']}}</td>
	<td>{{$qtcont['dieuxe']}}</td>
	<td>{{$qtcont['lxe']}}</td>
	<td>{{$qtcont['bsxe']}}</td>
	<td>{{$qtcont['diadiemdongtrahang']}}</td>
	<td>{{format($qtcont['phinangchuaVAT'])}}</td>
	<td>{{format($qtcont['VATphinang'])}}</td>
	<td>{{$qtcont['sohoadonnang']}}</td>
	<td>{{$qtcont['nxuathoadonnang']}}</td>
	<td>{{$qtcont['dvicaphoadonnang']}}</td>
	<td>{{format($qtcont['phihachuaVAT'])}}</td>
	<td>{{format($qtcont['VATphiha'])}}</td>
	<td>{{$qtcont['sohoadonha']}}</td>
	<td>{{$qtcont['nxuathoadonnang']}}</td>
	<td>{{$qtcont['dvicaphoadonha']}}</td>
	<td>{{format($qtcont['boctokhai'])}}</td>
	<td>{{format($qtcont['hquantiepnhan'])}}</td>
	<td>{{format($qtcont['hquangiamsat'])}}</td>
	<td>{{format($qtcont['hquankiemhoa'])}}</td>
	<td>{{format($qtcont['cuoccont'])}}</td>
	<td>{{format($qtcont['llenhhangtau'])}}</td>
	<td>{{format($qtcont['luucont'])}}</td>
	<td>{{format($qtcont['luubai'])}}</td>
	<td>{{format($qtcont['phivesinh'])}}</td>
	<td>{{format($qtcont['phicatday'])}}</td>
	<td>{{format($qtcont['boctem'])}}</td>
	<td>{{format($qtcont['kddtvchuaVAT'])}}</td>
	<td>{{format($qtcont['VATkddtv'])}}</td>
	<td>{{format($qtcont['phingoaikddtv'])}}</td>
	<td>{{format($qtcont['cackhoankhacchokhach'])}}</td>
	<td>{{format($qtcont['phatsinh'])}}</td>
	<td>{{format($qtcont['tong'])}}</td>
	<td>{{$qtcont['ghichu']}}</td>
</tr>
@endforeach
@endif
</tbody>
</table>
</div>
<div>&nbsp;</div>

<div><h4>THONG KE GUI KHACH HANG</h4></div>
<div>&nbsp;</div>
<div style="overflow: auto;">
<table class='table table-bordered' id="qttu_ps" >
<thead>
	<tr>
		<th style="width: 1em;">STT</th>
		<th>Hạng mục thanh toán</th>
		<th>ĐV tính</th>
		<th>Số lượng</th>
		<th>Đơn giá</th>
		<th>Thành tiền</th>
		<th>VAT</th>
		<th>Tổng</th>
		<th>Hóa đơn</th>
		<th>Noi phat hanh</th>
		<th>Chi cho</th>
		<th>Ngày chi</th>
		<th>Ghi chú</th>
	</tr>
</thead>
<tbody id='cppsinh'>
@if($qtpsinh)
@foreach($qtpsinh as $qtps)
<tr>
	<td>&nbsp;</td>
	<td>{{$qtps['ldo']}}</td>
	<td>{{$qtps['dvtinh']}}</td>
	<td>{{$qtps['soluong']}}</td>
	<td>{{format($qtps['dongia'])}}</td>
	<td>{{format($qtps['stien'])}}</td>
	<td>{{format($qtps['VAT'])}}</td>
	<td>{{format($qtps['tong'])}}</td>
	<td>{{$qtps['hdon']}}</td>
	<td>{{$qtps['nphanh']}}</td>
	<td>{{$qtps['chicho']}}</td>
	<td>{{$qtps['nchi']}}</td>
	<td>{{$qtps['gchu']}}</td>
</tr>
@endforeach
@endif
</tbody>
</table>
</div>
<div>&nbsp;</div>
<div><button id='cnhan' class="btn btn-primary">Chấp nhận</button></div>
{!! Form::close() !!}
</div>
@endsection
@section('javascript')
<script type='text/javascript' src='/js/user/director_qtoan.js'></script>
@endsection
