<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register Imagtor</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{asset('app/admin/assets/css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('app/admin/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('app/admin/assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('app/admin/assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('app/admin/assets/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('app/admin/assets/css/cs-skin-elastic.css')}}">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="{{asset('app/admin/assets/scss/style.css')}}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body class="bg-dark">
    @if($message =Session::get('status'))
    <div class="alert alert-primary" role="alert">
     {{$message}}
    </div>
    @endif
    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="{{asset('app/admin/images/logo.png')}}" alt="">
                    </a>
                </div>
                <div class="login-form">
                    <form action="post-register" method="post">
                        @csrf
                        <input type="hidden" name="timezone" id="time-zone">
                        <div class="form-group">
                            <label>User Name</label>
                            <input type="text" class="form-control" name="txtUserName" placeholder="User Name">
                        </div>
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" class="form-control" placeholder="Email" name="txtEmail">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="txtPassWord">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Agree the terms and policy
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Register</button>
                        <div class="social-login-content">
                            <div class="social-button">
                                <button type="button" class="btn social facebook btn-flat btn-addon mb-3"><i class="ti-facebook"></i>Register with facebook</button>
                                <button type="button" class="btn social twitter btn-flat btn-addon mt-2"><i class="ti-twitter"></i>Register with twitter</button>
                            </div>
                        </div>
                        <div class="register-link m-t-15 text-center">
                            <p>Already have account ? <a href="{{route('getLoginForm')}}"> Sign in</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="{{asset('app/admin/assets/js/vendor/jquery-2.1.4.min.js')}}"></script>
    <script src="{{asset('app/admin/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('app/admin/assets/js/plugins.js')}}"></script>
    <script src="{{asset('app/admin/assets/js/main.js')}}"></script>
    <script type="text/javascript">
        var offset = new Date().getTimezoneOffset();
        var o  = Math.abs(offset)
        var offset = (offset < 0 ? "+" : "-") + ("00" + Math.floor(o / 60)).slice(-2) + ":" + ("00" + (o % 60)).slice(-2);
        
        jQuery('#time-zone').val(offset);
    </script>

</body>
</html>
