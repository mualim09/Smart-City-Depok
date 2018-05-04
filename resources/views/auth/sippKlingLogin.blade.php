<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>SIPP KLING - LOGIN</title>

	<!-- bootstrap -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('css/AdminLTE.min.css') }}">

    <!-- login page css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">

    <style type="text/css">
    	.login-page {
    		background-color: #2e9d87;
    	}

    	.green-main-color {
			background: #2e9d87 !important;
			transition: all 0.3s;
		}

		.green-main-color:hover {
			background: #187361 !important;
			color: #fff;
		}

        .login-logo {
            background-color: #fff;
            margin-bottom: 0px !important;
            padding-bottom: 20px;
            padding-top: 20px;
        }

        .login-box {
            margin: 8% auto;
        }

		/*.login-logo img {
			border: 5px solid #fff;
			border-radius: 50%;
		}*/
    </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <img src="{{ asset('img/sipp-kling/logo.png') }}" alt="logo-admin" width="200px"/>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">

    <form class="form-horizontal" method="POST" action="{{ url('sipp-kling/login') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <div class="col-md-12">
                <input id="email" type="email" placeholder="Email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

            <div class="col-md-12">
                <input id="password" placeholder="Password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-12">
                <button type="submit" class="btn btn-primary col-xs-12 green-main-color">
                    Login
                </button>
            </div>
        </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>