@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

				<div class="panel-body">
					<?php $email=Auth::user()->email; ?>
					@if($email == 'tony.cao@ginex.com.vn')
						@include('user.proponent')
					@endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
@if($email == 'tony.cao@ginex.com.vn')
<script type='text/javascript' src='/js/user/proponent.js'></script>
@endif

@endsection
