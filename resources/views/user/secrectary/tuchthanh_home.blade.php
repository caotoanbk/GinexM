@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
			@include('user.secrectary', ['title' => 'TẠM ỨNG CHƯA HOÀN THÀNH'])
        </div>
    </div>
</div>
@endsection
@section('javascript')
<script type='text/javascript' src='/js/user/secrectary/tuchthanh_home.js'></script>
@endsection