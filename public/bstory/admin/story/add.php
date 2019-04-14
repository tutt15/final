<?php include_once $_SERVER["DOCUMENT_ROOT"].'/VINAENTERPHP/bstory/templates/admin/inc/header.php'; ?>
<?php include_once $_SERVER["DOCUMENT_ROOT"].'/VINAENTERPHP/bstory/templates/admin/inc/leftbar.php'; ?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Thêm truyen</h2>
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
    $queryCat = "SELECT * FROM cat";
    $resultCat = $mysqli->query($queryCat);

    if (isset($_POST["submit"])) {

        $name = $_POST['name'];
        $cat_id = $_POST['cat_id'];
        $mota = $_POST['mota'];
        $chitiet = $_POST['chitiet'];
        $picture = "";
        $created_at = date('Y-m-d');

        if(isset($_FILES['hinhanh'])){
            $namePic = $_FILES['hinhanh']['name'];
            $arName = explode(".",$namePic);// tach teen file thanh mang
            $duoiFile = end($arName);//lay duoi file 'vd: jpg,png'
            $nameNew = "VNE-".time().".".$duoiFile;//tao ten moi
            $tmp_name = $_FILES['hinhanh']['tmp_name'];
            //dường dần ROOT
            $path_root = $_SERVER['DOCUMENT_ROOT'];
            echo $path_root;
            //dường dẫn đầy đủ
            $path_upload = $path_root."/VINAENTERPHP/bstory/files/".$nameNew;
            if (move_uploaded_file($tmp_name,$path_upload)) {
                $picture = $nameNew;
            }
        }

        $query = "INSERT INTO story (name,preview_text,detail_text,created_at,cat_id,picture,counter) 
        VALUES('$name','$mota','$chitiet','$created_at','$cat_id','$picture',0)";
        $result = $mysqli->query($query);

        if ($result) {
          header("location:index.php?msg=Them thanh cong");  
        }
    }
 ?>                                
                                <form role="form" method="post" enctype="multipart/form-data" action="add.php">
                                    <div class="form-group">
                                        <label>Tên truyen</label>
                                        <input type="text" name="name" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Danh mục truyện</label>
                                        <select class="form-control" name="cat_id">
                                            <?php 
                                                while ($arCats = mysqli_fetch_assoc($resultCat)) {
 
                                             ?>
                                                <option value="<?php echo $arCats['cat_id']?>">
                                                    <?php echo $arCats['name']; ?>
                                                </option>
                                              <?php } ?>  
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Hình ảnh</label>
                                        <input type="file" name="hinhanh"  />
                                    </div>
                                    <div class="form-group">
                                        <label>Mô tả</label>
                                        <textarea class="form-control" rows="3" name="mota"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Chi tiết</label>
                                        <textarea class="form-control" rows="5" name="chitiet" id="post_content"></textarea>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-success btn-md">Thêm</button>
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
                            <script  type="text/javascript">
                                CKEDITOR.replace('post_content');
                            </script>

<?php include_once $_SERVER["DOCUMENT_ROOT"].'/VINAENTERPHP/bstory/templates/admin/inc/footer.php'; ?>