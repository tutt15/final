<?php include_once $_SERVER["DOCUMENT_ROOT"].'/VINAENTERPHP/bstory/templates/admin/inc/header.php'; ?>
	<?php 
		 if (isset($_GET["uid"])) {
        $uid =  $_GET["uid"];
    	$queryName = "SELECT * FROM users WHERE id = {$uid}";
         $resultO = $mysqli->query($queryName);
         $arOl = mysqli_fetch_assoc($resultO);
         $usernameOld = $arOl['username'];
         $fullnameOld = $arOl['fullname'];

        if ($arOl['username'] == 'hoa' && $_SESSION['user']['username'] != 'hoa') {
            header("location:index.php?msg= Ban khong co quyen xoa Admin");
            die();
        }
		$query ="DELETE FROM users WHERE id = {$uid}";
		$result = $mysqli->query($query);
		if ($result) {
          header("location:index.php?msg=Xoa thanh cong");  
        }
	}
	 ?>

<?php include_once $_SERVER["DOCUMENT_ROOT"].'/VINAENTERPHP/bstory/templates/admin/inc/footer.php'; ?>