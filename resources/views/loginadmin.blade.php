<!DOCTYPE HTML>
<html lang="en">
<head>
<title>Fashe | Admin</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Classic Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->

<!-- css files -->
<link rel="stylesheet" href="login/css/style.css" type="text/css" media="all" /> <!-- Style-CSS --> 
<link rel="stylesheet" href="login/css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
<!-- //css files -->

<!-- js -->
<script type="text/javascript" src="login/js/jquery-2.1.4.min.js"></script>
<!-- //js -->

<!-- online-fonts -->
<link href="//fonts.googleapis.com/css?family=Oleo+Script:400,700&amp;subset=latin-ext" rel="stylesheet">
<!-- //online-fonts -->
</head>
<body>
<script src="login/js/jquery.vide.min.js"></script>
    <div data-vide-bg="login/video/Ipad">
        <div class="center-container">
            <div class="header-w3l">
                <h1>Admin</h1>
            </div>
            <div class="main-content-agile">
                <div class="sub-main-w3">   
                    <div class="wthree-pro">
                        <h2>Login Here</h2>
                    </div>
                    <form action="{{ route('homepage') }}" method="post">
                        {{ csrf_field() }}
                         @if( session('thongbao'))
                            <div class="alert alert-danger">
                                {{session('thongbao')}}
                            </div>
                        @endif
                        <input placeholder="Email........" name="email" class="email" type="email" required="">
                        <span class="icon1"><i class="fa fa-user" aria-hidden="true"></i></span><br><br>
                        <input  placeholder="Password....." name="password" class="password" type="password" required="">
                        <span class="icon2"><i class="fa fa-unlock" aria-hidden="true"></i></span><br>
                        <div class="sub-w3l">
                            <h6><a href="#">Forgot Password?</a></h6>
                            <div class="right-w3l">
                                <input type="submit" value="Login">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="footer">
                <p>&copy;  Classic Login Form. All rights reserved </p>
            </div>
        </div>
    </div>

</body>
</html>