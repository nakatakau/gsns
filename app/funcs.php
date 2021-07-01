<?php
// HTMLでのエスケープ処理をする関数
// 引数には変数も配列も両方受け取って
// サニタイジングできる関数として定義
function h($var)
{
  if (is_array($var)) {
    // 配列を受け取った時の処理
    return array_map('h', $var);
    // array_map:配列内の各部屋に
    // 第1引数で指定した関数を実行する
  } else {
    // 配列じゃない時の処理
    return htmlspecialchars($var, ENT_QUOTES, 'UTF-8');
  }
}
// デバッグ用関数
function v($val)
{
  echo '<pre>';
  var_dump($val);
  echo '</pre>';
}

//DB接続
function db_conn()
{
  if ($_SERVER['SERVER_NAME'] == 'localhost') {
    try {
      //db接続情報は自分のパソコンの環境に合わせて変更してね
      $db_name = "gtalk";    //データベース名
      $db_id   = "root";      //アカウント名
      $db_pw   = "root";      //パスワード：XAMPPはパスワード無しに修正してください。
      // $db_pw   = "root";      //パスワード：XAMPPはパスワード無しに修正してください。//中村(ローカル用)
      $db_host = "localhost"; //DBホスト
      return new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
    } catch (PDOException $e) {
      exit('DB Connection Error:' . $e->getMessage());
    }
  } else {
    // さくらへのdb接続
    $dsn = 'mysql:dbname=na7esan_gtalk;charset=utf8;host=mysql57.na7esan.sakura.ne.jp';
    $user = 'na7esan';
    $pass = '0218Masa1225';

    try {
      $pdo = new PDO($dsn, $user, $pass);
      return $pdo;
    } catch (PDOException $e) {
      exit('DBConnectError:' . $e->getMessage());
    }
  }
}

//SQLエラー
function sql_error($stmt)
{
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("SQLError:" . $error[2]);
}

//リダイレクト
function redirect($file_name)
{
  header("Location: " . $file_name);
  exit();
}


//SessionCheck
function sschk()
{
  if (!isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"] != session_id()) {
    exit("Login Error");
  } else {
    session_regenerate_id(true); //ページごとにidを入れ替えます
    $_SESSION["chk_ssid"] = session_id(); //新しいID取得→SESSION変数を入れ替える
  }
}

//$file = fileUpload("送信名","アップロード先フォルダ/");
function fileUpload($fname, $path)
{
  if (isset($_FILES[$fname]) && $_FILES[$fname]["error"] == 0) {
    //ファイル名取得
    $file_name = $_FILES[$fname]["name"];
    //一時保存場所取得
    $tmp_path  = $_FILES[$fname]["tmp_name"];
    //拡張子取得
    $extension = pathinfo($file_name, PATHINFO_EXTENSION);
    //ユニークファイル名作成
    $file_name = date("YmdHis") . md5(session_id()) . "." . $extension;
    // FileUpload [--Start--]
    $file_dir_path = $path . $file_name; //upload/aaaaaaaaa.jpg
    if (is_uploaded_file($tmp_path)) {
      if (move_uploaded_file($tmp_path, $file_dir_path)) {
        chmod($file_dir_path, 0644);
        return $file_name; //成功時：ファイル名を返す
      } else {
        return 1; //失敗時：ファイル移動に失敗
      }
    }
  } else {
    return 2; //失敗時：ファイル取得エラー
  }
}
