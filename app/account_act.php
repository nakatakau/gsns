<?php

include_once __DIR__ . "/funcs.php";

//1. POSTデータ取得
$mail  = $_POST["email"];
$pass  = $_POST["password"];
$name  = $_POST["name"];
$my_id = $_POST["my_id"];
// v($name);
// v($mail);
// v($pass);

//本来はここでバリデーションを入れるべき


//2. DB接続します
//function内の$pdoを受け取る
$pdo = db_conn();


if($pass==""){
    $sql = "UPDATE users SET mail=:mail,name=:name WHERE my_id=:my_id";
}else{
    $sql = "UPDATE users SET mail=:mail,name=:name,pass=:pass WHERE my_id=:my_id";
}

$stmt = $pdo->prepare($sql);

//Bind変数へ代入
if($pass!=""){
$stmt->bindValue(':pass', password_hash($pass, PASSWORD_DEFAULT), PDO::PARAM_STR);
}

//３．データ登録SQL作成
$stmt->bindValue(':mail', $mail, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':pass', $pass, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':name', $name, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
  sql_error($stmt);
} else {
  redirect("../view/my_profile.php");
}
