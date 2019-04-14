<?php include_once $_SERVER["DOCUMENT_ROOT"].'/VINAENTERPHP/bstory/templates/bstory/inc/header.php'; ?>
<?php 
    //dau tien ta tinh so dong
    $sql = "SELECT COUNT(*) AS sodong FROM story";
    $rel = $mysqli->query($sql);
    $arSodong = mysqli_fetch_assoc($rel);
    $tongSodong = $arSodong['sodong'];

    //lay so truyen tren mot trang
    // duoc dinh nghia trong file util/ConstantUlti.php
    $row_count =  ROW_COUNT;
    //tinh tong so trang 
    $tongSotrang = ceil($tongSodong / $row_count);
    //trang hienj tai
    $trangHientai = 1;
    if (isset($_GET['page'])) {
      $trangHientai = $_GET['page'];
    }
    //offset
    $offset = ($trangHientai - 1) * $row_count;
 ?>
<div class="content_resize">
  <div class="mainbar">
    <?php 
        $query = "SELECT * FROM story ORDER BY story_id DESC LIMIT {$offset},{$row_count}";
        $result = $mysqli->query($query);
        while ($arStory = mysqli_fetch_assoc($result)) {
     ?>
    <div class="article">
      <h2><?php echo $arStory['name']; ?></h2>
      <p class="infopost">Ngày đăng: <?php echo $arStory['created_at'] ?>. Lượt đọc: <?php echo $arStory['counter']; ?></p>
      <div class="clr"></div>
      <div class="img"><img src="/VINAENTERPHP/bstory/files/<?php echo $arStory['picture']; ?>" width="161" height="192" alt="" class="fl" /></div>
      <div class="post_content">
        <p><?php echo $arStory['preview_text']; ?></p>
        <p class="spec"><a href="detail.php?id=<?php echo $arStory['story_id'];?>" class="rm">Chi tiết</a></p>
      </div>
      <div class="clr"></div>
    </div>
<?php } ?>
    <p class="pages"><small>Trang <?php echo $trangHientai; ?> cua <?php echo $tongSotrang; ?></small> 
      <?php 
        for ($i = 1; $i < $tongSotrang; $i++) {
       ?>
       <?php if ($i == $trangHientai) {?>
      <span><?php echo $trangHientai; ?></span>
      <?php 
          }else{
       ?> 
      <a href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a> 
      <?php } ?>
    <?php } ?>
    </p>
  </div>
  <div class="sidebar">

<?php include_once $_SERVER["DOCUMENT_ROOT"].'/VINAENTERPHP/bstory/templates/bstory/inc/leftbar.php'; ?>
  </div>
  <div class="clr"></div>
</div>
<?php include_once $_SERVER["DOCUMENT_ROOT"].'/VINAENTERPHP/bstory/templates/bstory/inc/footer.php'; ?>
