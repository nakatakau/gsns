<?php
// my_profile保存処理を記述
session_start();
include_once __DIR__ . "/funcs.php";
// SESSIONからmy_idを取り出し
$my_id = $_SESSION["my_id"];
// テストでユーザーID2を登録
// $my_id=2;
// v($my_id);

//1. POSTデータ取得
$admission_area   = $_POST["admission_area"];
$course_name  = $_POST["course_name"];
$admission_period  = $_POST["admission_period"];
$graduation_date_year  = $_POST["graduation_date_year"];
$graduation_date_month  = $_POST["graduation_date_month"];
// graduation_dateは文字列結合で作成。形式'2020-10-1'
$graduation_date = $graduation_date_year . '-' . $graduation_date_month . '-' . 01;
$birthday_year  = $_POST["birthday_year"];
$birthday_month  = $_POST["birthday_month"];
$birthday_day  = $_POST["birthday_day"];
// birthdayは文字列結合で作成。形式'1989-11-25'
$birthday = $birthday_year . '-' . $birthday_month . '-' . $birthday_day;
$comment  = $_POST["comment"];
$blood_type  = $_POST["blood_type"];
$residence  = $_POST["residence"];
$birthplace  = $_POST["birthplace"];
$annual_income  = $_POST["annual_income"];
$english_skill  = $_POST["english_skill"];
$personality  = $_POST["personality"];
$why_gs  = $_POST["why_gs"];
$portfolio_title1  = $_POST["portfolio_title1"];
$portfolio_url1  = $_POST["portfolio_url1"];
$portfolio_comment1  = $_POST["portfolio_comment1"];
$portfolio_title2  = $_POST["portfolio_title2"];
$portfolio_url2  = $_POST["portfolio_url2"];
$portfolio_comment2  = $_POST["portfolio_comment2"];
$portfolio_title3  = $_POST["portfolio_title3"];
$portfolio_url3  = $_POST["portfolio_url3"];
$portfolio_comment3  = $_POST["portfolio_comment3"];
$occupation  = $_POST["occupation"];
$available_programming_language  = $_POST["available_programming_language"];
$available_skill  = $_POST["available_skill"];
$history  = $_POST["history"];
$qualification  = $_POST["qualification"];
$free_space  = $_POST["free_space"];
// アイコン画像のアップロード処理
// 1.file名の取得
if ($_FILES["profile_image"]["name"] != "" || null) {
  $profile_image = $_FILES["profile_image"]["name"];
  // 2.画像データをiconフォルダーにアップロード
  $upload = "../icon/";
  if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $upload . $profile_image)) {
    // アップロードが正常に完了したらセッションのimgを変更する
    $_SESSION["icon"]      = $profile_image;
  } else {
    // アップロードが失敗したらエラーを吐き出す
    echo $_FILES["profile_image"]["error"];
  }
} else {
  $profile_image = $_POST["default_icon"];
}


// v($admission_area);
// v($course_name);
// v($admission_period);
// v($graduation_date_year);
// v($graduation_date_month);
// v($graduation_date);
// v($birthday_year);
// v($birthday_month);
// v($birthday_day);
// v($birthday);
// v($comment);
// v($blood_type);
// v($residence);
// v($birthplace);
// v($annual_income);
// v($english_skill);
// v($personality);
// v($why_gs);
// v($portfolio_title1);
// v($portfolio_url1);
// v($portfolio_comment1);
// v($portfolio_title2);
// v($portfolio_url2);
// v($portfolio_comment2);
// v($portfolio_title3);
// v($portfolio_url3);
// v($portfolio_comment3);
// v($occupation);
// v($available_programming_language);
// v($available_skill);
// v($history);
// v($qualification);
// v($free_space);

//ここで本来はバリデーション

//DB接続します
$pdo = db_conn();

//usersテーブルへのデータ更新SQL作成
$sql = "
UPDATE
  users
SET
  admission_area = :admission_area,
  course_name = :course_name,
  admission_period = :admission_period,
  graduation_date = :graduation_date,
  birthday = :birthday,
  comment = :comment,
  blood_type = :blood_type,
  residence = :residence,
  birthplace = :birthplace,
  annual_income = :annual_income,
  english_skill = :english_skill,
  personality = :personality,
  why_gs = :why_gs,
  portfolio_title1 = :portfolio_title1,
  portfolio_url1 = :portfolio_url1,
  portfolio_comment1 = :portfolio_comment1,
  portfolio_title2 = :portfolio_title2,
  portfolio_url2 = :portfolio_url2,
  portfolio_comment2 = :portfolio_comment2,
  portfolio_title3 = :portfolio_title3,
  portfolio_url3 = :portfolio_url3,
  portfolio_comment3 = :portfolio_comment3,
  available_skill = :available_skill,
  history = :history,
  qualification = :qualification,
  free_space = :free_space,
  profile_image = :profile_image
