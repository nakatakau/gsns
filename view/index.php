<?php
// session_start();
// include_once __DIR__ . "/../app/funcs.php";
// $my_id = $_SESSION["my_id"];
// // v($my_id);


// //POSTデータ取得
// //職種に関する情報
// $occupation = isset($_POST['occupation']) ? $_POST['occupation'] : [];
// $occupation_count = count($occupation);
// // v($occupation);
// // v($occupation_count);

// // 利用可能言語に関する情報
// $available_programming_language_id = isset($_POST['available_programming_language_id']) ? $_POST['available_programming_language_id'] : [];
// $available_programming_language_id_count = count($available_programming_language_id);
// // v($available_programming_language_id);
// // v($available_programming_language_id_count);


// // DB接続
// $pdo = db_conn();
// // 職種選択ボックスで何かしらあれば、職種を持つユーザーIDを取得する処理
// $occupations=[];
// if ($occupation_count !== 0) {

//   $where_occupations = '';
//   foreach ($occupation as $occupation_id) {
//     $where_occupations .= "occupation_id =" . $occupation_id . " or ";
//   }
//   $where_occupations = rtrim($where_occupations, " or ");
//   // v($where_occupations);

//   //user_occupationテーブルから検索対象のidを絞り込む
//   $sql = "
//   select
//     *
//   from
//     user_occupation
//   WHERE
//     $where_occupations
//   group by user_id
//   ;";
//   //  v($sql);
//   $stmt = $pdo->prepare($sql);
//   // $stmt->bindValue(':my_id', $my_id, PDO::PARAM_STR);
//   $status = $stmt->execute();

//   //SQL実行時にエラーがある場合STOP
//   if ($status == false) {
//     sql_error($stmt);
//   }

//   // 選択された職種を持つユーザーIDが$occupationsに入っている
//   $occupations = $stmt->fetchAll(PDO::FETCH_COLUMN, 1);
//   // v($occupations);
// }

// // 利用可能言語選択ボックスで何かしらあれば、言語を持つユーザーIDを取得する処理
// $langs = [];
// if ($available_programming_language_id_count !== 0) {

//   $where_available_programming_language = '';
//   foreach ($available_programming_language_id as $lang_id) {
//     $where_available_programming_language .= "available_programming_language_id = " . $lang_id . " or ";
//   }
//   $where_available_programming_language = rtrim($where_available_programming_language, " or ");
//   //user_occupationテーブルから検索対象のidを絞り込む
//   $sql = "
//   select
//     *
//   from
//     user_available_programming_language
//   WHERE
//     $where_available_programming_language
//   group by user_id;
//   ";
//   // v($sql);
//   $stmt = $pdo->prepare($sql);
//   // $stmt->bindValue(':my_id', $my_id, PDO::PARAM_STR);
//   $status = $stmt->execute();

//   // 選択された言語を持つユーザーIDが$langsに入っている
//   $langs = $stmt->fetchAll(PDO::FETCH_COLUMN, 1);
//   // v($langs);
//   //SQL実行時にエラーがある場合STOP
//   if ($status == false) {
//     sql_error($stmt);
//   }
// }

// // 職種と利用可能言語を持つユーザidを結合
// $search_target_users_id=array_merge($occupations,$langs);
// // v($search_target_users_id);
// // 結合した配列から重複を排除
// $search_target_users_id = array_unique($search_target_users_id);
// v($search_target_users_id);
// $search_target_users_id_count =count($search_target_users_id);
// // v($search_target_users_id_count);

// // 職種と利用可能言語を持つユーザーが一人以上なら検索処理(usersテーブルから基本情報を取得する処理)
// if ($search_target_users_id_count>=1) {
//   $where_users_id='';
//   foreach ($search_target_users_id as $user_id) {
//     $where_users_id .= "user_id = " . $user_id . " or ";
//   }
//   $where_users_id = rtrim($where_users_id, " or ");
//   // v($where_users_id);

