<button data-target='#myModal' data-toggle='modal' class='btn btn-primary'>Yeu cau lam hang</button>
@include('partials.modal.yclhang')
<div id='message'>&nbsp;</div>
<section class='panel panel-primary'>
	<div class='panel-heading text-center'>
		<h4>DE NGHI TAM UNG THANG {{ date("m/Y")}}</h4>
	</div>
	<div class='panel-body'>
		<table id='tung' class='table table-bordered table-striped table-condensed table-hover nowrap dt-responsive' cellspacing='0' width='100%'>
			<thead>
				<th>Ngay de nghi</th>
				<th>So booking/bl</th>
				<th>So tien</th>
				<th>Xuat/Nhap</th>
				<th>Cont 20</th>
				<th>Cont 40</th>
				<th>Loai cont</th>
				<th>Thoi gian hoan ung</th>
				<th>Ban ke</th>
				<th>Tinh trang</th>
			</thead>
		</table>
	</div>
</section>
