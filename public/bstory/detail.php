<?php include_once $_SERVER["DOCUMENT_ROOT"].'/VINAENTERPHP/bstory/templates/bstory/inc/header.php'; ?> 

<?php 
        $id_story = $_GET['id'];
        $sql = "SELECT * FROM story WHERE story_id = {$id_story}";
        $rel = $mysqli->query($sql);
        $arDetail = mysqli_fetch_assoc($rel);
 ?>
<div class="content_resize">
  <div class="mainbar">
    <div class="article">
      <h1><?php echo $arDetail['name']; ?></h1>
      <div class="clr"></div>
      <p>Ngày đăng: <?php echo $arDetail['created_at']; ?>. Lượt đọc: <?php echo $arDetail['counter']; ?></p>
      <div class="vnecontent">
          <p><?php echo $arDetail['detail_text']; ?>.</p>
      </div>
    </div>
    
    <div class="article">
      <h2><span>3</span> Truyện liên quan</h2>
      <?php 
        $query = "SELECT * FROM story WHERE story_id != {$id_story} AND cat_id = {$arDetail['cat_id']} ORDER BY story_id DESC LIMIT 3";
        $result = $mysqli->query($query);
        while ($arLQ = mysqli_fetch_assoc($result)) {
       ?>
      <div class="clr"></div>
      <div class="comment"> 
        <a href="detail.php?id=<?php echo $arLQ['story_id'];?>"><img src="/VINAENTERPHP/bstory/files/<?php echo $arLQ['picture'];?>" width="40" height="40" alt="" class="userpic" /></a>
        <h3><a href="detail.php?id=<?php echo $arLQ['story_id'];?>" title=""><?php echo $arLQ['name'] ?></a></h3>
        <p><?php echo $arLQ['preview_text']; ?></p>
      </div>
      <?php } ?>
      
    </div>
  </div>
  <div class="sidebar">
<?php include_once $_SERVER["DOCUMENT_ROOT"].'/VINAENTERPHP/bstory/templates/bstory/inc/leftbar.php'; ?> 
  </div>
  <div class="clr"></div>
</div>
<?php include_once $_SERVER["DOCUMENT_ROOT"].'/VINAENTERPHP/bstory/templates/bstory/inc/footer.php'; ?> 
  
