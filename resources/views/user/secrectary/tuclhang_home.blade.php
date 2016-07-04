@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
			@include('user.secrectary', ['title' => 'TẠM ỨNG CHƯA LÀM HÀNG'])
        </div>
    </div>
</div>
@endsection
@section('javascript')
<script type='text/javascript' src='/js/user/secrectary/tuclhang_home.js'></script>
@endsection