//   $sql = "
//     select
//       *
//     from
//       users
//     WHERE
//       $where_users_id
//   ;";
//   // v($sql);
//   $stmt = $pdo->prepare($sql);
//   $status = $stmt->execute();

//   $result_users = $stmt->fetchAll(PDO::FETCH_ASSOC);
//   // v($result_users);
//   $result_json_users = json_encode($result_users);
//   v($result_json_users);

//   // ユーザに紐づく職種の取得処理
//   $where_users_id = '';
//   foreach ($search_target_users_id as $user_id) {
//     $where_users_id .= "user_id = " . $user_id . " or ";
//   }
//   $where_users_id = rtrim($where_users_id, " or ");
//   // v($where_users_id);

//   $sql = "
//     select
//       user_id, occupation_id
//     from
//       user_occupation
//     WHERE
//       $where_users_id
//   ;";
//   // v($sql);
//   $stmt = $pdo->prepare($sql);
//   $status = $stmt->execute();

//   $result_occupation = $stmt->fetchAll(PDO::FETCH_ASSOC);
//   // v($result_occupation);
//   $result_json_occupations = json_encode($result_occupation);
//   v($result_json_occupations);


//   // ユーザに紐づく職種の取得処理
//   $where_users_id = '';
//   foreach ($search_target_users_id as $user_id) {
//     $where_users_id .= "user_id = " . $user_id . " or ";
//   }
//   $where_users_id = rtrim($where_users_id, " or ");
//   // v($where_users_id);

//   $sql = "
//     select
//       user_id, available_programming_language_id
//     from
//       user_available_programming_language
//     WHERE
//       $where_users_id
//   ;";
//   // v($sql);
//   $stmt = $pdo->prepare($sql);
//   $status = $stmt->execute();

//   $result_langs = $stmt->fetchAll(PDO::FETCH_ASSOC);
//   // v($result_langs);
//   $result_json_langs = json_encode($result_langs);
//   v($result_json_langs);
// }

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSSを入れる -->
  <link rel="stylesheet" href="../css/reset.css">
  <!-- ヘッダーBootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <!-- common.cssの読み込み -->
  <link rel="stylesheet" href="../css/common.css">
  <!-- ページ内のCSS読み込み -->
  <link rel="stylesheet" href="../css/index.css">
    <!-- line-awesome -->
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
  <title>indexページ</title>
  <!-- featherアイコンの読み込み -->
  <script src="https://unpkg.com/feather-icons"></script>
</head>

