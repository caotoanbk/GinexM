{!! Form::open(array('url' => '/quyet-toan', 'method' => 'post', 'class' => 'form-horizontal', 'files' => true, 'name' => 'content', 'id' => 'content1')) !!}
<div style="margin-left: 5px;"><h4>CUOC PHI CAC CONT</h4></div>
<div>&nbsp;</div>
<div style="width: 100%; overflow: auto; margin-left: 5px;">
<table class='table table-bordered' id="qttu">
<thead>
	<tr>
		<th>Ngay</th>
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
		<th>Cuoc ban chua VAT</th>
		<th>Xóa</th>
	</tr>
	<tr>
		<td><input type="text" size="20"></td>
		<td><input type="text" size="20"></td>
		<td><input type="text" size="20"></td>
		<td><input type="text" size="20"></td>
		<td><input type="text" size="20"></td>
		<td><input type="text" size="20"></td>
		<td><input type="text" size="20"></td>
		<td><input type="text" size="20"></td>
		<td><input type="text" size="20"></td>
		<td><input type="text" size="20"></td>
		<td><input type="text" size="20"></td>
		<td><input type="text" size="20"></td>
		<td><input type="text" size="20"></td>
		<td><input type="text" size="20"></td>
		<td><input type="text" size="20"></td>
	</tr>
</thead>
<tbody id='qtoan'>
</tbody>
</table>
</div>

<div style="margin-left: 5px;">
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
</div>
<div style="margin-left: 5px;">
<button id='them' class="btn btn-primary">Thêm</button>
<button id='them' class="btn btn-primary">Quyết toán</button>
</div>
{!! Form::close() !!}
