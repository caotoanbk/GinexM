@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
			@include('partials.modal.yclhang')
			@include('user.director', ['title' => 'ĐỀ NGHỊ TẠM ỨNG'])
        </div>
    </div>
</div>
@endsection
@section('javascript')
<script type='text/javascript' src='/js/user/director/dntung_home.js'></script>
@endsection
