<?php
session_start();
include_once __DIR__ . "/../app/funcs.php";

//SESSIONからmy_idを取得
$my_id = $_SESSION["my_id"];

//DB接続します
$pdo = db_conn();

//ユーザデータ取得のためのSQL作成
$sql = "SELECT * FROM users WHERE user_id=:my_id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':my_id', $my_id, PDO::PARAM_STR);
$status = $stmt->execute();

//SQL実行時にエラーがある場合STOP
if ($status == false) {
  sql_error($stmt);
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/reset.css">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/common.css">
  <link rel="stylesheet" href="../css/account.css">
  <title>アカウント</title>
  <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>
<?php
include("../parts/header.php");
?>
<main>
  <!-- 編集ページ -->
  <div class="display">
    <form action="account_act.php" method="post">

    <div class="form">
      <input id="" value="<?php echo $hoge["email"]?>" class="form_line" type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
    </div>

    <div class="form">
      <input id="" class="form_line" type="password" name="password" pattern="^([a-zA-Z0-9]{6,})$" placeholder="パスワード">
    </div>
    <font class="fontsize" color="#0000ff">半角英数字6文字以上で入力ください。</font>

    <div class="form">
      <input id="" value="<?php echo $hoge["name"]?>" class="form_line " type="text" name="name" value="">
    </div>

    <input type="hidden" name="id" value="<?php echo $my_id ?>">

    <button type="btn" class="btn_edit" >更新</button>
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
