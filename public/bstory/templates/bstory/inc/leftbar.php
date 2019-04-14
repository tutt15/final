<div class="gadget">
  <h2 class="star">Danh mục truyện</h2>
  <div class="clr"></div>
  <ul class="sb_menu">
    <?php 
        $query = "SELECT * FROM cat";
        $result = $mysqli->query($query);
        while ($arCat = mysqli_fetch_assoc($result)) {
     ?>
    <li><a href="cat.php?id=<?php echo $arCat['cat_id']; ?>"><?php echo $arCat['name']; ?></a></li>
  <?php } ?>
  </ul>
</div>

<div class="gadget">
  <h2 class="star"><span>Truyện mới</span></h2>
  <div class="clr"></div>
  <ul class="ex_menu">
    <?php 
        $sql = "SELECT * FROM story ORDER BY story_id DESC LIMIT 3";
        $rel = $mysqli->query($sql);
        while ($arTopstory = mysqli_fetch_assoc($rel)) {
          
     ?>
    <li>
      <a href="detail.php?id=<?php echo $arTopstory['story_id'];?>"><?php echo $arTopstory['name']; ?></a><br />
      <?php echo $arTopstory['preview_text']; ?>
    </li>
    <?php } ?>
  </ul>
</div>