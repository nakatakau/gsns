<?php
session_start();
include_once __DIR__ . "/funcs.php";
sschk();
$my_id = $_SESSION["my_id"];
// v($my_id);

//account.phpからのPOSTデータ取得
$name = isset($_POST['name']) ? $_POST['name'] : NULL;
$mail = isset($_POST['email']) ? $_POST['email'] : NULL;
$pass = isset($_POST['password']) ? $_POST['password'] : NULL;

//DB接続します
$pdo = db_conn();

//パスワードが空文字もしくはNULLの場合で分岐
if ($pass === "" || NULL) {
  // パスワードが空もしくはNULLの場合のクエリの作成、更新対象は名前とメールアドレス
  $sql = "
    UPDATE
      users
    SET
      name=:name,
      mail=:mail
    WHERE
      user_id=:my_id;
  ";
} else {
  // パスワードが入力されていた場合のクエリ作成。更新対象は名前、メール、パスワード
  $sql = "
    UPDATE
      users
    SET
      name=:name,
      mail=:mail,
      pass=:pass
    WHERE
      user_id=:my_id;
  ";
}
// v($sql);

$stmt = $pdo->prepare($sql);


$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
//$passが空文字でなければ:passに$passをバインド
if ($pass !== "") {
  $stmt->bindValue(':pass', $pass, PDO::PARAM_STR);
}
$stmt->bindValue(':my_id', $my_id, PDO::PARAM_INT);

$status = $stmt->execute();

// クエリの実行時にエラーが発生していれば処理の停止
if ($status === false) {
  sql_error($stmt);
} else {
  // クエリ実行に成功していれば、$nameをセッションに代入してマイプロフィールページにリダイレクト
  $_SESSION["name"]  = $name;
  redirect("../view/my_profile.php");
}
