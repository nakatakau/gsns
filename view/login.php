<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSSの取り込み -->
  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" href="../css/login.css">
  <link href="https://unpkg.com/sanitize.css" rel="stylesheet"/>
  <link rel="shortcut icon" href="../img/icons/icon-48×48.png"/>
  <title>login</title>
  <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>

  <div class="title">
    <img class="img_head" src="../img/id.svg" alt="">
    <p class="tl_2">For</p>
    <p class="tl_3">G Talk</p>
  </div>

  <div class="content">
    <h1 class="lg_ttl">ログイン画面</h1>

    <form action="../app/login_act.php" method="POST" class="input_form">
    <label for="userid" class="sr-only">メールアドレス</label>
    <input type="email" class="bottom" id="userid" name="email" required autofocus style="margin-bottom:30px;">

    <label for="password" class="sr-only">パスワード</label>
    <input type="password" class="bottom" id="password" name="password" required style="margin-bottom:30px;">

    <div class="control">
    </div>
    <input class="btn" type="submit" id="login" value="ログイン">

    <div class="shinki_tag">
      <a class="shinki" href="../view/member_registration.php">新規登録はこちらから</a>
    </div>

  </div>

</body>
</html>
