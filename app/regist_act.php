<?php
// ここに会員登録処理を記入する
session_start();
include_once __DIR__ . "/funcs.php";

//POSTデータ取得
$name = isset($_POST['name']) ? $_POST['name'] : NULL;
$mail = isset($_POST['email']) ? $_POST['email'] : NULL;
$pass = isset($_POST['password']) ? $_POST['password'] : NULL;

//バリデーション
if ($name == NULL || $mail == NULL || $pass == NULL) {
  redirect('../view/member_registration.php');
}

//DB接続します
$pdo = db_conn();

//新規会員登クエリ作成
$stmt = $pdo->prepare("INSERT INTO users(name,mail,pass)VALUES(:name,:mail,:pass)");
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
$stmt->bindValue(':pass', $pass, PDO::PARAM_STR);

//実行
$status = $stmt->execute();

//実行確認
if ($status == false) {
  sql_error($stmt);
  redirect('../view/member_registration.php');
}else{
  $_SESSION["my_id"] = $pdo->lastInsertId();
  $_SESSION["name"]  = $name;
  $_SESSION["icon"]  = "../img/default_icon.png";
  redirect("../view/index.php");
}
