<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Mẫu quyết toán</title>
  <meta name="generator" content="Google Web Designer 1.6.1.0620">
  <style type="text/css" id="gwd-text-style">
    p {
      margin: 0px;
    }
    h1 {
      margin: 0px;
    }
    h2 {
      margin: 0px;
    }
    h3 {
      margin: 0px;
    }
  </style>
  <style type="text/css">
    html, body {
      width: 100%;
      height: 100%;
      margin: 0px;
    }
    body {
      transform: perspective(1400px) matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
      transform-style: preserve-3d;
      background-color: transparent;
    }
    .gwd-span-jrwv {
      font-size: 12px;
    }
    .gwd-p-1ht4 {
      position: absolute;
      font-size: 12px;
      top: 1px;
      width: 231px;
      height: 16px;
      transform-origin: 90px 44px 0px;
      left: 6px;
    }
    .gwd-p-199v {
      position: absolute;
      height: 20px;
      font-size: 12px;
      text-align: left;
      left: 5px;
      width: 232px;
      transform-origin: 92px 10px 0px;
      font-weight: bold;
      top: 29px;
    }
    .gwd-p-12ye {
      position: absolute;
      width: 231px;
      height: 18px;
      left: 6px;
      top: 57px;
      font-size: 12px;
      text-align: left;
      font-weight: normal;
    }
    .gwd-p-ht0b {
      position: absolute;
      width: 231px;
      height: 12px;
      left: 6px;
      font-size: 12px;
      text-align: left;
      font-weight: normal;
      top: 76px;
    }
    .gwd-span-1cwa {
      position: absolute;
      width: 231px;
      left: 6px;
      font-size: 12px;
      text-align: left;
      height: 17px;
      transform-origin: 91px -97px 0px;
      top: 89px;
    }
    .gwd-span-9y6w {
      position: absolute;
      font-size: 12px;
      text-align: left;
      width: 209px;
      height: 15px;
      transform-origin: -158px -98px 0px;
      top: 91px;
      left: 238px;
    }
    .gwd-span-19ve {
      position: absolute;
      width: 231px;
      height: 19px;
      left: 6px;
      font-size: 12px;
      text-align: left;
      top: 107px;
    }
    table.quyettoan {
      position: absolute;
      border-collapse: collapse;
      width: 1000px;
      top: 140px;
    }
    table.quyettoan, table.quyettoan th, table.quyettoan td {
      font-size: 12px;
      border: 1px solid black;
      text-align: center;
    }
    .gwd-p-10zp {
      position: absolute;
      font-weight: bold;
      font-size: 13px;
      width: 89px;
      height: 20px;
      transform-origin: 79.5px 13px 0px;
      top: 550px;
      left: 56px;
    }
    .gwd-p-15qr {
      position: absolute;
      width: 145px;
      height: 23px;
      left: 302px;
      top: 550px;
      font-size: 13px;
      font-weight: bold;
    }
    .gwd-p-1h8n {
      position: absolute;
      width: 152px;
      height: 18px;
      top: 550px;
      font-size: 13px;
      font-weight: bold;
      text-align: left;
      left: 544px;
    }
    .gwd-p-1jiz {
      position: absolute;
      width: 138px;
      height: 23px;
      top: 550px;
      font-size: 13px;
      font-weight: bold;
      text-align: left;
      left: 815px;
    }
    .gwd-p-19r5 {
      position: absolute;
      height: 23px;
      left: 56px;
      top: 573px;
      width: 141px;
      transform-origin: 534.5px 12px 0px;
    }
    .gwd-p-ocau {
      position: absolute;
      width: 91px;
      height: 24px;
      top: 573px;
      text-align: left;
      left: 301px;
    }
    .gwd-p-opc7 {
      left: 545px;
      width: 151px;
      transform-origin: 45.5px 12px 0px;
    }
    .gwd-p-1br3 {
      width: 146px;
      transform-origin: 289.5px 12px 0px;
    }
    .gwd-p-1wv1 {
      left: 813px;
    }
  </style>
</head>

