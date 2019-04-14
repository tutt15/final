<?php include_once $_SERVER["DOCUMENT_ROOT"].'/VINAENTERPHP/bstory/templates/admin/inc/header.php'; ?>
<?php include_once $_SERVER["DOCUMENT_ROOT"].'/VINAENTERPHP/bstory/templates/admin/inc/leftbar.php'; ?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Sửa truyện</h2>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />
        <div class="row">
            <div class="col-md-12">
                <!-- Form Elements -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <?php
                            if(isset($_GET['msg'])){
                        ?>
                        <div class="alert alert-info"><?php echo $_GET['msg']; ?></div>
                        <?php
                            }
                        ?>
                        <div class="row">
                            <?php
                                if (isset($_GET["id"])) {
                                    
                            
                                $id = $_GET['id'];
                                $query = "SELECT * FROM story WHERE story_id = {$id}";
                                $result = $mysqli->query($query);
                                $row = mysqli_fetch_assoc($result);
                             
                                $cat_id = $row['cat_id'];
                                $oldpicture = $row['picture'];
                          
                           
                                }
                                $err = "";
                                if(isset($_POST['submit'])){
                                    $name2 = $_POST['name'];
                                    $cat_id2 = $_POST['cat_id'];
                                    $preview_text = $_POST['preview_text'];
                                    $detail_text = $_POST['detail_text'];
                                    if(empty($name2) || empty($cat_id2) || empty($preview_text) || empty($detail_text)){
                                      $err = "Vui long nhap du thong tin";

                                    }else{

                                        $checkpicture = $_POST['checkpicture'];
                                        $newName = $oldpicture;
                                        if($checkpicture || $_FILES['newpicture']['name'] != ''){
                                            $path_root = $_SERVER['DOCUMENT_ROOT'];
                                            unlink($path_root.'/VINAENTERPHP/bstory/files/'.$newName);
                                            $newName = "";
                                        }
                                        if($_FILES['newpicture']['name'] != ''){
                                            $namePicture = $_FILES['newpicture']['name'];
                                            $arName = explode('.',$namePicture);
                                            $typeFile = end($arName);
                                            $newName = 'VNE-Story-'.time().'.'.$typeFile;
                                            $tmp_name = $_FILES['newpicture']['tmp_name'];
                                            $path_root = $_SERVER['DOCUMENT_ROOT'];
                                            $path_upload = $path_root.'/VINAENTERPHP/bstory/files/'.$newName;
                                            $move_upload = move_uploaded_file($tmp_name,$path_upload);
                                        }
                                        $query2 = "UPDATE story SET name = '{$name2}', preview_text = '{$preview_text}', detail_text = '{$detail_text}', picture = '{$newName}', cat_id = {$cat_id2} WHERE story_id = {$id}";
                                        $result2 = $mysqli->query($query2);
                                        if($result2){
                                            header("Location:index.php?msg=Sửa truyện thành công");
                                            die();
                                        }else{
                                            echo '<p>Có lỗi trong quá trình xử lý</p>';
                                            die();
                                        }
                                }
                            }
                            ?>
                            <div class="col-md-12">
                               <?php 
                                    if ($err) {
                                ?>
                                    <div class="alert alert-danger"><?php echo $err; ?></div>
                                <?php } ?>
                                <form role="form" action="" method="post" enctype="multipart/form-data" class="frEdit">
                                    <div class="form-group">
                                        <label>Tên truyện</label>
                                        <input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Danh mục truyện</label>
                                        <select name="cat_id" class="form-control">
                                        <?php
                                            $query2 = "SELECT * FROM cat";
                                            $result2 = $mysqli->query($query2);
                                            while($row2 = $result2->fetch_assoc()){
                                                if($row2['cat_id'] == $cat_id){
                                        ?>
                                                    <option selected value="<?php echo $row2['cat_id'] ?>" selected ><?php echo $row2['name'] ?></option>
                                        <?php
                                                }else{
                                        ?>
                                                    <option value="<?php echo $row2['cat_id'] ?>" ><?php echo $row2['name'] ?></option>
                                        <?php
                                                }
                                            }
                                        ?>
                                        </select>
                                    </div>
                                    <?php
                                        if($oldpicture != ""){
                                    ?>
                                    <div class="form-group">
                                        <label>Hình ảnh củ</label><br />
                                        <img src="/VINAENTERPHP/bstory/files/<?php echo $oldpicture ?>" alt="<?php echo $oldpicture ?>" width="90px" height="90px"><br />
                                        <input type="checkbox" name="checkpicture" /> Xóa ảnh
                                    </div>
                                    <?php
                                        }
                                    ?>
                                    <div class="form-group">
                                        <label>Hình ảnh mới</label>
                                        <input type="file" name="newpicture" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Mô tả</label>
                                        <textarea name="preview_text" class="form-control" rows="4"><?php echo $row['preview_text']; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Chi tiết</label>
                                        <textarea name="detail_text" class="form-control" rows="4" id="post_content"><?php echo $row['detail_text']; ?></textarea>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-success btn-md">Sửa</button>
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