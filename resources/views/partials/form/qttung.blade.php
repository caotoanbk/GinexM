{!! Form::open(array('url' => '/quyet-toan', 'method' => 'post', 'class' => 'form-horizontal', 'files' => true, 'name' => 'content', 'id' => 'content1')) !!}
<div class='col-md-8 col-md-offset-2'><strong>Ly do tam ung:</strong><em class="text-info"><span id='ldtu' style="padding-left: 3em;"></span></em></div>
<div class='col-md-8 col-md-offset-2'><strong>So tien tam ung:</strong> <em class="text-info"><span id='sttu' style='padding-left: 3em;'></span></em></div>
<div class='col-md-8 col-md-offset-2'><strong>Ngay tam ung:</strong><em class="text-info"><span id='ntu' style='padding-left: 3em;'></span></em></div>
<div class='col-md-8 col-md-offset-2'><strong>So tien con lai</strong><em class="text-danger"><span id='stclai' style='padding-left: 3em;'></span></em></div>
<div class='col-md-8 col-md-offset-4'><h4>CHI TIẾT CÁC KHOẢN CHI</h4></div>
<div class='col-md-8 col-md-offset-3'>&nbsp;</div>
<table class='table table-bordered' id="qttu">
<thead>
	<tr>
		<th>Lý do chi</th>
		<th>Số tiền</th>
		<th>Hóa đơn</th>
		<th>Ngày chi</th>
		<th>Xóa</th>
	</tr>
</thead>
<tbody id='qtoan'>
</tbody>
</table>
<button id='them' class="btn btn-primary">Thêm</button>
<button id='them' class="btn btn-primary">Quyết toán</button>
{!! Form::close() !!}
