<?php 
	if (!isset($_SESSION['user'])) {
      header("location:/VINAENTERPHP/bstory/auth/login.php");
    }
 ?>