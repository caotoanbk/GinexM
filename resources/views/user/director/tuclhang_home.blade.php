@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
			@include('user.director', ['title' => 'KẾ HOẠCH ĐANG TRIỂN KHAI'])
        </div>
    </div>
</div>
@endsection
@section('javascript')
<script type='text/javascript' src='/js/user/director/tuclhang_home.js'></script>
@endsection
