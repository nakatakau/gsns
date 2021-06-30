<?php
session_start();
include_once __DIR__ . "/../app/funcs.php";
sschk();
$my_id = $_SESSION["my_id"];
// v($my_id);

//POSTデータ取得
$destination_user_id = isset($_GET['destination_user_id']) ? $_GET['destination_user_id'] : NULL;
// 下記は本番環境ではコメントアウト
// $destination_user_id=2;

// DB接続
$pdo = db_conn();
// 自分と送信先のメッセのやりとりを一覧で取得のためのクエリ作成
$sql = "
  SELECT
    *
  FROM
    messages
  WHERE
    (user_id=$my_id
  AND
    destination_user_id=$destination_user_id)
  OR
    (user_id=$destination_user_id
  AND
    destination_user_id=$my_id)
  ORDER BY
    created_at ASC;
";
// v($sql);

$stmt = $pdo->prepare($sql);
// $stmt->bindValue(':my_id', $my_id, PDO::PARAM_STR);
$status = $stmt->execute();

//クエリ実行時にエラーがある場合に停止
if ($status == false) {
  sql_error($stmt);
}

$destination_users = $stmt->fetchAll(PDO::FETCH_ASSOC);

// v($destination_users);
$result_json_destination_users = json_encode($destination_users);
// v($result_json_destination_users);

// フロント側への返却処理
echo $result_json_destination_users;
