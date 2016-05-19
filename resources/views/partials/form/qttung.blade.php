{!! Form::open(array('url' => '/quyet-toan', 'method' => 'post', 'class' => 'form-horizontal', 'files' => true, 'name' => 'content', 'id' => 'content1')) !!}
<div><h4>CUOC PHI CAC CONT</h4></div>
<div>&nbsp;</div>
<div style="width: 100%; overflow: auto;">
<table class='table table-bordered' id="qttu_cont">
<thead>
	<tr>
		<th>Xóa</th>
		<th>Ngay xe chay</th>
		<th>Bien so xe</th>
		<th>Loai xe</th>
		<th>So cont</th>
		<th>Co cont</th>
		<th>Loai cont</th>
		<th>Nha xe</th>
		<th>Phi nang ha</th>
		<th>Ky hai quan giam sat</th>
		<th>Cuoc xe</th>
		<th>Cuoc gui</th>
		<th>Cuoc mua</th>
		<th>Gia von chua VAT</th>
		<th>Cuoc bán chưa VAT</th>
	</tr>
</thead>
<tbody id='qtoan_cont'>
</tbody>
</table>
</div>
<div>&nbsp;</div>
<button id='them_cont' class="btn btn-warning">Thêm</button>
<div>&nbsp;</div>

<div><h4>CUOC PHI PHAT SINH</h4></div>
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
<button id='them_psinh' class="btn btn-warning">Thêm</button>
<div>&nbsp;</div>
<div><button id='them' class="btn btn-primary">Quyết toán</button></div>
{!! Form::close() !!}
