<?php include_once $_SERVER["DOCUMENT_ROOT"].'/VINAENTERPHP/bstory/templates/bstory/inc/header.php'; ?> 
  <?php 
    if (isset($_SESSION['user'])) {
      unset($_SESSION['user']);
      header("location:/VINAENTERPHP/bstory/auth/login.php");
    }
   ?>
<?php include_once $_SERVER["DOCUMENT_ROOT"].'/VINAENTERPHP/bstory/templates/bstory/inc/footer.php'; ?> 
