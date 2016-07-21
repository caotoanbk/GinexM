@extends('layouts.app')
@section('content')
<div class="container">
	@if( Session::has('flash_message'))
			<div class="alert alert-success fade in"><em>{{ Session::get('flash_message')}}</em></div>
	@endif
    <div class="row">
        <div class="col-md-12">
			@include('user.proponent', ['title' => 'ĐỀ NGHỊ TẠM ỨNG'])
        </div>
    </div>
</div>
@endsection
@section('javascript')
<script type='text/javascript' src='/js/user/proponent/dntung_home.js'></script>
@endsection
