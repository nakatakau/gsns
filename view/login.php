<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSSの取り込み -->
  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" href="../css/common.css">
  <link rel="stylesheet" href="../css/login.css">
  <title>login</title>
</head>

<body>
  <main>
    <!-- ログインコンテンツ -->
    <div class="login">
      <!-- ロゴの配置 -->
      <div class="login_logo">
        <img src="" alt="">ロゴ
      </div>
      <!-- ログイン入力エリア -->
      <div class="input_box">
        <form action="" post="" class="input_form">
          <p class="login_text">メールアドレス</p>
          <input type="email" name="email">
          <p class="login_text">パスワード</p>
          <input type="password" name="password" class="margin_bottom_add">
          <div class="submit_btn">
            <input type="submit" value="ログイン">
          </div>
        </form>
        <!-- 新規会員登録画面へリンク -->
        <div class="link">
          <a href="member_registration.php">新規会員登録はこちら</a>
        </div>
      </div>
    </div>
  </main>
</body>

</html>
