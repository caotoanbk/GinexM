{!! Form::open(array('method' => 'post', 'class' => 'form-horizontal', 'files' => true, 'name' => 'content', 'id' => 'content1')) !!}
<div><h4>CƯỚC PHÍ CÁC CONT</h4></div>
<div>&nbsp;</div>
<div style="width: 100%; overflow: auto;">
<table class='table table-bordered' id="qttu_cont">
<thead>
	<tr>
		<th>Xóa</th>
		<th>Ngày xe chạy</th>
		<th>Biển số xe</th>
		<th>Loại xe</th>
		<th>Số cont</th>
		<th>Cỡ cont</th>
		<th>Loại cont</th>
		<th>Nhà xe</th>
		<th>Phí nâng hạ</th>
		<th>Kí hải quan giám sát</th>
		<th>Cước xe</th>
		<th>Cước gửi</th>
		<th>Cước bán</th>
		<th>Giá vốn chưa VAT</th>
		<th>Cước bán chưa VAT</th>
	</tr>
</thead>
<tbody id='qtoan_cont'>
</tbody>
</table>
</div>
<button id='them_cont' class="btn btn-warning btn-xs">Thêm</button>
<div>&nbsp;</div>

<div><h4>CƯỚC PHÁT SINH</h4></div>
<div>&nbsp;</div>
<table class='table table-bordered' id="qttu_ps" >
<thead>
	<tr>
		<th>Lý do chi</th>
		<th>Số tiền</th>
		<th>Hóa đơn</th>
		<th>Chi cho</th>
		<th>Ngày chi</th>
		<th>Xóa</th>
	</tr>
</thead>
<tbody id='cppsinh'>
</tbody>
</table>
<button id='them_psinh' class="btn btn-warning btn-xs">Thêm</button>
<div>&nbsp;</div>
<div><button id='them' class="btn btn-primary">Quyết toán</button></div>
{!! Form::close() !!}
