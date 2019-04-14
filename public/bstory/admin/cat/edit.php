<?php include_once $_SERVER["DOCUMENT_ROOT"].'/VINAENTERPHP/bstory/templates/admin/inc/header.php'; ?>
<?php include_once $_SERVER["DOCUMENT_ROOT"].'/VINAENTERPHP/bstory/templates/admin/inc/leftbar.php'; ?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Sua danh mục</h2>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />
        <div class="row">
            <div class="col-md-12">
                <!-- Form Elements -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
<?php 
$id=0;
$nameOld = "";
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $queryName = "SELECT * FROM cat WHERE cat_id = {$id}";
         $resultO = $mysqli->query($queryName);
         $arOl = mysqli_fetch_assoc($resultO);
         $nameOld = $arOl['name'];
    }

    if (isset($_POST["submit"])) {
        $name = $_POST['name'];
        $query = "UPDATE cat SET name = '{$name}' WHERE cat_id = {$id}";
        $result = $mysqli->query($query);
        if ($result) {
          header("location:index.php?msg=Sua thanh cong");  
        }
    }
 ?>                                
                                <form role="form" method="post">
                                    <div class="form-group">
                                        <label>Tên danh muc</label>
                                        <input type="text" name="name" value="<?php echo $nameOld; ?>" class="form-control" />
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-success btn-md">Sua</button>
                                </form>



                            </div>

                        </div>
                    </div>
                </div>
                <!-- End Form Elements -->
            </div>
        </div>
        <!-- /. ROW  -->
    </div>
    <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
<?php include_once $_SERVER["DOCUMENT_ROOT"].'/VINAENTERPHP/bstory/templates/admin/inc/footer.php'; ?>