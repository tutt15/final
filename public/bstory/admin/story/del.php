<?php include_once $_SERVER["DOCUMENT_ROOT"].'/VINAENTERPHP/bstory/templates/admin/inc/header.php'; ?>
	<?php 
		 if (isset($_GET["id"])) {
        $id =  $_GET["id"];
        //xoa anh khi minh xoa truyenj
    	$queryOld = "SELECT * FROM story WHERE story_id = {$id}";
    	$resultOld = $mysqli->query($queryOld);
    	$arOld = mysqli_fetch_assoc($resultOld);
    	$picture = $arOld['picture'];
    	if ($picture != "") {
    		unlink($_SERVER["DOCUMENT_ROOT"]."/VINAENTERPHP/bstory/files/".$picture);
    	}

    	//xoa truyen
		$query ="DELETE FROM story WHERE story_id = {$id}";
		$result = $mysqli->query($query);
			if ($result) {
	          header("location:index.php?msg=Xoa thanh cong");  
	        }
		}
	?>

<?php include_once $_SERVER["DOCUMENT_ROOT"].'/VINAENTERPHP/bstory/templates/admin/inc/footer.php'; ?>