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
    <!-- アイコン設定 -->
  <link rel="shortcut icon" href="../icon/icon_48.png"/>
  <title>新規ユーザー登録</title>
  <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>

  <div class="title">
    <img class="img_head" src="../img/rogo.png" alt="">
  </div>

  <div class="content">
    <h1 class="lg_ttl">新規ユーザー登録</h1>

    <form action="../app/regist_act.php" method="POST" class="input_form">

    <label for="userid" class="sr-only">名前（フルネーム）</label>
    <input type="text" class="bottom" id="userid" name="name" required autofocus>

    <label for="userid" class="sr-only">メールアドレス</label>
    <input type="email" class="bottom" id="userid" name="email" required autofocus pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">

    <label for="password" class="sr-only">パスワード</label>
    <input type="password" class="bottom" id="password" name="password" required pattern="^([a-zA-Z0-9]{6,})$">
    <div><font class="pass_font" color="#0000ff">半角英数字6文字以上で入力ください。</font></div>

    <div class="control">
    </div>
    <input class="btn" type="submit" id="login" value="新規登録">

    <div class="shinki_tag">
      <a class="shinki" href="../view/login.php">ログインはこちらから</a>
    </div>

  </div>

</body>
</html>
