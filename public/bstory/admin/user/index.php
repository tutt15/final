<?php include_once $_SERVER["DOCUMENT_ROOT"].'/VINAENTERPHP/bstory/templates/admin/inc/header.php'; ?>
<?php include_once $_SERVER["DOCUMENT_ROOT"].'/VINAENTERPHP/bstory/templates/admin/inc/leftbar.php'; ?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Quản lý người dùng</h2>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />
<?php 
    if (isset($_GET["msg"])) {
        //echo $_GET["msg"];
?>
    <div class="alert alert-success" role="alert">
      <?php  echo $_GET["msg"]; ?>    
    </div>
<?php
    }
 ?> 
        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <div class="row">
                                <div class="col-sm-6">
                                    <a href="add.php" class="btn btn-success btn-md">Thêm</a>
                                </div>
                                <div class="col-sm-6" style="text-align: right;">
                                    <form method="post" action="">
                                        <input type="submit" name="search" value="Tìm kiếm" class="btn btn-warning btn-sm" style="float:right" />
                                        <input type="search" class="form-control input-sm" placeholder="Nhập tên người dùng" style="float:right; width: 300px;" />
                                        <div style="clear:both"></div>
                                    </form><br />
                                </div>
                            </div>

                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Full Name</th>
                                        <th width="160px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php 
                                        $query = "SELECT * FROM users";
                                        $result = $mysqli->query($query);
                                        while ($arUser = mysqli_fetch_assoc($result)) {
                                            $id = $arUser['id'];
                                            $name = $arUser['username'];
                                            $fullName = $arUser['fullname'];

                                            $urlDel = "del.php?uid={$id}";
                                            $urlEdit = "edit.php?uid={$id}";

                                        
                                     ?>

                                    <tr class=" gradeX">
                                        <td><?php echo $id; ?></td>
                                        <td><?php echo $name; ?></td>
                                        <td><?php echo $fullName; ?></td>

                                        
                                        <!-- td class="center">
                                            <img src="assets/img/1.png" alt="" height="80px" width="100px" />
                                        </td> -->
                                        <td class="center">

                                            <?php if ($name != 'hoa' || $_SESSION['user']['username'] == 'hoa') {?>
                                            <a href="<?php echo $urlEdit; ?>" title="" class="btn btn-primary"><i class="fa fa-edit "></i> Edit</a>
                                            <?php } ?>

                                            <?php 
                                                if ($name != 'hoa') {
                                             ?>
                                            <a onclick="return confirm('Ban co chac muon xoa ?')" href="<?php echo $urlDel; ?>" title="" class="btn btn-danger"><i class="fa fa-pencil"></i> Del</a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="dataTables_info" id="dataTables-example_info" style="margin-top:27px">Hiển thị từ 1 đến 5 của 24 truyện</div>
                                </div>
                                <div class="col-sm-6" style="text-align: right;">
                                    <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                                        <ul class="pagination">
                                            <li class="paginate_button previous disabled" aria-controls="dataTables-example" tabindex="0" id="dataTables-example_previous"><a href="#">Trang trước</a></li>
                                            <li class="paginate_button active" aria-controls="dataTables-example" tabindex="0"><a href="#">1</a></li>
                                            <li class="paginate_button " aria-controls="dataTables-example" tabindex="0"><a href="#">2</a></li>
                                            <li class="paginate_button " aria-controls="dataTables-example" tabindex="0"><a href="#">3</a></li>
                                            <li class="paginate_button " aria-controls="dataTables-example" tabindex="0"><a href="#">4</a></li>
                                            <li class="paginate_button " aria-controls="dataTables-example" tabindex="0"><a href="#">5</a></li>
                                            <li class="paginate_button next" aria-controls="dataTables-example" tabindex="0" id="dataTables-example_next"><a href="#">Trang tiếp</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>
    </div>

</div>
<!-- /. PAGE INNER  -->
<?php include_once $_SERVER["DOCUMENT_ROOT"].'/VINAENTERPHP/bstory/templates/admin/inc/header.php'; ?>