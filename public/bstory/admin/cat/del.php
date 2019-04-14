<?php include_once $_SERVER["DOCUMENT_ROOT"].'/VINAENTERPHP/bstory/templates/admin/inc/header.php'; ?>
	<?php 
		 if (isset($_GET["id"])) {
        $id =  $_GET["id"];
    
		$query ="DELETE FROM cat WHERE cat_id = {$id}";
		$result = $mysqli->query($query);
		if ($result) {
          header("location:index.php?msg=Xoa thanh cong");  
        }
	}
	 ?>

<?php include_once $_SERVER["DOCUMENT_ROOT"].'/VINAENTERPHP/bstory/templates/admin/inc/footer.php'; ?>