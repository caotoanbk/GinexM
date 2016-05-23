@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        </div>
    </div>
</div>
@endsection
@section('javascript')
<script type='text/javascript'>
var month = "<?= $month?>";
var year = "<?= $year?>";
</script>
<script type='text/javascript' src='/js/user/director/tktudata.js'></script>
@endsection
