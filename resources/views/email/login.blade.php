<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Subscribe Hi-Depok</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.11/css/AdminLTE.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.11/css/skins/_all-skins.min.css">

    <style type="text/css">
    body {
        background-image: url("img/bg1.png");
        background-repeat: no-repeat;
        background-size:cover;
        background-attachment: fixed;
        background-position: center;
    }

</style>

</head>
<body>
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ url('/dashboard') }}"><b><font color="white">SUBSCRIBE HI-DEPOK</font></b></a>
        </div>

        <div class="login-box-body" style="padding: 13px;">
            <div style="border:2px solid black; padding: 30px; background-color:black; margin:-10px;">
                <center><img src="img/minilogo.png" width="80" height="80"></center><br>
                <p class="login-box-msg"><b>Silahkan isi email dan password dibawah untuk berlangganan</b></p>

                <form method="post" action="/sendMail">
                    {{ csrf_field() }}
                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" name="email" value="" placeholder="Email">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        <span class="help-block">
                            <strong></strong>
                        </span>
                    </div>

                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="Kata sandi" name="password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        <span class="help-block">
                            <strong></strong>
                        </span>

                    </div>
                    <div class="row">
                        <div class="col-xs-8">
                        </div>
                        <center><div class="col-xs-12">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Berlangganan</button>
                        </div></center>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>

    <!-- AdminLTE App -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.11/js/app.min.js"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%'
            });
        });
    </script>
</body>
</html>