<body>

  <?php
  include("../parts/header.php");
  ?>

  <main>
    <div class="main">

      <!-- ///////////////////ここから検索カード////////////////////// -->

      <form action="index.php" method="post" class="input_form">
        <div class="display_card_first">

          <!-- -----職種選択----- -->
          <div class="my_sentaku">
            <h1 class="#">職種</h1>
            <div class="tb_flex">

              <div class="check_box_design">
                <table>
                  <tr class="cell_tb">
                    <td>
                      <input type="checkbox" id="check_1" name="occupation[]" value="3">
                      <label for="check_1" class="check_display">フロントエンドエンジニア</label>
                    </td>
                  </tr>
                  <tr class="cell_tb">
                    <td>
                      <input type="checkbox" id="check_2" name="occupation[]" value="7">
                      <label for="check_2" class="check_display">機械学習エンジニア</label>
                    </td>
                  </tr>
                  <tr class="cell_tb">
                    <td>
                      <input type="checkbox" id="check_3" name="occupation[]" value="11">
                      <label for="check_3" class="check_display">データサイエンティスト</label>
                    </td>
                  </tr>
                  <tr class="cell_tb">
                    <td>
                      <input type="checkbox" id="check_4" name="occupation[]" value="15">
                      <label for="check_4" class="check_display">ゲームデザイナー</label>
                    </td>
                  </tr>
                  <tr class="cell_tb">
                    <td>
                      <input type="checkbox" id="check_5" name="occupation[]" value="19">
                      <label for="check_5" class="check_display">テクニカルディレクター</label>
                    </td>
                  </tr>
                </table>
              </div>

              <div class="check_box_design">
                <table>
                  <tr class="cell_tb">
                    <td>
                      <input type="checkbox" id="check_6" name="occupation[]" value="4">
                      <label for="check_6" class="check_display">バックエンドエンジニア</label>
                    </td>
                  </tr>
                  <tr class="cell_tb">
                    <td>
                      <input type="checkbox" id="check_7" name="occupation[]" value="8">
                      <label for="check_7" class="check_display">iOSエンジニア</label>
                    </td>
                  </tr>
                  <tr class="cell_tb">
                    <td>
                      <input type="checkbox" id="check_8" name="occupation[]" value="12">
                      <label for="check_8" class="check_display">グラフィックデザイナー</label>
                    </td>
                  </tr>
                  <tr class="cell_tb">
                    <td>
                      <input type="checkbox" id="check_9" name="occupation[]" value="16">
                      <label for="check_9" class="check_display">UI|UXデザイナー</label>
                    </td>
                  </tr>
                  <tr class="cell_tb">
                    <td>
                      <input type="checkbox" id="check_10" name="occupation[]" value="20">
                      <label for="check_10" class="check_display">アートディレクター</label>
                    </td>
                  </tr>
                </table>
              </div>

              <div class="check_box_design">
                <table>
                  <tr class="cell_tb">
                    <td>
                      <input type="checkbox" id="check_11" name="occupation[]" value="5">
                      <label for="check_11" class="check_display">インフラエンジニア</label>
                    </td>
                  </tr>
                  <tr class="cell_tb">
                    <td>
                      <input type="checkbox" id="check_12" name="occupation[]" value="9">
                      <label for="check_12" class="check_display">Androidエンジニア</label>
                    </td>
                  </tr>
                  <tr class="cell_tb">
                    <td>
                      <input type="checkbox" id="check_13" name="occupation[]" value="13">
                      <label for="check_13" class="check_display">Webデザイナー</label>
                    </td>
                  </tr>
                  <tr class="cell_tb">
                    <td>
                      <input type="checkbox" id="check_14" name="occupation[]" value="17">
                      <label for="check_14" class="check_display">プロダクトデザイナー</label>
                    </td>
                  </tr>
                  <tr class="cell_tb">
                    <td>
                      <input type="checkbox" id="check_15" name="occupation[]" value="21">
                      <label for="check_15" class="check_display">PM</label>
                    </td>
                  </tr>
                </table>
              </div>

              <div class="check_box_design">
                <table>
                  <tr class="cell_tb">
                    <td>
                      <input type="checkbox" id="check_16" name="occupation[]" value="6">
                      <label for="check_16" class="check_display">Dev Opsエンジニア</label>
                    </td>
                  </tr>
                  <tr class="cell_tb">
                    <td>
                      <input type="checkbox" id="check_17" name="occupation[]" value="10">
                      <label for="check_17" class="check_display">ゲーム開発エンジニア</label>
                    </td>
                  </tr>
                  <tr class="cell_tb">
                    <td>
                      <input type="checkbox" id="check_18" name="occupation[]" value="14">
                      <label for="check_18" class="check_display">CGデザイナー</label>
                    </td>
                  </tr>
                  <tr class="cell_tb">
                    <td>
                      <input type="checkbox" id="check_19" name="occupation[]" value="18">
                      <label for="check_19" class="check_display">クリエイティブディレクター</label>
                    </td>
                  </tr>
                  <tr class="cell_tb">
                    <td>
                      <input type="checkbox" id="check_20" name="occupation[]" value="22">
                      <label for="check_20" class="check_display">PO</label>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>

          <!-- -----プログラミング言語選択----- -->
          <div class="my_sentaku">
            <h1 class="#">使用可能プログラミング言語</h1>
            <div class="tb_flex gengo_sentaku">

              <div class="check_box_design">
                <table>
                  <tr class="cell_tb gengo_a">
                    <td>
                      <input type="checkbox" id="check_ht" name="available_programming_language_id[]" value="3">
                      <label for="check_ht" class="check_display">HTML</label>
                    </td>
                  </tr>
                  <tr class="cell_tb">
                    <td>
                      <input type="checkbox" id="check_cc" name="available_programming_language_id[]" value="7">
                      <label for="check_cc" class="check_display">C#</label>
                    </td>
                  </tr>
                  <tr class="cell_tb">
                    <td>
                      <input type="checkbox" id="check_go" name="available_programming_language_id[]" value="11">
                      <label for="check_go" class="check_display">Go</label>
                    </td>
                  </tr>
                  <tr class="cell_tb">
                    <td>
                      <input type="checkbox" id="check_kt" name="available_programming_language_id[]" value="15">
                      <label for="check_kt" class="check_display">Kotlin</label>
                    </td>
                  </tr>
                </table>
              </div>

              <div class="check_box_design">
                <table>
                  <tr class="cell_tb">
                    <td>
                      <input type="checkbox" id="check_cs" name="available_programming_language_id[]" value="4">
                      <label for="check_cs" class="check_display">CSS</label>
                    </td>
                  </tr>
                  <tr class="cell_tb">
                    <td>
                      <input type="checkbox" id="check_py" name="available_programming_language_id[]" value="8">
                      <label for="check_py" class="check_display">Python</label>
                    </td>
                  </tr>
                  <tr class="cell_tb">
                    <td>
                      <input type="checkbox" id="check_sw" name="available_programming_language_id[]" value="12">
                      <label for="check_sw" class="check_display">Swift</label>
                    </td>
                  </tr>
                </table>
              </div>

              <div class="check_box_design">
                <table>
                  <tr class="cell_tb">
                    <td>
                      <input type="checkbox" id="check_jv" name="available_programming_language_id[]" value="5">
                      <label for="check_jv" class="check_display1">Java</label>
                    </td>
                  </tr>
                  <tr class="cell_tb">
                    <td>
                      <input type="checkbox" id="check_js" name="available_programming_language_id[]" value="9">
                      <label for="check_js" class="check_display1">JavaScript</label>
                    </td>
                  </tr>
                  <tr class="cell_tb">
                    <td>
                      <input type="checkbox" id="check_ph" name="available_programming_language_id[]" value="13">
                      <label for="check_ph" class="check_display1">PHP</label>
                    </td>
                  </tr>
                </table>
              </div>

              <div class="check_box_design">
                <table>
                  <tr class="cell_tb">
                    <td>
                      <input type="checkbox" id="check_cp" name="available_programming_language_id[]" value="6">
                      <label for="check_cp" class="check_display2">C++</label>
                    </td>
                  </tr>
                  <tr class="cell_tb">
                    <td>
                      <input type="checkbox" id="check_rb" name="available_programming_language_id[]" value="10">
                      <label for="check_rb" class="check_display2">Ruby</label>
                    </td>
                  </tr>
                  <tr class="cell_tb">
                    <td>
                      <input type="checkbox" id="check_ts" name="available_programming_language_id[]" value="14">
                      <label for="check_ts" class="check_display2">TypeScript</label>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>

          <!-- -----その他の選択----- -->

          <h1 class="#">その他</h1>
          <div class="sonota_sentaku">

            <div class="check_box_design sonota">
              <input type="checkbox" class="portfolio_sentaku" id="portfolio_sentaku1" name="portfolio_title[]" value="">
              <label for="portfolio_sentaku1">ポートフォリオあり</label>
            </div>

            <div class="check_box_design sonota">
              <input type="checkbox" class="zaigakusei_sentaku" id="zaigakusei_sentaku1" name="admission_period[]" value="">
              <label for="zaigakusei_sentaku1">在学生のみ</label>
            </div>

            <div class="check_box_design sonota">
              <input type="checkbox" class="sotugyou_sentaku" id="sotugyou_sentaku1" name="admission_period[]" value="">
              <label for="sotugyou_sentaku1">卒業生のみ</label>
            </div>
          </div>

          <!-- -----ステータスの選択----- -->
          <div class="kihon_info">

            <div class="resident">
              <label for="resident">居住地</label>
              <select name="residence" id="address">
                <option value=""></option>
              </select>
            </div>

            <div class="birthplace">
              <label class="labtg" for="resident">出身地</label>
              <select name="birthplace" id="from">
                <option value=""></option>
              </select>
            </div>

            <div class="blood_type">
              <label class="labtg" for="blood_type">血液型</label>
              <select name="blood_type" id="">
                <option value=""></option>
                <option value="3">A型</option>
                <option value="4">B型</option>
                <option value="6">O型</option>
                <option value="5">AB型</option>
                <option value="2">不明</option>
              </select>
            </div>

            <div class="personality">
              <label class="labtg" for="personality">性格</label>
              <select name="personality" id="">
                <option value=""></option>
                <option value="3">熱血</option>
                <option value="4">冷静</option>
                <option value="5">社交的</option>
                <option value="6">内気</option>
                <option value="7">上品</option>
                <option value="8">派手</option>
                <option value="9">インドア</option>
                <option value="10">アウトドア</option>
                <option value="11">ポジティブ</option>
                <option value="12">ネガティブ</option>
                <option value="13">決断力</option>
                <option value="14">優柔不断</option>
                <option value="15">朝型</option>
                <option value="16">夜型</option>
                <option value="17">現実的</option>
                <option value="18">物怖じしない</option>
                <option value="19">怖がり</option>
                <option value="19">怖がり</option>
                <option value="20">優しい</option>
                <option value="21">理性的</option>
                <option value="22">感情的</option>
                <option value="23">真面目</option>
                <option value="24">面倒くさがり</option>
                <option value="25">丁寧</option>
                <option value="26">がさつ</option>
                <option value="27">目立ちたがり</option>
                <option value="28">控えめ</option>
                <option value="29">積極的</option>
                <option value="30">受け身</option>
                <option value="31">計画的</option>
                <option value="32">行き当たりばったり</option>
                <option value="33">おしゃべり</option>
                <option value="34">寡黙</option>
                <option value="35">我慢強い</option>
                <option value="36">革新的</option>
                <option value="37">保守的</option>
                <option value="38">せっかち</option>
                <option value="39">のんびり</option>
                <option value="40">気分屋</option>
                <option value="41">天然</option>
                <option value="42">負けず嫌い</option>
                <option value="43">綺麗好き</option>
              </select>
            </div>

            <div class="annual">
              <label class="labtg" for="annual">年収</label>
              <select name="annual_income" id="">
                <option value=""></option>
                <option value="3">200万 - 399万</option>
                <option value="4">400万 - 599万</option>
                <option value="5">600万 - 799万</option>
                <option value="6">800万 - 999万</option>
                <option value="7">1000万 -</option>
                <option value="2">その他</option>
              </select>
            </div>

            <div class="english">
              <label class="labtg" for="english">英語力</label>
              <select name="english_skill" id="">
                <option value=""></option>
                <option value="3">日常会話</option>
                <option value="4">ビジネスレベル</option>
                <option value="5">ネイティブ</option>
                <option value="2">その他</option>
              </select>
            </div>

          </div>
          <!-- -----検索ボタン----- -->
          <input type="submit" id="btn" class="btn" value="検索">
        </div>
      </form>

      <!-- ///////////////////ここまでが検索カード////////////////////// -->


      <!-- /////////////////ここからプロフィールカード//////////////////// -->

      <div class="card_two">
        <div class="display_card_second">
          <!-- カード全体 -->
          <div class="card_info">
            <!-- プロフィール写真 -->
            <div class="one_item">
              <div class="img">
                <img id="" class="prof_img" src="../img/test1.png" alt="" width="70" height="70">
              </div>
              <a id="#" href="#">
                <p class="mail_icon data-feather" data-feather="mail"></p>
              </a>
            </div>

            <div class="two_item">
              <div class="card_title">
                <h1 class="school">東京LAB11期</h1>
              </div>

              <div class="card_user_name">
                <h2>加來 真有</h2>
              </div>

              <div class="card_main_info">
                <p>職種</p>
                <div class="preview_tag"></div>
                <div class="preview_tag"></div>
                <div class="preview_tag"></div>
              </div>

              <div class="card_main_info_">
                <p>使用可能プログラミング言語</p>
                <div class="preview_tag"></div>
                <div class="preview_tag"></div>
                <div class="preview_tag"></div>
              </div>
            </div>
          </div>
          <!-- ひとこと -->
          <div class="card_sub">
            <h2>ひとこと</h2>
            <div class="hitokoto_area">
              <p>ここにひとことが入る</p>
            </div>
            <input type="btn" id="details1" class="details" value="詳細をみる">
          </div>

        </div>

        <div class="display_card_second">
          <!-- カード全体 -->
          <div class="card_info">
            <!-- プロフィール写真 -->
            <div class="one_item">
              <div class="img">
                <img id="" class="prof_img" src="../img/test1.png" alt="" width="70" height="70">
              </div>
              <a id="#" href="#">
                <p class="mail_icon data-feather" data-feather="mail"></p>
              </a>
            </div>

            <div class="two_item">
              <div class="card_title">
                <h1 class="school">東京LAB11期</h1>
              </div>

              <div class="card_user_name">
                <h2>加來 真有</h2>
              </div>

              <div class="card_main_info">
                <p>職種</p>
                <div class="preview_tag"></div>
                <div class="preview_tag"></div>
                <div class="preview_tag"></div>
              </div>

              <div class="card_main_info_">
                <p>使用可能プログラミング言語</p>
                <div class="preview_tag"></div>
                <div class="preview_tag"></div>
                <div class="preview_tag"></div>
              </div>
            </div>
          </div>
          <!-- ひとこと -->
          <div class="card_sub">
            <h2>ひとこと</h2>
            <div class="hitokoto_area">
              <p>ここにひとことが入る</p>
            </div>
            <input type="btn" id="details1" class="details" value="詳細をみる">
          </div>

        </div>

        <div class="display_card_second">
          <!-- カード全体 -->
          <div class="card_info">
            <!-- プロフィール写真 -->
            <div class="one_item">
              <div class="img">
                <img id="" class="prof_img" src="../img/test1.png" alt="" width="70" height="70">
              </div>
              <a id="#" href="#">
                <p class="mail_icon data-feather" data-feather="mail"></p>
              </a>
            </div>

            <div class="two_item">
              <div class="card_title">
                <h1 class="school">東京LAB11期</h1>
              </div>

              <div class="card_user_name">
                <h2>加來 真有</h2>
              </div>

              <div class="card_main_info">
                <p>職種</p>
                <div class="preview_tag"></div>
                <div class="preview_tag"></div>
                <div class="preview_tag"></div>
              </div>

              <div class="card_main_info_">
                <p>使用可能プログラミング言語</p>
                <div class="preview_tag"></div>
                <div class="preview_tag"></div>
                <div class="preview_tag"></div>
              </div>
            </div>
          </div>
          <!-- ひとこと -->
          <div class="card_sub">
            <h2>ひとこと</h2>
            <div class="hitokoto_area">
              <p>ここにひとことが入る</p>
            </div>
            <input type="btn" id="details1" class="details" value="詳細をみる">
          </div>

        </div>
      </div>

      <!-- /////////////////ここまでがプロフィールカード//////////////////// -->

    </div>
  </main>
  <?php
  include("../parts/footer.php");
  ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script>
    //featherアイコン
    feather.replace();

    // ----------------------------------------------
    // 都道府県のオプションを追加
    // ----------------------------------------------
    let array = [{
      code: '1',
      name: '北海道',
      en: 'Hokkaidô'
    }, {
      code: '2',
      name: '青森県',
      en: 'Aomori'
    }, {
      code: '3',
      name: '岩手県',
      en: 'Iwate'
    }, {
      code: '4',
      name: '宮城県',
      en: 'Miyagi'
    }, {
      code: '5',
      name: '秋田県',
      en: 'Akita'
    }, {
      code: '6',
      name: '山形県',
      en: 'Yamagata'
    }, {
      code: '7',
      name: '福島県',
      en: 'Hukusima'
    }, {
      code: '8',
      name: '茨城県',
      en: 'Ibaraki'
    }, {
      code: '9',
      name: '栃木県',
      en: 'Totigi'
    }, {
      code: '10',
      name: '群馬県',
      en: 'Gunma'
    }, {
      code: '11',
      name: '埼玉県',
      en: 'Saitama'
    }, {
      code: '12',
      name: '千葉県',
      en: 'Tiba'
    }, {
      code: '13',
      name: '東京都',
      en: 'Tôkyô'
    }, {
      code: '14',
      name: '神奈川県',
      en: 'Kanagawa'
    }, {
      code: '15',
      name: '新潟県',
      en: 'Niigata'
    }, {
      code: '16',
      name: '富山県',
      en: 'Toyama'
    }, {
      code: '17',
      name: '石川県',
      en: 'Isikawa'
    }, {
      code: '18',
      name: '福井県',
      en: 'Hukui'
    }, {
      code: '19',
      name: '山梨県',
      en: 'Yamanasi'
    }, {
      code: '20',
      name: '長野県',
      en: 'Nagano'
    }, {
      code: '21',
      name: '岐阜県',
      en: 'Gihu'
    }, {
      code: '22',
      name: '静岡県',
      en: 'Sizuoka'
    }, {
      code: '23',
      name: '愛知県',
      en: 'Aiti'
    }, {
      code: '24',
      name: '三重県',
      en: 'Mie'
    }, {
      code: '25',
      name: '滋賀県',
      en: 'Siga'
    }, {
      code: '26',
      name: '京都府',
      en: 'Kyôto'
    }, {
      code: '27',
      name: '大阪府',
      en: 'Ôsaka'
    }, {
      code: '28',
      name: '兵庫県',
      en: 'Hyôgo'
    }, {
      code: '29',
      name: '奈良県',
      en: 'Nara'
    }, {
      code: '30',
      name: '和歌山県',
      en: 'Wakayama'
    }, {
      code: '31',
      name: '鳥取県',
      en: 'Tottori'
    }, {
      code: '32',
      name: '島根県',
      en: 'Simane'
    }, {
      code: '33',
      name: '岡山県',
      en: 'Okayama'
    }, {
      code: '34',
      name: '広島県',
      en: 'Hirosima'
    }, {
      code: '35',
      name: '山口県',
      en: 'Yamaguti'
    }, {
      code: '36',
      name: '徳島県',
      en: 'Tokusima'
    }, {
      code: '37',
      name: '香川県',
      en: 'Kagawa'
    }, {
      code: '38',
      name: '愛媛県',
      en: 'Ehime'
    }, {
      code: '39',
      name: '高知県',
      en: 'Kôti'
    }, {
      code: '40',
      name: '福岡県',
      en: 'Hukuoka'
    }, {
      code: '41',
      name: '佐賀県',
      en: 'Saga'
    }, {
      code: '42',
      name: '長崎県',
      en: 'Nagasaki'
    }, {
      code: '43',
      name: '熊本県',
      en: 'Kumamoto'
    }, {
      code: '44',
      name: '大分県',
      en: 'Ôita'
    }, {
      code: '45',
      name: '宮崎県',
      en: 'Miyazaki'
    }, {
      code: '46',
      name: '鹿児島県',
      en: 'Kagosima'
    }, {
      code: '47',
      name: '沖縄県',
      en: 'Kagosima'
    }, {
      code: '49',
      name: 'その他',
      en: ''
    }, ];
    const address = document.getElementById('address');
    const from = document.getElementById('from');
    array.forEach(target => {
      const option = document.createElement('option');
      option.value = target.code;
      option.textContent = target.name;
      address.appendChild(option);
    })
    array.forEach(target => {
      const option = document.createElement('option');
      option.value = target.code;
      option.textContent = target.name;
      from.appendChild(option);
    })
  </script>
</body>

</html>
