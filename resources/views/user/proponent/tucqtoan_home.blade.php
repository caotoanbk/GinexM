@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
			@include('user.proponent', ['title' => 'TẠM ỨNG CHƯA QUYẾT TOÁN'])
        </div>
    </div>
</div>
@endsection
@section('javascript')
<script type='text/javascript' src='/js/user/proponent/tucqtoan_home.js'></script>
@endsection
