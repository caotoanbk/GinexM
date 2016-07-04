@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
			@include('user.proponent', ['title' => 'TẠM ỨNG CHƯA LÀM HÀNG'])
        </div>
    </div>
</div>
@endsection
@section('javascript')
<script type='text/javascript' src='/js/user/proponent/tuclhang_home.js'></script>
@endsection
