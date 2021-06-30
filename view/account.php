<?php
session_start();
include_once __DIR__ . "/../app/funcs.php";
sschk();

//SESSIONからmy_idを取得
$my_id = $_SESSION["my_id"];
// v($my_id);

//DB接続します
$pdo = db_conn();

//ユーザデータ取得のためのSQL作成
$sql = "
  SELECT
    mail,pass,name
  FROM
    users
  WHERE
    user_id=:my_id;
";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':my_id', $my_id, PDO::PARAM_STR);
$status = $stmt->execute();

//SQL実行時にエラーがある場合STOP
if ($status == false) {
  sql_error($stmt);
}

// my_idで絞り込んだ一件分のデータを取得
$user_data = $stmt->fetch(PDO::FETCH_ASSOC);
// v($user_data);
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSSを入れる -->
  <link rel="stylesheet" href="../css/reset.css">
  <!-- ヘッダーBootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <!-- common.cssの読み込み -->
  <link rel="stylesheet" href="../css/common.css">
  <!-- ページ内のCSS読み込み -->
  <link rel="stylesheet" href="../css/account.css">
  <!-- line-awesome -->
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
  <!-- アイコン設定 -->
  <link rel="shortcut icon" href="../icon/icon_48.png" />
  <title>アカウントページ</title>
  <!-- featherアイコンの読み込み -->
  <script src="https://unpkg.com/feather-icons"></script>
</head>

<body>
  <?php
  include("../parts/header.php");
  ?>
  <main>
    <!-- 編集ページ -->
    <div class="display">
      <form action="../app/account_act.php" method="post">

        <div class="form">
          <input id="" value="<?php echo $user_data['name']; ?>" class="form_line " type="text" name="name">
        </div>

        <div class="form">
          <input id="" value="<?php echo $user_data['mail']; ?>" class="form_line" type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
        </div>

        <div class="form">
          <input id="" class="form_line" type="password" name="password" pattern="^([a-zA-Z0-9]{6,})$" placeholder="パスワード">
          <font class="fontsize" color="#0000ff">半角英数字6文字以上で入力ください。</font>
        </div>


        <input type="hidden" name="id" value="<?php echo $my_id ?>">

        <button type="btn" class="btn">更新</button>
      </form>
    </div>

  </main>
  <?php
  include("../parts/footer.php");
  ?>
  <script>
    //featherアイコン
    feather.replace();
  </script>
</body>

</html>
