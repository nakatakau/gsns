<?php
// ここに会員登録処理を記入する
include_once __DIR__ . "/funcs.php";

//1. POSTデータ取得
$name   = $_POST["name"];
$mail  = $_POST["email"];
$pass    = $_POST["password"];
// v($name);
// v($mail);
// v($pass);

//本来はここでバリデーションを入れるべき


//2. DB接続します
$pdo = db_conn();   //function内の$pdoを受け取る

//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO users(name,mail,pass)VALUES(:name,:mail,:pass)");
$stmt->bindValue(':name', $name, PDO::PARAM_STR);      //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':mail', $mail, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':pass', $pass, PDO::PARAM_STR);        //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status == false) {
  sql_error($stmt);
} else {
  redirect("../view/index.php");
}
