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
							<th class="text-center">STT</th>
							<th>Loại hình</th>
							<th>Chủ hàng</th>
							<th>Số tờ khai</th>
							<th>Bill/Booking No.</th>
							<th>Số cont</th>
							<th>Số chì</th>
							<th>Cỡ cont</th>
							<th>Loại cont</th>
							<th>Hãng tàu</th>
							<th>Bãi nâng hàng/vỏ</th>
							<th>Bãi hạ hàng/vỏ</th>
							<th>Trọng lượng (tấn)</th>
							<th>Ngày nhận y/c của khách</th>
							<th>Ngày làm thủ tục</th>
							<th>Ngày đóng hàng (xuất, NĐ)</th>
							<th>Ngày dỡ hàng (nhập, NĐ)</th>
							<th>Ngày giao hàng</th>
							<th>Ngày nhận hàng</th>
							<th>Điều xe</th>
							<th>Biển số xe</th>
							<th>Địa điểm đóng trả hàng</th>
							<th>Tuyến đường</th>
							<th>Phí nâng (chưa VAT)</th>
							<th>VAT chi phí nâng</th>
							<th>Số HĐ nâng</th>
							<th>Ngày xuất hóa đơn nâng</th>
							<th>Đơn vị cấp hóa đơn nâng</th>
							<th>Phí hạ (chưa VAT)</th>
							<th>VAT chi phí hạ</th>
							<th>Số HĐ hạ</th>
							<th>Ngày xuất hóa đơn hạ</th>
							<th>Đơn vị cấp hóa đơn hạ</th>
							<th>Bóc tờ khai</th>
							<th>HQ tiếp nhận</th>
							<th>HQ giám sát cảng</th>
							<th>HQ kiểm hóa</th>
							<th>Cược cont</th>
							<th>Lấy lệnh hãng tàu</th>
							<th>Lưu cont</th>
							<th>Lưu bai</th>
							<th>Phí vệ sinh</th>
							<th>Phí cắt dây</th>
							<th>Bóc tem</th>
							<th>Kiểm dịch động/thực vật (chưa VAT)</th>
							<th>VAT chi phí kiểm dịch động/thực vật</th>
							<th>Chi phí ngoài cho kiểm dịch động/thực vật</th>
							<th>Các khoản ứng khác cho khách</th>
							<th>Tổng</th>
							<th>Ghi chú</th>
						</thead>
					</table>
				</div>
			</section>
        </div>
        <div class="col-md-12">
			<section class='panel panel-primary'>
				<div class='panel-heading text-center'>
					<h4>BAO CAO GUI KHACH HANG THÁNG {{$month}}/{{$year}}</h4>
				</div>
				<div class='panel-body'>
					<table id='tdtung' class='table table-bordered table-condensed nowrap' cellspacing='0' width='100%'>
						<thead>
							<th>STT</th>
							<th>Bill/Booking</th>
							<th>Khách hàng</th>
							<th>Nội dung</th>
							<th>ĐV tính</th>
							<th>Số lượng</th>
							<th>Đơn giá</th>
							<th>Thành tiền</th>
							<th>VAT</th>
							<th>Tổng</th>
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
<script type='text/javascript' src='/js/user/proponent/tktudata.js'></script>
@endsection
