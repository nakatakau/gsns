<header>
  <div class="display">

    <div class="header">

      <a class="header_title" href="../view/index.php">
        <img class="img_head" src="../img/id.svg" alt="">
        <p class="tl_2">For</p>
        <p class="tl_3">G Talk</p>
      </a>

      <a class="top_menu" href="../view/my_profile.php">在学生</a>
      <a class="top_menu" href="../view/profile.php">卒業生</a>
      <a class="top_menu" href="../view/message.php">メッセージ</a>

    </div>

    <!-- ログインした人のnameが入る -->
    <div class="lefttag">
      <p><?php echo $_SESSION["name"]; ?>さん</p>
      <!-- ここにユーザーのプロフィール写真が入る -->
      <div class="btn-group dropend">
        <?php
          if($_SESSION['icon'] != "../img/default_icon.png"){
            $src = "../icon/".$_SESSION['icon'];
          } else {
            $src = $_SESSION['icon'];
          }
            echo "<img class='prof_img dropdown-toggle' src='". $src ."'alt='' width='50' height='50' data-bs-toggle='dropdown' aria-expanded='false' id='header_icon_img'>"
        ?>
        <a id="#" href="#"></a>
        <!-- ドロップダウンメニュー -->
        <ul class="dropdown-menu">
          <!-- Dropdown menu links -->
          <div class="drop_flex">
            <p class="drop_icon" data-feather="user"></p>
            <a class="boot_atag" href="../view/my_profile.php">プロフィール</a>
          </div>
          <br>
          <div class="drop_flex">
            <p class="drop_icon" data-feather="settings"></p>
            <a class="boot_atag" href="../view/account.php">アカウント</a>
          </div>
          <br>
          <div class="drop_flex">
            <p class="drop_icon" data-feather="power"></p>
            <a class="boot_atag" href="../app/logout_act.php">ログアウト</a>
          </div>
        </ul>
      </div>
    </div>

  </div>
</header>
<script>
  const get_icon_img = <?= $_SESSION['icon'] ?>
  alert("header_icon_img");
</script>
