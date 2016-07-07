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
<div><strong>Số booking &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><em><span id='ldtu' style="padding-left: 1.5em;">{{$dntung->bill}}</span></em></div>
<div><strong>Số tiền tạm ứng &nbsp;:</strong> <em><span id='sttu' style='padding-left: 1.5em;'>{{format($dntung->ttien)}}</span></em></div>
<div><strong>Ngày tạm ứng &nbsp;&nbsp;&nbsp;&nbsp;: </strong><em><span id='ntu' style='padding-left: 1.5em;'>{{$dntung->created_at}}</span></em></div>
<div><strong>Số tiền còn lại &nbsp;&nbsp;&nbsp;&nbsp;: </strong><em><span id='stclai' style='padding-left: 1.5em;'></span></em></div>
</div>
<div style="margin-left: 25px;">
{!! Form::open(array('method' => 'post', 'class' => 'form-horizontal', 'files' => true, 'name' => 'content', 'id' => 'content1')) !!}
<div><h4>THỐNG KẾ CÁC CONT</h4></div>
<div>&nbsp;</div>
<div style="overflow: auto;">
<table class='table table-bordered' id="qttu_cont">
<thead>
	<tr>
		<th>Xóa</th>
		<th>Ngày</th>
		<th>Số cont</th>
		<th>Cỡ cont</th>
		<th>Loại cont</th>
		<th>Bai nang hang/vo</th>
		<th>Bai ha hang/vo</th>
		<th>Trong luong (tan)</th>
		<th>Dieu xe</th>
		<th>Loại xe</th>
		<th>Biển số xe</th>
		<th>Dia diem dong tra hang</th>
		<th>Phi nang chua VAT</th>
		<th>VAT phi nang</th>
		<th>So hoa don nang</th>
		<th>Ngay xuat HD nang</th>
		<th>Don vi cap HD nang</th>
		<th>Phi ha chua VAT</th>
		<th>VAT phi ha</th>
		<th>So HD ha</th>
		<th>Ngay xuat HD ha</th>
		<th>Don vi cap HD ha</th>
		<th>Boc to khai</th>
		<th>HQ tiep nhan</th>
		<th>HQ giam sat cang</th>
		<th>HQ kiem hoa</th>
		<th>Cuoc cont</th>
		<th>Lay lenh hang tau</th>
		<th>Luu Cont</th>
		<th>Luu bai</th>
		<th>Phi ve sinh</th>
		<th>Phi cat day</th>
		<th>Boc tem</th>
		<th>Kiem dich dong/thuc vat chua VAT</th>
		<th>VAT chi phi k/d dong/thuc vat</th>
		<th>Chi phi ngoai cho k/d dong/thuc vat</th>
		<th>Cac khoan ung khac cho khach</th>
		<th>Tong</th>
		<th>Ghi chu</th>
	</tr>
</thead>
<tbody id='qtoan_cont'>
@if($qtconts)
@foreach($qtconts as $qtcont)
<tr>
	<td class="text-danger text-center"><a href="#" id="remove_item_ajax" data-id="{{$qtcont['id']}}" class="text-danger">&times;</a></td>
	<td>{{$qtcont['nxchay']}}</td>
	<td>{{$qtcont['bsxe']}}</td>
	<td>{{$qtcont['lxe']}}</td>
	<td>{{$qtcont['scont']}}</td>
	<td>{{$qtcont['ccont']}}</td>
	<td>{{$qtcont['lcont']}}</td>
	<td>{{$qtcont['nxe']}}</td>
	<td>{{format($qtcont['pnha'])}}</td>
	<td>{{format($qtcont['khquan'])}}</td>
	<td>{{format($qtcont['cxe'])}}</td>
	<td>{{format($qtcont['cgui'])}}</td>
	<td>{{format($qtcont['cmua'])}}</td>
	<td>{{format($qtcont['gvcVAT'])}}</td>
	<td>{{format($qtcont['gvdchinh'])}}</td>
	<td>{{format($qtcont['cbcVAT'])}}</td>
</tr>
@endforeach
@endif
</tbody>
</table>
</div>
<button id='them_cont' class="btn btn-warning btn-xs">Thêm</button>
<div>&nbsp;</div>

<div><h4>CÁC HẠNG MỤC THANH TOÁN</h4></div>
<div>&nbsp;</div>
<div style="overflow: auto;">
<table class='table table-bordered' id="qttu_ps" >
<thead>
	<tr>
		<th class="text-center">Xóa</th>
		<th>Hạng mục thanh toán</th>
		<th>Số tiền</th>
		<th>Hóa đơn</th>
		<th>Nơi phát hành</th>
		<th>Chi cho</th>
		<th>Ngày chi</th>
		<th>Ghi chú</th>
	</tr>
</thead>
<tbody id='cppsinh'>
@if($qtpsinh)
@foreach($qtpsinh as $qtps)
<tr>
	<td class="text-danger text-center"><a href="#" id="remove_item_ajax" data-id="{{$qtps['id']}}" class="text-danger">&times;</a></td>
	<td>{{$qtps['ldo']}}</td>
	<td>{{format($qtps['stien'])}}</td>
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
<button id='them_psinh' class="btn btn-warning btn-xs">Thêm</button>
<div>&nbsp;</div>
<div><button id='them' class="btn btn-primary">Quyết toán</button></div>
{!! Form::close() !!}
</div>
@endsection
@section('javascript')
<script type='text/javascript' src='/js/user/proponent_qtoan.js'></script>
@endsection
