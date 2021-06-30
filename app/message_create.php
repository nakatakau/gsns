<?php
session_start();
include_once __DIR__ . "/../app/funcs.php";
sschk();
$my_id = $_SESSION["my_id"];
// v($my_id);

//GETデータ取得
$destination_user_id = isset($_GET['destination_user_id']) ? $_GET['destination_user_id'] : NULL;
$message = isset($_GET['message']) ? $_GET['message'] : NULL;
// 下記は本番環境ではコメントアウト
// $destination_user_id = 2;
// $message = 'hello';

// DB接続
$pdo = db_conn();

$sql = "
  INSERT
    INTO
      messages
    SET
      text=\"$message\",
      user_id=$my_id,
      destination_user_id=$destination_user_id;
";
// v($sql);

$stmt = $pdo->prepare($sql);
// $stmt->bindValue(':my_id', $my_id, PDO::PARAM_STR);
$status = $stmt->execute();

//SQL実行時にエラーがある場合STOP
if ($status == false) {
  sql_error($stmt);
}

$last_inserted_id=$pdo->lastInsertId();


$sql = "
  select * from messages where message_id=$last_inserted_id;
";
// v($sql);

$stmt = $pdo->prepare($sql);
// $stmt->bindValue(':my_id', $my_id, PDO::PARAM_STR);
$status = $stmt->execute();

//SQL実行時にエラーがある場合STOP
if ($status == false) {
  sql_error($stmt);
}

$message_record = $stmt->fetchAll(PDO::FETCH_ASSOC);
// v($message_record);
$result_json_message_record = json_encode($message_record);
// v($result_json_message_record);


echo $result_json_message_record;
