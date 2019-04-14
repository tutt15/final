<?php include_once $_SERVER["DOCUMENT_ROOT"].'/VINAENTERPHP/bstory/templates/admin/inc/header.php'; ?>
<?php include_once $_SERVER["DOCUMENT_ROOT"].'/VINAENTERPHP/bstory/templates/admin/inc/leftbar.php'; ?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Thêm người dùng</h2>
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
                                   
                                            $id = $_GET['uid'];
                                            $queryName = "SELECT * FROM users WHERE id = {$id}";
                                             $resultO = $mysqli->query($queryName);
                                             $arOl = mysqli_fetch_assoc($resultO);
                                             $usernameOld = $arOl['username'];
                                             $fullnameOld = $arOl['fullname'];

                                            if ($arOl['username'] == 'hoa' && $_SESSION['user']['username'] != 'hoa') {
                                                header("location:index.php?msg= Ban khong co quyen sua Admin");
                                            }
                                            if (isset($_POST["submit"])) {
                                                $password = $_POST['password'];
                                                $fullname = $_POST['fullname'];
                                                if ($_POST['password'] = "") {
                                                    $query = "UPDATE users SET fullname = '{$fullname}' WHERE id = {$id}";
                                                    $result = $mysqli->query($query);
                                                    if ($result) {
                                                        header("location:index.php?msg=Sua thanh cong");  
                                                        die();
                                                    }else{
                                                        echo "Co loi";
                                                        die();
                                                    }
                                                }else{
                                                    $password = md5($password);
                                                    $query = "UPDATE users SET password = '{$password}',fullname = '{$fullname}' WHERE id = {$id}";
                                                    $result = $mysqli->query($query);
                                                    if ($result) {
                                                        header("location:index.php?msg=Sua thanh cong");  
                                                        die();
                                                    }else{
                                                        echo "Co loi";
                                                        die();
                                                    }
                                                }
                                                
                                        }
                                     ?>        
                                                 
                                <form role="form" method="post">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="username" value="<?php echo $usernameOld; ?>" readonly="" class="form-control" />
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control" />
                                        <label>Full name</label>
                                        <input type="text" name="fullname" value="<?php echo $fullnameOld; ?>" class="form-control" />
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-success btn-md">Insert</button>
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