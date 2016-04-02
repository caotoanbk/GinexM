<button data-target='#myModal' data-toggle='modal' class='btn btn-primary'>Yeu cau lam hang</button>
@include('partials.modal.yclhang')
<div id='message'>&nbsp;</div>

<section class='panel panel-primary'>
	<div class='panel-heading text-center'>
		<h4>Thong Tin Yeu Cau Lam Hang</h4>
	</div>
	<div class='panel-body'>
		<table id='yclhang' class='table table-bordered table-striped table-condensed table-hover nowrap dt-responsive' cellspacing='0' width='100%'>
			<thead>
				<th>So booking/bl</th>
				<th>Ngay yeu cau</th>
				<th>Kiem tra bo chung tu</th>
				<th>De nghi tam ung</th>
			</thead>
		</table>
	</div>
</section>
<section class='panel panel-primary'>
	<div class='panel-heading text-center'>
		<h4>De nghi tam ung</h4>
	</div>
	<div class='panel-body'>
		<table id='dntung' class='table table-bordered table-striped table-hover table-condensed'>
			<thead>
				<th>So booking/bl</th>
				<th>Thoi gian hoan ung</th>
				<th>Ban ke chi tiet</th>
				<th>Tinh trang</th>
			</thead>
		</table>
	</div>
</section>
