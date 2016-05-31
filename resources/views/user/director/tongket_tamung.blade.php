@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
			<section class='panel panel-primary'>
				<div class='panel-heading text-center'>
					<h4>THEO DÕI BOOKING {{$month}}/{{$year}}</h4>
				</div>
				<div class='panel-body'>
					<table id='tdbooking' class='table table-bordered table-condensed nowrap' cellspacing='0' width='100%'>
						<thead>
							<th>Mã số chuyến</th>
							<th>Loại hàng</th>
							<th>XK-NK</th>
							<th>Tuyến đường</th>
							<th>Ngày</th>
							<th>Biển số xe</th>
							<th>Loại xe</th>
							<th>Số cont</th>
							<th>Cỡ cont</th>
							<th>Loại cont</th>
							<th>Số tờ khai/booking</th>
							<th>Khách hàng</th>
							<th>Nhà xe</th>
							<th>Phí nâng hạ</th>
							<th>VAT phí nâng/hạ</th>
							<th>Ký hải quan giám sát</th>
							<th>Cước xe</th>
							<th>Cước gửi</th>
							<th>Cước mua</th>
							<th>Giá vốn chưa VAT</th>
							<th>VAT giá vốn</th>
							<th>Giá vốn điều chỉnh</th>
							<th>VAT giá vốn điều chỉnh</th>
							<th>Cước bán chưa VAT</th>
							<th>Lợi nhuận gộp (giá bán vs. giá vốn chưa VAT)</th>
							<th>Lợi nhuận gộp (giá bán vs. giá vốn điều chỉnh)</th>
						</thead>
					</table>
				</div>
			</section>
        </div>
        <div class="col-md-12">
			<section class='panel panel-primary'>
				<div class='panel-heading text-center'>
					<h4>THEO DÕI TẠM ỨNG THÁNG {{$month}}/{{$year}}</h4>
				</div>
				<div class='panel-body'>
					<table id='tdtung' class='table table-bordered table-condensed nowrap' cellspacing='0' width='100%'>
						<thead>
							<th>Ngày giao dịch</th>
							<th>Hạng mục thanh toán</th>
							<th>Tổng số cont</th>
							<th>Cont 20</th>
							<th>Cont 40</th>
							<th> Nóng/Lạnh</th>
							<th>Xuất/Nhập</th>
							<th>Số booking</th>
							<th>Hóa đơn/ phiếu thu số</th>
							<th>Tổng số tiền</th>
							<th>Tiền (chưa VAT)</th>
							<th>VAT</th>
							<th>Quyết toán với c.ty</th>
							<th>Ghi chú</th>
						</thead>
					</table>
				</div>
			</section>
        </div>
    </div>
</div>
@endsection
@section('javascript')
<script type='text/javascript'>
var month = "<?= $month?>";
var year = "<?= $year?>";
</script>
<script type='text/javascript' src='/js/user/director/tktudata.js'></script>
@endsection
