@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
			@include('user.curator', ['title' => 'KẾ HOẠCH ĐANG TRIỂN KHAI'])
        </div>
    </div>
</div>
@endsection
@section('javascript')
<script type='text/javascript' src='/js/user/curator/tuclhang_home.js'></script>
@endsection