WHERE  user_id = :my_id
;";
// v($sql);
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':admission_area', $admission_area, PDO::PARAM_STR);
$stmt->bindValue(':course_name', $course_name, PDO::PARAM_STR);
$stmt->bindValue(':admission_period', $admission_period, PDO::PARAM_STR);
$stmt->bindValue(':graduation_date', $graduation_date, PDO::PARAM_STR);
$stmt->bindValue(':birthday', $birthday, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
$stmt->bindValue(':blood_type', $blood_type, PDO::PARAM_STR);
$stmt->bindValue(':residence', $residence, PDO::PARAM_STR);
$stmt->bindValue(':birthplace', $birthplace, PDO::PARAM_STR);
$stmt->bindValue(':annual_income', $annual_income, PDO::PARAM_STR);
$stmt->bindValue(':english_skill', $english_skill, PDO::PARAM_STR);
$stmt->bindValue(':personality', $personality, PDO::PARAM_STR);
$stmt->bindValue(':why_gs', $why_gs, PDO::PARAM_STR);
$stmt->bindValue(':portfolio_title1', $portfolio_title1, PDO::PARAM_STR);
$stmt->bindValue(':portfolio_url1', $portfolio_url1, PDO::PARAM_STR);
$stmt->bindValue(':portfolio_comment1', $portfolio_comment1, PDO::PARAM_STR);
$stmt->bindValue(':portfolio_title2', $portfolio_title2, PDO::PARAM_STR);
$stmt->bindValue(':portfolio_url2', $portfolio_url2, PDO::PARAM_STR);
$stmt->bindValue(':portfolio_comment2', $portfolio_comment2, PDO::PARAM_STR);
$stmt->bindValue(':portfolio_title3', $portfolio_title3, PDO::PARAM_STR);
$stmt->bindValue(':portfolio_url3', $portfolio_url3, PDO::PARAM_STR);
$stmt->bindValue(':portfolio_comment3', $portfolio_comment3, PDO::PARAM_STR);
$stmt->bindValue(':available_skill', $available_skill, PDO::PARAM_STR);
$stmt->bindValue(':history', $history, PDO::PARAM_STR);
$stmt->bindValue(':qualification', $qualification, PDO::PARAM_STR);
$stmt->bindValue(':free_space', $free_space, PDO::PARAM_STR);
$stmt->bindValue(':profile_image', $profile_image, PDO::PARAM_STR);
$stmt->bindValue(':my_id', $my_id, PDO::PARAM_INT);
$status = $stmt->execute();
// v($status);

//SQL実行時にエラーがある場合STOP
if ($status == false) {
  sql_error($stmt);
}


//user_occupationテーブルへのデータ削除、登録処理
// ユーザに紐づく職種の削除処理
$occupationCount = count($occupation);
// 選択職種が0個でなければ、idに紐づく職種を削除する
if ($occupationCount !== 0) {
  $sql = "DELETE FROM user_occupation WHERE user_id = :my_id;";
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':my_id', $my_id, PDO::PARAM_STR);
  $status = $stmt->execute();
  // v($status);

  //SQL実行時にエラーがある場合STOP
  if ($status == false) {
    sql_error($stmt);
  }

  // ユーザに紐づくデータの登録処理
  foreach ($occupation as $occupation_id) {
    // ユーザに紐づく職種の登録処理
    $sql = "
    INSERT INTO
      user_occupation (user_id,occupation_id)
    VALUES
      (:user_id, :occupation_id)
    ;";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':user_id', $my_id, PDO::PARAM_STR);
    $stmt->bindValue(':occupation_id', $occupation_id, PDO::PARAM_STR);
    $status = $stmt->execute();
    // v($status);

    //SQL実行時にエラーがある場合STOP
    if ($status == false) {
      sql_error($stmt);
    }
  }
}

//user_occupationテーブルへのデータ削除、登録処理
// ユーザに紐づく職種の削除処理
$available_programming_language_count = count($available_programming_language);
// 選択職種が0個でなければ、idに紐づく職種を削除する
if ($available_programming_language_count !== 0) {
  $sql = "DELETE FROM user_available_programming_language WHERE user_id = :my_id;";
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':my_id', $my_id, PDO::PARAM_STR);
  $status = $stmt->execute();
  // v($status);

  //SQL実行時にエラーがある場合STOP
  if ($status == false) {
    sql_error($stmt);
  }

  // ユーザに紐づくデータの登録処理
  foreach ($available_programming_language as $available_programming_language_id) {
    // ユーザに紐づく使用可能言語の登録処理
    $sql = "
    INSERT INTO
      user_available_programming_language (user_id,available_programming_language_id)
    VALUES
      (:user_id, :available_programming_language_id)
    ;";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':user_id', $my_id, PDO::PARAM_STR);
    $stmt->bindValue(':available_programming_language_id', $available_programming_language_id, PDO::PARAM_STR);
    $status = $stmt->execute();
    // v($status);

    //SQL実行時にエラーがある場合STOP
    if ($status == false) {
      sql_error($stmt);
    }
  }
}

redirect("../view/my_profile.php");
