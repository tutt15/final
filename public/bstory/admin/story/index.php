<?php include_once $_SERVER["DOCUMENT_ROOT"].'/VINAENTERPHP/bstory/templates/admin/inc/header.php'; ?>
<?php include_once $_SERVER["DOCUMENT_ROOT"].'/VINAENTERPHP/bstory/templates/admin/inc/leftbar.php'; ?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Quản lý truyen</h2>
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
                                        <input type="search" class="form-control input-sm" placeholder="Nhập tên truyện" style="float:right; width: 300px;" />
                                        <div style="clear:both"></div>
                                    </form><br />
                                </div>
                            </div>

                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên</th>
                                        <th>Danh muc</th>
                                        <th>Hinh anh</th>
                                        <th>Ngay dang</th>
                                        <th>Luot xem</th>
                                        <th width="160px">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php 
                                        $query = "SELECT story.*, cat.cat_id,cat.name AS cname FROM story JOIN cat  USING(cat_id)";
                                        $result = $mysqli->query($query);
                                        while ($arStory = mysqli_fetch_assoc($result)) {
                                            $id = $arStory['story_id'];
                                            $name = $arStory['name'];
                                            $cname = $arStory['cname'];
                                            $picture = $arStory['picture'];
                                            $counter = $arStory['counter'];
                                            $created_at = $arStory['created_at'];
                                            $created_at = date("d-m-y",strtotime($created_at));


                                            $urlDel = "del.php?id={$id}";
                                            $urlEdit = "edit.php?id={$id}";

                                        
                                     ?>

                                    <tr class=" gradeX">
                                        <td><?php echo $id; ?></td>
                                        <td><?php echo $name; ?></td>
                                        <td><?php echo $cname; ?></td>
                                        <td>
                                            <?php 
                                                if ($picture!="") {
                                            ?>
                                                    <img style="margin-left: 50px" width="100px" height="70px" src="/VINAENTERPHP/bstory/files/<?php echo $picture ?>" alt="">
                                            <?php
                                            }else{
                                                    echo "khong co hinh";
                                            }
                                             ?>
                                            </td>
                                        <td><?php echo $created_at; ?></td>
                                        <td><?php echo $counter; ?></td> 
                                        <!-- td class="center">
                                            <img src="assets/img/1.png" alt="" height="80px" width="100px" />
                                        </td> -->
                                        <td class="center">
                                            <a href="<?php echo $urlEdit; ?>" title="" class="btn btn-primary"><i class="fa fa-edit "></i> Sửa</a>
                                            <a onclick="return confirm('Ban co chac muon xoa ?')" href="<?php echo $urlDel; ?>" title="" class="btn btn-danger"><i class="fa fa-pencil"></i> Xóa</a>
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