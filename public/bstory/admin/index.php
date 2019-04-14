<?php include_once $_SERVER["DOCUMENT_ROOT"].'/VINAENTERPHP/bstory/templates/admin/inc/header.php'; ?>
<?php include_once $_SERVER["DOCUMENT_ROOT"].'/VINAENTERPHP/bstory/templates/admin/inc/leftbar.php'; ?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>TRANG QUẢN TRỊ VIÊN</h2>
            </div>
        </div>
        <!-- /. ROW  -->
       
        <hr />
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-4">
                <div class="panel panel-back noti-box">
                    <span class="icon-box bg-color-green set-icon">
                    <i class="fa fa-bars"></i>
                </span>
                    <div class="text-box">
                        <p class="main-text"><a href="cat/index.php" title="">Quản lý danh mục</a></p>
                        <?php
                            $query = "SELECT * FROM cat";
                            $result = $mysqli->query($query);
                            $row_count = $result->num_rows;
                        ?>
                        <p class="text-muted">Có <?php echo $row_count ?> danh mục</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4">
                <div class="panel panel-back noti-box">
                    <span class="icon-box bg-color-blue set-icon">
                    <i class="fa fa-bell-o"></i>
                </span>
                    <div class="text-box">
                        <p class="main-text"><a href="story/index.php" title="">Quản lý truyện</a></p>
                        <?php
                            $query = "SELECT * FROM story";
                            $result = $mysqli->query($query);
                            $row_count = $result->num_rows;
                        ?>
                        <p class="text-muted">Có <?php echo $row_count ?> truyện</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4">
                <div class="panel panel-back noti-box">
                    <span class="icon-box bg-color-brown set-icon">
                    <i class="fa fa-rocket"></i>
                </span>
                    <div class="text-box">
                        <p class="main-text"><a href="user/index.php" title="">Quản lý người dùng</a></p>
                        <?php
                            $query = "SELECT * FROM users";
                            $result = $mysqli->query($query);
                            $row_count = $result->num_rows;
                        ?>
                        <p class="text-muted">Có <?php echo $row_count ?> nguoi dung</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /. PAGE WRAPPER  -->
<?php include_once $_SERVER["DOCUMENT_ROOT"].'/VINAENTERPHP/bstory/templates/admin/inc/header.php'; ?>