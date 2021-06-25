<?php
//最初にSESSIONを開始！！ココ大事！！
session_start();
include_once __DIR__ . "/funcs.php";

//POST値
$lmail = $_POST["email"]; //login id
$lpw = $_POST["password"]; //login Password
// v($lmail);
// v($lpw);


//1.  DB接続します
$pdo = db_conn();

//2. データ登録SQL作成
$sql = "SELECT * FROM users WHERE mail=:lmail AND pass=:lpw";
$stmt = $pdo->prepare($sql); //* PasswordがHash化の場合→条件はlidのみ
$stmt->bindValue(':lmail', $lmail, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR); //* PasswordがHash化する場合はコメントアウトする
$status = $stmt->execute();
// v($status);

//3. SQL実行時にエラーがある場合STOP
if ($status == false) {
  sql_error($stmt);
}

//4. 抽出データ数を取得
$val = $stmt->fetch();         //1レコードだけ取得する方法
$count = $stmt->fetchColumn(); //SELECT COUNT(*)で使用可能()
// v($val);
// v($count);

//5. 該当レコードがあればSESSIONに値を代入
// if(password_verify($lpw, $val["lpw"])){ //* PasswordがHash化の場合はこっちのIFを使う
if ($val["user_id"] != "") {
  //Login成功時
  $_SESSION["chk_ssid"]  = session_id();
  // $_SESSION["kanri_flg"] = $val['kanri_flg'];
  $_SESSION["name"]      = $val['name'];
  // echo 'login succeed';
  redirect("../view/index.php");
} else {
  //Login失敗時(Logout経由)
  // echo 'login failed';
  redirect("../view/login.php");
}
