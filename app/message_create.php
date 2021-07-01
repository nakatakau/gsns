<?php
session_start();
include_once __DIR__ . "/../app/funcs.php";
sschk();
$my_id = $_SESSION["my_id"];

//GETデータ取得
$destination_user_id = isset($_GET['destination_user_id']) ? $_GET['destination_user_id'] : NULL;
$message = isset($_GET['message']) ? $_GET['message'] : NULL;

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

$stmt = $pdo->prepare($sql);
// $stmt->bindValue(':my_id', $my_id, PDO::PARAM_STR);
$status = $stmt->execute();

//SQL実行時にエラーがある場合STOP
if ($status == false) {
  sql_error($stmt);
}

//挿入したレコードの最新のmessage_idを取得
$last_inserted_id=$pdo->lastInsertId();

//挿入したレコードを取得するためのクエリを作成
$sql = "
  SELECT
    *
  FROM
    messages
  WHERE
    message_id=:last_inserted_id;
";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':last_inserted_id', $last_inserted_id, PDO::PARAM_INT);
$status = $stmt->execute();

//SQL実行時にエラーがある場合STOP
if ($status == false) {
  sql_error($stmt);
}

$message_record = $stmt->fetchAll(PDO::FETCH_ASSOC);
$result_json_message_record = json_encode($message_record);
// v($result_json_message_record);


echo $result_json_message_record;
