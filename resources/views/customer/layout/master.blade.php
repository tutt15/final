<!DOCTYPE html>
<html lang="en">
<head>
  <title>Fashe Cosmetic</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <base href="{{asset('')}}"> 
  <link href="code/css/bootstrap.min.css" rel="stylesheet">
  <link href="code/css/font-awesome.min.css" rel="stylesheet">
  <link href="code/css/prettyPhoto.css" rel="stylesheet">
  <link href="code/css/price-range.css" rel="stylesheet">
  <link href="code/css/animate.css" rel="stylesheet">
  <link href="code/css/main.css" rel="stylesheet">
  <link href="code/css/responsive.css" rel="stylesheet">
  <link rel = "stylesheet" href = "http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="icon" type="image/png" href="code/images/icons/favicon.png"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="code/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="code/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="code/fonts/themify/themify-icons.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="code/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="code/fonts/elegant-font/html-css/style.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="code/vendor/animate/animate.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="code/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="code/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="code/vendor/select2/select2.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="code/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="code/vendor/slick/slick.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="code/vendor/lightbox2/css/lightbox.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="code/css/util.css">
  <link rel="stylesheet" type="text/css" href="code/css/main.css">
  <link rel="stylesheet" type="text/css" href="code/css/login.css" >
  <link rel="stylesheet" type="text/css" href="code/css/dropdow.css" >
<!--===============================================================================================-->
</head>
<body class="animsition">

@include('customer.layout.header')
@yield('content')
@include('customer.layout.footer')
  <!-- Container Selection1 -->
  <div>
    <img class="mess" id="img-show" style="float:right;margin-right: 10px; width: 45px;top: 150px;" src="upload/msg1.jpg">
    <img class="mess" id="img-hide" style="float:right;width: 45px;" src="upload/msg2.jpg">
  </div>
   <div id="chatbox" style="position:fixed; right:100px; bottom:10px; background-color: grey;" class="fb-page" data-tabs="messages" data-href="https://www.facebook.com/Fashe-Cosmetic-381958685983115/?modal=admin_todo_tour" data-width="250" data-height="300" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false">
    </div>

  <div id="dropDownSelect1"></div>
  


<script src="code/js/jquery.js"></script>
  <script src="code/js/bootstrap.min.js"></script>
  <script src="code/js/jquery.scrollUp.min.js"></script>
  <script src="code/js/price-range.js"></script>
    <script src="code/js/jquery.prettyPhoto.js"></script>
    <script src="code/js/main.js"></script>
<!--===============================================================================================-->
  <script type="text/javascript" src="code/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script type="text/javascript" src="code/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script type="text/javascript" src="code/vendor/bootstrap/js/popper.js"></script>
  <script type="text/javascript" src="code/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script type="text/javascript" src="code/vendor/select2/select2.min.js"></script>
  <script type="text/javascript">
    $(".selection-1").select2({
      minimumResultsForSearch: 20,
      dropdownParent: $('#dropDownSelect1')
    });
  </script>

<!--===============================================================================================-->
  <script type="text/javascript" src="code/vendor/slick/slick.min.js"></script>
  <script type="text/javascript" src="code/js/slick-custom.js"></script>
<!--===============================================================================================-->
  <script type="text/javascript" src="code/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script type="text/javascript" src="code/vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
  <script type="text/javascript" src="code/vendor/sweetalert/sweetalert.min.js"></script>
  <script type="text/javascript" src="code/js/login.js"></script>
  <script type="text/javascript">
    $('.block2-btn-addcart').each(function(){
      var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
      $(this).on('click', function(){
        var pro_id = $(this).find('button').attr('role');
        $.ajax
        ({
            url: '/addcartaj',
            // type: 'POST',              
            data: {
                "pro_id": pro_id,
            },
            success: function(result)
            {
              swal(nameProduct, "is added to cart !", "success");
              $('.cart-product').html(result);
            },
            error: function(data)
            {
                console.log(data);
            }
        });
        
        });
    });
    $('.btn-num-product-up').each(function(){
      var nameProduct = $(this).parent().parent().parent().find('.products').html();
      $(this).on('click', function(){
        var pro_id = $(this).find('button').attr('role');
        $.ajax
        ({
            url: '/addcartaj',
            // type: 'POST',              
            data: {
                "pro_id": pro_id,
            },
            success: function(result)
            {
              $('.cart-product').html(result);
            },
            error: function(data)
            {
                console.log(data);
            }
        });
        
        });
    });

    $('.block2-btn-addwishlist').each(function(){
      var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
      $(this).on('click', function(){
        alert();
        swal(nameProduct, "is added to wishlist !", "success");
      });
    });

    $('.btn-addcart-product-detail').click(function () {
        var pro_id = $(this).find('button').attr('role');
        var num = $('input[name=num-product]').val();
        var productDetailName = $('.product-detail-name').text();
        $.ajax
        ({
            url: '/addcartaj',
            // type: 'POST',              
            data: {
                "pro_id": pro_id,
                "num": num,
            },
            success: function(result)
            {
              swal(productDetailName, "is added to cart !", "success");
              $('.cart-product').html(result);
            },
            error: function(data)
            {
              console.log(data);
            }
        });
    });
  </script>

    
<!--===============================================================================================-->
  <script src="code/js/main.js"></script>
<!-- Load Facebook SDK for JavaScript -->

<script>
    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5";
      fjs.parentNode.insertBefore(js, fjs);
    }
    (document, 'script', 'facebook-jssdk'));
    $('#chatbox').hide();
    $('#img-hide').hide();
    $('#img-show').click(function(){
      $('#chatbox').show();
      $('#img-hide').show();
      $(this).hide();
    });
    $('#img-hide').click(function(){
      $('#chatbox').hide();
      $('#img-show').show();
      $(this).hide();
    });
  </script>
  


</body>
</html>
