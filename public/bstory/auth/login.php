<?php include_once $_SERVER["DOCUMENT_ROOT"].'/VINAENTERPHP/bstory/templates/bstory/inc/header.php'; ?> 
<div class="content_resize">
  <div class="mainbar">
    <div class="article">
      <h2><span>Liên hệ</span></h2>
      <div class="clr"></div>
      <!-- <p>Nếu có thắc mắc hoặc góp ý, vui lòng liên hệ với chúng tôi theo thông tin dưới đây.</p> -->
    </div>
    <div class="article">
      <?php 
      $err ="";
        if (isset($_SESSION['user'])) {
          header("location:/VINAENTERPHP/bstory/admin/index.php");
        }
        if (isset($_POST['submit'])) {
          $username = $_POST['username'];
          $password = md5($_POST['password']);
          //echo $password;die();
          //if
          if (empty($username) ||empty($password)) {
            $err ="loi roi";
          }else{
            $query = "SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}'" ;
            $result = $mysqli->query($query);
            $arUser = mysqli_fetch_assoc($result);
            if ($arUser) {
              $_SESSION['user'] = $arUser;
              header("location:/VINAENTERPHP/bstory/admin/index.php");
            }else{
              echo "that bai";
            }
        }
      }
       ?>
      <div class="clr"></div>
      <p><?php echo $err; ?></p>
      <form action="#" method="post" id="sendemail">
        <ol>
          <li>
            <label for="name">Username(required)</label>
            <input id="name" name="username" class="text" />
          </li>
          <li>
            <label for="email">Password (required)</label>
            <input type="password" name="password" class="text" />
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
<!--  <?php include_once $_SERVER["DOCUMENT_ROOT"].'/VINAENTERPHP/bstory/templates/bstory/inc/leftbar.php'; ?>  -->
  </div>
  <div class="clr"></div>
</div>
<!-- <?php include_once $_SERVER["DOCUMENT_ROOT"].'/VINAENTERPHP/bstory/templates/bstory/inc/footer.php'; ?>  -->
