@extends('layouts.app')
@section('content')
<div style="margin-left: 25px;">
<h4 class="modal-title text-info" id="myModalLabel">QUYẾT TOÁN TẠM ỨNG</h4>
<div><strong>Ly do tam ung:</strong><em class="text-info"><span id='ldtu' style="padding-left: 3em;"></span></em></div>
<div><strong>So tien tam ung:</strong> <em class="text-info"><span id='sttu' style='padding-left: 3em;'></span></em></div>
<div><strong>Ngay tam ung:</strong><em class="text-info"><span id='ntu' style='padding-left: 3em;'></span></em></div>
<div><strong>So tien con lai</strong><em class="text-danger"><span id='stclai' style='padding-left: 3em;'></span></em></div>
</div>
<div style="margin-left: 25px;">
@include('partials.form.qttung')	
</div>
@endsection
@section('javascript')
<script type='text/javascript' src='/js/user/proponent_qtoan.js'></script>
@endsection
