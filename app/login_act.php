<?php
session_start();
include_once __DIR__ . "/funcs.php";

//POST値
$lmail = $_POST["email"];
$lpw = $_POST["password"];

//DB接続します
$pdo = db_conn();

//usersテーブルからmailとpassで絞り込んだユーザデータ取得のためのクエリを作成
$sql = "SELECT * FROM users WHERE mail=:lmail AND pass=:lpw";
$stmt = $pdo->prepare($sql); //* PasswordがHash化の場合→条件はlidのみ
$stmt->bindValue(':lmail', $lmail, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR); //* PasswordをHash化する場合はコメントアウトする
$status = $stmt->execute();
// v($status);

//クエリ実行時にエラーがある場合は停止
if ($status == false) {
  sql_error($stmt);
}

//usersテーブルからmailとpassで絞り込んだ1件のデータを取得
$val = $stmt->fetch();
// v($val);

//取得したレコードでuser_idが空でなければSESSIONに値を代入
// if(password_verify($lpw, $val["lpw"])){ //* PasswordがHash化の場合はこっちのIFを使う
if ($val["user_id"] != "") {
  //Login成功時
  $_SESSION["chk_ssid"]  = session_id();
  $_SESSION["my_id"]     = $val['user_id'];
  $_SESSION["name"]      = $val['name'];
  // profile_imageが空ではない、もしくはNULLでなければセッションにプロフィール画像のパスを設定
  if($val['profile_image'] != "" || NULL){
    $_SESSION["icon"]      = $val['profile_image'];
  } else {
    // 画像パスがなければ、あらかじめ用意した画像を設定
    $_SESSION["icon"] = "../img/default_icon.png";
  }
  redirect("../view/index.php");
} else {
  //Login失敗時(Logout経由)
  redirect("../view/login.php");
}
