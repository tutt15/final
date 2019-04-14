<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include_once $_SERVER["DOCUMENT_ROOT"].'/VINAENTERPHP/bstory/util/DBConnectionUtil.php'; ?>
<?php ob_start(); session_start();?>
<?php 
    // trong truong hop admin vs khach dugn chung mot header thif ta khong dungf cach ni dk boir no se lap vo han boi vayj ta dungf CheckUserUlti.php
    // if (isset($_SESSION['user'])) {
    //     header("location:/VINAENTERPHP/bstory/auth/login.php");
    // }
     include_once $_SERVER["DOCUMENT_ROOT"].'/VINAENTERPHP/bstory/util/CheckUserUtil.php';
 ?>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AdminCP | VinaEnter Edu</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="/VINAENTERPHP/bstory/templates/admin/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="/VINAENTERPHP/bstory/templates/admin/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="/VINAENTERPHP/bstory/templates/admin/css/custom.css" rel="stylesheet" />
   <script  type="text/javascript" src="/VINAENTERPHP/bstory/library/ckeditor/ckeditor.js"></script>
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">VinaEnter Edu</a>
            </div>
            <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Xin chào, <b><?php echo $_SESSION['user']['fullname']; ?></b> &nbsp; <a href="/VINAENTERPHP/bstory/auth/logout.php" class="btn btn-danger square-btn-adjust">Đăng xuất</a> </div>
        </nav>
        <!-- /. NAV TOP  -->
       