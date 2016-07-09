<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="_token" content="{!! csrf_token() !!}"/>

    <title>GinexM</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="/css/bootstrap-datetimepicker.min.css" type="text/css" rel='stylesheet'>
    <link type="text/css" href="/css/jquery-confirm.min.css" rel="stylesheet"> 
    <link type="text/css" href="/css/buttons.bootstrap.min.css" rel="stylesheet"> 
    <link type="text/css" href="/css/responsive.bootstrap.min.css" rel="stylesheet"> 
	<link type="text/css" href="/css/select.dataTables.min.css" rel="stylesheet">
	<link type="text/css" href="/css/jquery-ui.min.css" rel='stylesheet'>
	<link type="text/css" href="/css/jquery-ui.structure.min.css" rel='stylesheet'>
	<link type="text/css" href="/css/jquery-ui.theme.min.css" rel='stylesheet'>
	<link type="text/css" href="/css/mycss.css" rel='stylesheet'>
    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                   GinexM 
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
					@if(Auth::check())
						@if(Auth::user()->type == 0)
                    <li><a href="/proponent/ke-hoach-lam-hang">Ke hoach lam hang</a></li>
                    <li><a href="/proponent/de-nghi-tam-ung">Đề nghị tạm ứng</a></li>
                    <li><a href="/proponent/tam-ung-chua-lam-hang">Tạm ứng chưa làm</a></li>
                    <li><a href="/proponent/tam-ung-chua-quyet-toan">Tạm ứng chưa quyết toán</a></li>
                    <li><a href="/proponent/tam-ung-da-hoan-thanh">Tạm ứng đã hoàn thành</a></li>
						@endif
						@if(Auth::user()->type == 1)
                    <li><a href="/secrectary/ke-hoach-lam-hang">Ke hoach lam hang</a></li>
                    <li><a href="/secrectary/tam-ung-chua-hoan-thanh">De nghi tam ung</a></li>
                    <li><a href="/secrectary/tam-ung-chua-lam-hang">Tạm ứng chưa làm</a></li>
                    <li><a href="/secrectary/tam-ung-chua-quyet-toan">Tam ung chua quyet toan</a></li>
                    <li><a href="/secrectary/tam-ung-da-hoan-thanh">Tạm ứng đã hoàn thành</a></li>
						@endif
						@if(Auth::user()->type == 2)
                    <li><a href="/director/ke-hoach-lam-hang">Ke hoach lam hang</a></li>
                    <li><a href="/director/de-nghi-tam-ung">De nghi tam ung</a></li>
                    <li><a href="/director/tam-ung-chua-lam-hang">Tạm ứng chưa làm</a></li>
                    <li><a href="/director/tam-ung-chua-quyet-toan">Tạm ứng chưa quyết toán</a></li>
                    <li><a href="/director/tam-ung-da-hoan-thanh">Tạm ứng đã hoàn thành</a></li>
					<li><a href="/director/tong-ket-tam-ung-thang">Tổng kết tạm ứng tháng</a></li>
						@endif
						@if(Auth::user()->type == 3)
                    <li><a href="/curator/tam-ung-chua-hoan-thanh">Tạm ứng chưa kiem tra</a></li>
                    <li><a href="/curator/tam-ung-chua-lam-hang">Tạm ứng chưa làm</a></li>
                    <li><a href="/curator/tam-ung-chua-quyet-toan">Tam ung chua quyet toan</a></li>
                    <li><a href="/curator/tam-ung-da-hoan-thanh">Tạm ứng đã hoàn thành</a></li>
						@endif
					@endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
    <!-- JavaScripts -->
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery-confirm.min.js"></script>
    <script src="/js/jquery-ui.min.js"></script>
    <script src="/js/moment-with-locales.min.js"></script>
    <script src="/js/jquery.dataTables.min.js"></script>
    <script src="/js/datatables.bootstrap.js"></script>
    <script src="/js/dataTables.buttons.min.js"></script>
    <script src="/js/buttons.bootstrap.min.js"></script>
    <script src="/js/jszip.min.js"></script>
    <script src="/js/buttons.html5.min.js"></script>
    <script src="/js/buttons.print.min.js"></script>
	<script src="/js/bootstrap-datetimepicker.min.js"></script>
	<script src="/js/jquery.validate.min.js"></script>
	<script src='/js/autoNumeric-min.js'></script>
	<script src='/js/dataTables.responsive.min.js'></script>
	<script src='/js/responsive.bootstrap.min.js'></script>
	<script src='/js/dataTables.select.min.js'></script>
	@yield('javascript')
    <script type='text/javascript'>
     $(document).ready(function () {
      $('ul.nav > li > a[href="' + document.location.pathname + '"]').parent().addClass('active');
    });
   </script>
</body>
</html>