<body>
  <p class="gwd-p-1ht4">Ngày {{date('d')}} tháng {{date('m')}} năm {{date('Y')}}</p>
  <p class="gwd-p-199v">QUYẾT TOÁN CHI PHÍ LÀM HÀNG</p>
  <p class="gwd-p-12ye">Khách hàng:&nbsp;{{$dntung->khachhang}}</p><span class="gwd-span-1cwa">Loại cont&nbsp;&nbsp;&nbsp;:</span><span class="gwd-span-9y6w">Phiếu chi:</span><span class="gwd-span-19ve">Loại hàng&nbsp;&nbsp;:&nbsp;{{$dntung->loaihang}}</span>
  <p class="gwd-p-ht0b">Bill&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;{{$dntung->bill}}</p>
  <table class="quyettoan">
    <thead>
      <tr>
        <th>STT</th>
        <th>Nội dung</th>
        <th>ĐVT</th>
        <th>SL</th>
        <th>Đơn giá</th>
        <th>Thành tiền</th>
        <th>VAT</th>
        <th>Tổng tiền</th>
        <th>GHI CHÚ</th>
      </tr>
      <tr>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
        <th>5</th>
        <th>6</th>
        <th>7</th>
        <th>8</th>
        <th>9</th>
      </tr>
    </thead>
	<tbody>
	<?php $i=0;
		$stdachi = 0;
		$stkhdon = 0;
		foreach($qtoans as $qt){
			$stdachi += $qt['tong'];
			if(!$qt['hdon']){
				$stkhdon += $qt['tong'];
			}
		}
		$difference = $dntung->ttien_ltron - $stdachi;
	?>
	@foreach($qtoans as $qt)
      <tr>
		<td>{{++$i}}</td>
		<td>{{$qt['ldo']}}</td>
		<td>{{$qt['dvtinh']}}</td>
		<td>{{$qt['soluong']}}</td>
		<td>{{number_format($qt['dongia'], 0, '.', ',')}}</td>
		<td>{{number_format($qt['stien'], 0, '.', ',')}}</td>
		<td>{{number_format($qt['VAT'], 0, '.', ',')}}</td>
		<td>{{number_format($qt['tong'], 0, '.', ',')}}</td>
		<td>@if($qt['hdon']) HD:{{$qt['hdon']}}@else Khong co hoa don @endif</td>
      </tr>
	@endforeach
    </tbody>
    <tfoot>
      <tr>
        <th colspan="4"><i>Tổng chi phí thực tế:</i>
        </th>
        <th colspan="5"><i>{{number_format($stdachi, 0, '.', ',')}}</i>
        </th>
      </tr>
      <tr>
        <th colspan="4">Trong đó: tổng chi phí không có hóa đơn</th>
        <th colspan="5">{{number_format($stkhdon, 0, '.', ',')}}</th>
      </tr>
      <tr>
        <th colspan="4">Số tiền tạm ứng:</th>
        <th colspan="3" style="text-align: right;">{{number_format($dntung->ttien_ltron, 0, '.', ',')}}</th>
        <th colspan="2" style="text-align: left; padding-left:0.5em;">Phiếu chi:</th>
      </tr>
      <tr>
        <th colspan="4">Hoàn trả về c.ty</th>
        <th colspan="5">@if($difference>=0) {{number_format($difference, 0, '.', ',')}}@endif</th>
      </tr>
      <tr>
        <th colspan="4">Tiền thiếu (nhận từ công ty)</th>
        <th colspan="5">@if($difference<0) {{number_format(-1*$difference, 0, '.', ',')}}@endif</th>
      </tr>
    </tfoot>
  </table>
  <p class="gwd-p-10zp">Giám đốc</p>
  <p class="gwd-p-15qr">Kế toán trưởng</p>
  <p class="gwd-p-1h8n">Người nộp tiền</p>
  <p class="gwd-p-1jiz">Thủ quỹ</p>
  <p class="gwd-p-19r5"></p>
  <p class="gwd-p-ocau gwd-p-1br3"></p>
  <p class="gwd-p-ocau gwd-p-opc7">{{\Auth::user()->name}}</p>
  <p class="gwd-p-ocau gwd-p-opc7 gwd-p-1wv1"></p>
</body>

</html>
