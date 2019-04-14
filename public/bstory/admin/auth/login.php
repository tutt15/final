<?php include_once $_SERVER["DOCUMENT_ROOT"].'/VINAENTERPHP/bstory/templates/bstory/inc/header.php'; ?>
<div class="content_resize">
  <div class="mainbar">
    <div class="article">
      <h2><span>Liên hệ</span></h2>
      <div class="clr"></div>
      <p>Nếu có thắc mắc hoặc góp ý, vui lòng liên hệ với chúng tôi theo thông tin dưới đây.</p>
    </div>
    <div class="article">
      <h2>Form liên hệ</h2>
      <div class="clr"></div>
      
      <form action="#" method="post" id="sendemail">
        <ol>
          <li>
            <label for="name">Username(required)</label>
            <input id="name" name="name" class="text" />
          </li>
          <li>
            <label for="email">Password (required)</label>
            <input id="email" name="password" class="text" />
          </li>
          <li>
            <input type="submit" name="submit" id="imageField" src="/VINAENTERPHP/bstory/templates/bstory/images/submit.gif" class="send" />
            <div class="clr"></div>
          </li>
        </ol>
      </form>
    </div>
  </div>
  <div class="sidebar">
 <?php include_once $_SERVER["DOCUMENT_ROOT"].'/VINAENTERPHP/bstory/templates/bstory/inc/leftbar.php'; ?> 
  </div>
  <div class="clr"></div>
</div>
<?php include_once $_SERVER["DOCUMENT_ROOT"].'/VINAENTERPHP/bstory/templates/bstory/inc/footer.php'; ?> 
