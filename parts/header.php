<header>
  <div class="display">
    <div class="header">
      <h1 class="logo">G talk</h1>

      <div class="maintag">
        <a class="top_menu" href="#">在学生</a>
      </div>

      <div class="maintag">
        <a class="top_menu" href="#">卒業生</a>
      </div>

      <div class="maintag">
        <a class="top_menu" href="#">メッセージ</a>
      </div>

      <!-- ログインした人のnameが入る -->
      <div class="lefttag">
        <p>user_name さん</p>
        <!-- ここにユーザーのプロフィール写真が入る -->
        <div class="btn-group dropend">
        <img class="prof_img dropdown-toggle" src="../img/test1.png" alt="" width="50" height="50" data-bs-toggle="dropdown" aria-expanded="false">
        <a id="#" href="#"></a>
            <!-- ドロップダウンメニュー -->
          <ul class="dropdown-menu">
            <!-- Dropdown menu links -->
            <div class="drop_flex">
            <p class="drop_icon" data-feather="user"></p>
            <a href="../view/my_profile.php">プロフィール</a>
            </div>
            <br>
            <div class="drop_flex">
            <p class="drop_icon" data-feather="settings"></p>
            <a href="../view/index.php">設定</a>
            </div>
            <br>
            <div class="drop_flex">
            <p class="drop_icon" data-feather="power"></p>
            <a href="../app/logout_act.php">ログアウト</a>
            </div>
          </ul>
        </div>
      </div>
    </div>
  </div>
</header>
