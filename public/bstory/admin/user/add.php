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
                                  if (isset($_POST["submit"])) {
                                      $username = $_POST['username'];
                                      $pass = $_POST['password'];
                                      $password = md5($pass);
                                      $fullname = $_POST['fullname'];
                                      $query = "INSERT INTO users(username,password,fullname) VALUES('$username','$password','$fullname')";
                                      $result = $mysqli->query($query);
                                      if ($result) {
                                            header("location:index.php?msg=Them thanh cong");
                                            die();  
                                      }else{
                                           echo "Loi them khong thanh cong";
                                           die();
                                      }
                                  }
                                ?>                                
                                <form role="form" method="post">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="username" class="form-control" />
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control" />
                                        <label>Full name</label>
                                        <input type="text" name="fullname" class="form-control" />
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