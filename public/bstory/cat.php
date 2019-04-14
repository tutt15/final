<?php include_once $_SERVER["DOCUMENT_ROOT"].'/VINAENTERPHP/bstory/templates/bstory/inc/header.php'; ?>
<div class="content_resize">
  <div class="mainbar">
    
     <?php 
     $cat_id = $_GET['id'];
        $query = "SELECT * FROM story WHERE cat_id = {$cat_id}";
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
    <p class="pages"><small>Trang 1 / 2</small> <span>1</span> <a href="#">2</a> <a href="#">&raquo;</a></p>
  </div>
  <div class="sidebar">
  <?php include_once $_SERVER["DOCUMENT_ROOT"].'/VINAENTERPHP/bstory/templates/bstory/inc/leftbar.php'; ?> 
  </div>
  <div class="clr"></div>
</div>
<?php include_once $_SERVER["DOCUMENT_ROOT"].'/VINAENTERPHP/bstory/templates/bstory/inc/footer.php'; ?> 
