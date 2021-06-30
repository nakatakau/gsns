<?php
session_start();
include_once __DIR__ . "/funcs.php";

//SESSIONからmy_idを取得
$my_id = $_SESSION["my_id"];
// v($my_id);

//1. POSTデータ取得
$mail  = $_POST["email"];
$pass  = $_POST["password"];
$name  = $_POST["name"];
// v($mail);
// v($pass);
// v($name);

//本来はここでバリデーションを入れるべき


//2. DB接続します
$pdo = db_conn();


if($pass===""){
  // echo 'passは更新されません';
    $sql = "UPDATE users SET mail=:mail,name=:name WHERE user_id=:my_id";
}else{
  // echo 'passは更新されましたか？';
    $sql = "UPDATE users SET mail=:mail,name=:name,pass=:pass WHERE user_id=:my_id";
}
v($sql);

$stmt = $pdo->prepare($sql);

//Bind変数へ代入
if($pass!==""){
$stmt->bindValue(':pass', $pass, PDO::PARAM_STR);
}

//３．データ登録SQL作成
$stmt->bindValue(':mail', $mail, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
// $stmt->bindValue(':pass', $pass, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':name', $name, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':my_id', $my_id, PDO::PARAM_INT);    //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
  sql_error($stmt);
} else {
  $_SESSION["name"]  = $name;
  redirect("../view/my_profile.php");
}
