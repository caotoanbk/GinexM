@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
			@include('user.curator.khlhang_template', ['title' => 'KẾ HOẠCH LÀM HÀNG'])
        </div>
    </div>
</div>
@endsection
@section('javascript')
<script type='text/javascript' src='/js/user/curator/khlhang_home.js'></script>
@endsection
