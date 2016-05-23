@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
			<form id="tongkettamung" method="post" action="/process/tongket">
<input type="hidden" name="_token" value="{{ csrf_token() }}"
>
			<label for="month_tket">Tổng kết tạm ứng tháng: </label> 
			<input type="month" class="form-control" name="month_tket">
			<div>&nbsp;</div>
			<input type="submit" name='tkthang' class="btn-primary form-control" value="Tổng kết">
			</form>
        </div>
    </div>
</div>
@endsection
@section('javascript')
<script type='text/javascript' src='/js/user/director/tongket.js'></script>
@endsection
