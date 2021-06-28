<?php
// session_start();
// include_once __DIR__ . "/../app/funcs.php";

// // //SESSIONからmy_idを取得
// // $my_id = $_SESSION["my_id"];

// // index.phpから該当ユーザーのidを取得
// $my_id = $_POST['user_id'];

// //DB接続します
// $pdo = db_conn();

// //ユーザデータ取得のためのSQL作成
// $sql = "SELECT * FROM users WHERE user_id=:my_id";
// $stmt = $pdo->prepare($sql);
// $stmt->bindValue(':my_id', $my_id, PDO::PARAM_STR);
// $status = $stmt->execute();

// //SQL実行時にエラーがある場合STOP
// if ($status == false) {
//   sql_error($stmt);
// }

// //抽出データ連想配列形式で取得
// $val = $stmt->fetch(PDO::FETCH_ASSOC);

// // userの基本情報をjsonに変換
// $user_info = json_encode($val);
// // v($user_info);


// //職種を取得のためのSQL作成
// $sql = "SELECT * FROM user_occupation WHERE user_id=:my_id";
// $stmt = $pdo->prepare($sql);
// $stmt->bindValue(':my_id', $my_id, PDO::PARAM_STR);
// $status = $stmt->execute();

// //SQL実行時にエラーがある場合STOP
// if ($status == false) {
//   sql_error($stmt);
// }

// //抽出データ連想配列形式で取得
// $val = $stmt->fetchAll(PDO::FETCH_ASSOC);

// //userの基本情報をjsonに変換
// $user_occupation = json_encode($val);
// // v($user_occupation);

// //利用可能言語を取得のためのSQL作成
// $sql = "SELECT * FROM user_available_programming_language WHERE user_id=:my_id";
// $stmt = $pdo->prepare($sql);
// $stmt->bindValue(':my_id', $my_id, PDO::PARAM_STR);
// $status = $stmt->execute();

// //SQL実行時にエラーがある場合STOP
// if ($status == false) {
//   sql_error($stmt);
// }

// //抽出データ連想配列形式で取得
// $val = $stmt->fetchAll(PDO::FETCH_ASSOC);

// //userの基本情報をjsonに変換
// $user_lang = json_encode($val);
// // v($user_lang);

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
  <link rel="stylesheet" href="../css/profile.css">
    <!-- line-awesome -->
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
  <title>プロフィール</title>
  <!-- featherアイコンの読み込み -->
  <script src="https://unpkg.com/feather-icons"></script>
</head>

<body>
  <?php
  include('../parts/header.php');
  ?>
  <main>
    <div class="profile_flex">
      <!-- プロフィールの１番目のブロック（アイコンとメッセージ） -->
      <div class="left">
        <div class="icon">
          <div class="gs_year">
            <p>地域</p>
            <select name="admission_area" id="admission_area">
              <option value="1"></option>
              <option value="3">東京</option>
              <option value="4">福岡</option>
              <option value="5">北海道</option>
              <option value="2">その他</option>
            </select>
          </div>
          <div class="gs_course">
            <p>コース</p>
            <select id="course_name" name="course_name">
              <option value="1"></option>
              <option value="3">LAB</option>
              <option value="4">DEV</option>
              <option value="5">BIZ</option>
              <option value="2">その他</option>
            </select>
            <input type="text" pattern="\d{2}" maxlength="2" name="admission_period" id="admission_period">
            <p>期</p>
          </div>
          <div class="graduate">
            <select id="year" name="graduation_date_year">
              <option value=""></option>
            </select>
            <p>年</p>
            <select id="month" name="graduation_date_month">
              <option value=""></option>
            </select>
            <p>月</p>
            <p>卒業</p>
          </div>
          <div class="icon_area">
            <div class="icon_area_img">
              <img src="../img/default_icon.png" alt="" id="img">
              <!-- <label for="profile_image" class="icon_select">
                  <input type="file" id="profile_image" name="profile_image" accept=".jpg,.png,.jpeg" style="display: none">
                  <i class="las la-camera" id="icon_select"></i>
                </label> -->
            </div>
          </div>
          <div class="icon_name_area">
            <p class="name" id="name">名前</p>
            <div class="birth">
              <p>生年月日</p>
              <select id="birth_year" name="birthday_year">
                <option value=""></option>
              </select>
              <p>年</p>
              <select id="birth_month" name="birthday_month">
                <option value=""></option>
              </select>
              <p>月</p>
              <select id="birth_day" name="birthday_day">
                <option value=""></option>
              </select>
              <p>日</p>
            </div>
          </div>
        </div>
        <div class="message_area">
          <textarea id="comment" cols="30" rows="2" placeholder="一言お願いします。" maxlength='42' name="comment"></textarea>
        </div>
        <div class="other">
          <table class="other_table">
            <tr class="cell">
              <td class="cell_left">血液型</td>
              <td class="cell_right">
                <select name="blood_type" id="blood_type">
                  <option value="1"></option>
                  <option value="3">A型</option>
                  <option value="4">B型</option>
                  <option value="6">O型</option>
                  <option value="5">AB型</option>
                  <option value="2">不明</option>
                </select>
              </td>
            </tr>
            <tr class="cell">
              <td class="cell_left">居住地</td>
              <td class="cell_right">
                <select name="residence" id="address">
                  <option value=""></option>
                </select>
              </td>
            </tr>
            <tr class="cell">
              <td class="cell_left">出身地</td>
              <td class="cell_right">
                <select name="birthplace" id="from">
                  <option value=""></option>
                </select>
              </td>
            </tr>
            <tr class="cell">
              <td class="cell_left">年収</td>
              <td class="cell_right">
                <select name="annual_income" id="annual_income">
                  <option value="1"></option>
                  <option value="3">200万 - 399万</option>
                  <option value="4">400万 - 599万</option>
                  <option value="5">600万 - 799万</option>
                  <option value="6">800万 - 999万</option>
                  <option value="7">1000万 - </option>
                  <option value="2">その他</option>
                </select>
              </td>
            </tr>
            <tr class="cell">
              <td class="cell_left">英語スキル</td>
              <td class="cell_right">
                <select name="english_skill" id="english_skill">
                  <option value="1"></option>
                  <option value="3">日常会話</option>
                  <option value="4">ビジネスレベル</option>
                  <option value="5">ネイティブ</option>
                  <option value="2">その他</option>
                </select>
              </td>
            </tr>
            <tr class="cell">
              <td class="cell_left">性格</td>
              <td class="cell_right">
                <select name="personality" id="personality">
                  <option value="1"></option>
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
              </td>
            </tr>
          </table>
        </div>
      </div>
      <div class="right">
        <!-- なぜG'sに入学したか? -->
        <div class="profile_area">
          <div class="profile_area_title">
            <p class="profile_area_name"> なぜG'sに入学したか? </p>
          </div>
          <div class="profile_area_content">
            <textarea name="why_gs" id="why_gs" cols="62" rows="5" placeholder="背景・経緯などを教えてください" class="profile_description" maxlength='400' readonly></textarea>
          </div>
        </div>
        <!-- プロフィールの２番目のブロック（ポートフォリオ） -->
        <div class="second">
          <p class="portfolio_title">ポートフォリオ・作品（３点まで）</p>
          <!-- １つ目のポートフォリオ -->
          <div class="portfolio_area" id="portfolio_area_1">
            <a href="" id="portfolio_area_url1">
              <p class="portfolio_area_title" id="portfolio_area_title1"></p>
            </a>
            <textarea name="portfolio_comment1" cols="50" rows="4" class="portfolio_area_description" id="portfolio_area_description1" placeholder="説明" readonly></textarea>
          </div>
          <!-- ２つ目のポートフォリオ -->
          <div class="portfolio_area" id="portfolio_area_2">
            <a href="" id="portfolio_area_url2">
              <p class="portfolio_area_title" id="portfolio_area_title2"></p>
            </a>
            <textarea name="portfolio_comment2" cols="50" rows="4" class="portfolio_area_description" id="portfolio_area_description2" placeholder="説明" readonly></textarea>
          </div>
          <!-- ３つ目のポートフォリオ -->
          <div class="portfolio_area" id="portfolio_area_3">
            <a href="" id="portfolio_area_url3">
              <p class="portfolio_area_title" id="portfolio_area_title3"></p>
            </a>
            <textarea name="portfolio_comment3" cols="50" rows="4" class="portfolio_area_description" id="portfolio_area_description3" placeholder="説明" readonly></textarea>
          </div>
        </div>
        <!-- プロフィールの３番目のブロック（スキル・経歴） -->
        <div class="third">
          <!-- 職種 -->
          <div class="profile_area">
            <div class="profile_area_title">
              <p class="profile_area_name"> 職種（３個まで選択可能） </p>
            </div>
            <div class="profile_area_content3">
              <div class="check_box_design">
                <table>
                  <tr class="cell_tb">
                    <td>
                      <input type="checkbox" id="check_2" name="occupation[]" value="3">
                      <label for="check_2" class="check_display">フロントエンドエンジニア</label>
                    </td>
                    <td>
                      <input type="checkbox" id="check_8" name="occupation[]" value="4">
                      <label for="check_8" class="check_display">バックエンドエンジニア</label>
                    </td>
                    <td>
                      <input type="checkbox" id="check_4" name="occupation[]" value="11">
                      <label for="check_4" class="check_display">データサイエンティスト</label>
                    </td>
                    <td>
                      <input type="checkbox" id="check_5" name="occupation[]" value="14">
                      <label for="check_5" class="check_display">CGデザイナー</label>
                    </td>
                  </tr>
                </table>
              </div>
              <!-- １行目 -->
              <div class="check_box_design">
                <table>
                  <tr class="cell_tb">
                    <td>
                      <input type="checkbox" id="check_10" name="occupation[]" value="10">
                      <label for="check_10" class="check_display">ゲーム開発エンジニア</label>
                    </td>
                    <td>
                      <input type="checkbox" id="check_7" name="occupation[]" value="18">
                      <label for="check_7" class="check_display">クリエイティブデザイナー</label>
                    </td>
                    <td>
                      <input type="checkbox" id="check_3" name="occupation[]" value="7">
                      <label for="check_3" class="check_display">機械学習エンジニア</label>
                    </td>
                    <td>
                      <input type="checkbox" id="check_9" name="occupation[]" value="8">
                      <label for="check_9" class="check_display">iOSエンジニア</label>
                    </td>
                  </tr>
                </table>
              </div>
              <!-- ２行目 -->
              <div class="check_box_design">
                <table>
                  <tr class="cell_tb">
                    <td>
                      <input type="checkbox" id="check_14" name="occupation[]" value="9">
                      <label for="check_14" class="check_display">Androidエンジニア</label>
                    </td>
                    <td>
                      <input type="checkbox" id="check_11" name="occupation[]" value="15">
                      <label for="check_11" class="check_display">ゲームデザイナー</label>
                    </td>
                    <td>
                      <input type="checkbox" id="check_18" name="occupation[]" value="6">
                      <label for="check_18" class="check_display">Dev Opsエンジニア</label>
                    </td>
                    <td>
                      <input type="checkbox" id="check_13" name="occupation[]" value="5">
                      <label for="check_13" class="check_display">インフラエンジニア</label>
                    </td>
                  </tr>
                </table>
              </div>
              <!-- ３行目 -->
              <div class="check_box_design">
                <table>
                  <tr class="cell_tb">
                    <td>
                      <input type="checkbox" id="check_12" name="occupation[]" value="21">
                      <label for="check_12" class="check_display">PM</label>
                    </td>
                    <td>
                      <input type="checkbox" id="check_15" name="occupation[]" value="12">
                      <label for="check_15" class="check_display">グラフィックデザイナー</label>
                    </td>
                    <td>
                      <input type="checkbox" id="check_16" name="occupation[]" value="16">
                      <label for="check_16" class="check_display">UI|UXデザイナー</label>
                    </td>
                    <td>
                      <input type="checkbox" id="check_17" name="occupation[]" value="19">
                      <label for="check_17" class="check_display">テクニカルディレクター</label>
                    </td>
                  </tr>
                </table>
              </div>
              <!-- ４行目 -->
              <div class="check_box_design">
                <table>
                  <tr class="cell_tb">
                    <td>
                      <input type="checkbox" id="check_23" name="occupation[]" value="22">
                      <label for="check_23" class="check_display">PO</label>
                    </td>
                    <td>
                      <input type="checkbox" id="check_22" name="occupation[]" value="20">
                      <label for="check_22" class="check_display">アートディレクター</label>
                    </td>
                    <td>
                      <input type="checkbox" id="check_20" name="occupation[]" value="13">
                      <label for="check_20" class="check_display">Webデザイナー</label>
                    </td>
                    <td>
                      <input type="checkbox" id="check_21" name="occupation[]" value="17">
                      <label for="check_21" class="check_display">プロダクトデザイナー</label>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
            <!-- 使用可能プログラミング言語 -->
            <div class="profile_area">
              <div class="profile_area_title">
                <p class="profile_area_name"> 使用可能プログラミング言語（6個まで選択可能） </p>
              </div>
              <div class="profile_area_content4">
                <!-- 1行目 -->
                <div class="check_box_design">
                  <table>
                    <tr class="cell_tb">
                      <td>
                        <input type="checkbox" id="check_ht" name="available_programming_language[]" value="3">
                        <label for="check_ht" class="check_display">HTML</label>
                      </td>
                      <td>
                        <input type="checkbox" id="check_cc" name="available_programming_language[]" value="7">
                        <label for="check_cc" class="check_display">C#</label>
                      </td>
                      <td>
                        <input type="checkbox" id="check_go" name="available_programming_language[]" value="11">
                        <label for="check_go" class="check_display">Go</label>
                      </td>
                      <td>
                        <input type="checkbox" id="check_kt" name="available_programming_language[]" value="15">
                        <label for="check_kt" class="check_display">Kotlin</label>
                      </td>
                    </tr>
                  </table>
                </div>
                <!-- 2行目 -->
                <div class="check_box_design">
                  <table>
                    <tr class="cell_tb">
                      <td>
                        <input type="checkbox" id="check_cs" name="available_programming_language[]" value="4">
                        <label for="check_cs" class="check_display">CSS</label>
                      </td>
                      <td>
                        <input type="checkbox" id="check_py" name="available_programming_language[]" value="8">
                        <label for="check_py" class="check_display">Python</label>
                      </td>
                      <td>
                        <input type="checkbox" id="check_sw" name="available_programming_language[]" value="12">
                        <label for="check_sw" class="check_display">Swift</label>
                      </td>
                      <td>
                        <input type="checkbox" id="check_jv" name="available_programming_language[]" value="5">
                        <label for="check_jv" class="check_display1">Java</label>
                      </td>
                    </tr>
                  </table>
                </div>
                <!-- 3行目 -->
                <div class="check_box_design">
                  <table>
                    <tr class="cell_tb">
                      <td>
                        <input type="checkbox" id="check_js" name="available_programming_language[]" value="9">
                        <label for="check_js" class="check_display1">JavaScript</label>
                      </td>
                      <td>
                        <input type="checkbox" id="check_ph" name="available_programming_language[]" value="13">
                        <label for="check_ph" class="check_display1">PHP</label>
                      </td>
                      <td>
                        <input type="checkbox" id="check_cp" name="available_programming_language[]" value="6">
                        <label for="check_cp" class="check_display2">C++</label>
                      </td>
                      <td>
                        <input type="checkbox" id="check_rb" name="available_programming_language[]" value="10">
                        <label for="check_rb" class="check_display2">Ruby</label>
                      </td>
                    </tr>
                  </table>
                </div>
                <!-- 4行目 -->
                <div class="check_box_design">
                  <table>
                    <tr class="cell_tb">
                      <td>
                        <input type="checkbox" id="check_ts" name="available_programming_language[]" value="14">
                        <label for="check_ts" class="check_display2">TypeScript</label>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!--その他のスキル -->
          <div class="profile_area">
            <div class="profile_area_title">
              <p class="profile_area_name"> その他のスキル </p>
            </div>
            <div class="profile_area_content">
              <textarea name="available_skill" id="available_skill" cols="62" rows="5" placeholder="（記載例）AWS構築・運用の経験あり。Adobe系のソフトで業務経験あり。等" maxlength='400' readonly></textarea>
            </div>
          </div>
          <!-- 来歴（学歴・職歴など） -->
          <div class="profile_area">
            <div class="profile_area_title">
              <p class="profile_area_name"> 来歴（学歴・職歴など） </p>
            </div>
            <div class="profile_area_content">
              <textarea name="history" id="history" cols="62" rows="5" placeholder="（例）20XX年 〇〇大学卒業 &#13;20XX年-20XX年 株式会社〇〇にて××を担当" maxlength='400' readonly></textarea>
            </div>
          </div>
          <!--  資格 -->
          <div class="profile_area">
            <div class="profile_area_title">
              <p class="profile_area_name"> 資格 </p>
            </div>
            <div class="profile_area_content">
              <textarea name="qualification" id="qualification" cols="62" rows="5" placeholder="（例）応用情報技術者（AP）、TOEIC 700点 等" maxlength='400' readonly></textarea>
            </div>
          </div>
          <!-- フリーコメント -->
          <div class="profile_area">
            <div class="profile_area_title">
              <p class="profile_area_name"> フリーコメント </p>
            </div>
            <div class="profile_area_content">
              <textarea name="free_space" id="free_space" cols="62" rows="5" placeholder="（例）〇〇の技術を持った方を探しています。〇〇の案件に興味あります。等" maxlength='400' readonly></textarea>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="button_area">
      <input type="submit" class="edit_button" value="メッセージを送る">
    </div>
  </main>
  <?php
  include('../parts/footer.php');
  ?>
  <script>
    // ----------------------------------------------
    // 年月のオプションを追加
    // ----------------------------------------------
    const year = document.getElementById('year');
    const month = document.getElementById('month');
    const birth_year = document.getElementById('birth_year');
    const birth_month = document.getElementById('birth_month');
    const birth_day = document.getElementById('birth_day');
    let date = new Date
    // 卒業年月エリアのセレクトに格納
    for (let i = 2000; i <= date.getFullYear() + 1; i++) {
      const option = document.createElement('option');
      option.value = i;
      option.textContent = i;
      year.appendChild(option);
    }
    for (let i = 1; i <= 12; i++) {
      const option = document.createElement('option');
      option.value = i;
      option.textContent = i;
      month.appendChild(option);
    }
    // 誕生日エリアのセレクト
    for (let i = 1900; i <= date.getFullYear() + 1; i++) {
      const option = document.createElement('option');
      option.value = i;
      option.textContent = i;
      birth_year.appendChild(option);
    }
    for (let i = 1; i <= 12; i++) {
      const option = document.createElement('option');
      option.value = i;
      option.textContent = i;
      birth_month.appendChild(option);
    }
    for (let i = 1; i <= 31; i++) {
      const option = document.createElement('option');
      option.value = i;
      option.textContent = i;
      birth_day.appendChild(option);
    }
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
    // ----------------------------------------------
    // json_dataの取得
    // ----------------------------------------------
    // 1.user_infoの取得
    const json1 = <?= $user_info ?>;
    const json1_str = JSON.stringify(json1);
    const user_info = JSON.parse(json1_str);
    console.log(user_info);

    // selectに該当のvalueがあった際の関数
    function select_tab(option, object) {
      // objectがundefinedでなければ
      if (object != undefined) {
        //HTMLCollectionをNodeList的に変換
        Array.from(option).forEach(option_child => {
          if (option_child.value == object) {
            option_child.selected = true;
          }
        })
      }
    }

    // inputに該当のvalueを挿入する関数
    function input_insert(input, object) {
      if (object != undefined) {
        input.value = object;
      }
    }

    // portfolio内のaタグとpタグを操作する関数
    function portfolio_ap(a, p, url, title) {
      if (title != undefined || url != undefined) {
        a.href = url;
        p.textContent = title;
      }
    }
    // 2.admission_areaのvalueを選択
    const admission_area = document.getElementById('admission_area').children;
    select_tab(admission_area, user_info.admission_area);
    // 3.admission_areaとadmission_periodのvalueを選択
    const course_name = document.getElementById('course_name').children;
    select_tab(course_name, user_info.course_name);
    const admission_period = document.getElementById('admission_period');
    input_insert(admission_period, user_info.admission_period);
    // 4.graduateのvalueを選択
    const select_year = document.getElementById('year').children;
    const select_month = document.getElementById('month').children;
    const graduate = user_info.graduation_date.split('-');
    select_tab(select_year, graduate[0]);
    select_tab(select_month, graduate[1]);
    // 5.iconのsrcを選択
    const icon_img = document.getElementById('img');
    const file_name = "../icon/"
    // アイコン画像をDBに登録していれば
    if (user_info.profile_image != undefined) {
      icon_img.src = file_name + user_info.profile_image;
    }
    //6.birthのvalueを選択
    const select_birth_year = document.getElementById('birth_year');
    const select_birth_month = document.getElementById('birth_month');
    const select_birth_day = document.getElementById('birth_day');
    const birth = user_info.birthday.split('-');
    select_tab(select_birth_year, birth[0]);
    select_tab(select_birth_month, birth[1]);
    select_tab(select_birth_day, birth[2]);
    //7.birthのvalueを選択
    const comment = document.getElementById('comment');
    input_insert(comment, user_info.comment);
    //8.blood_typeのvalueを選択
    const blood_type = document.getElementById('blood_type');
    select_tab(blood_type, user_info.blood_type);
    //9.residenceのvalueを選択
    const residence = document.getElementById('address');
    select_tab(residence, user_info.residence);
    //10.birthplaceのvalueを選択
    const birthplace = document.getElementById('from');
    select_tab(birthplace, user_info.birthplace);
    //11.annual_incomeのvalueを選択
    const annual_income = document.getElementById('annual_income');
    select_tab(annual_income, user_info.annual_income);
    //12.english_skillのvalueを選択
    const english_skill = document.getElementById('english_skill');
    select_tab(english_skill, user_info.english_skill);
    //12.english_skillのvalueを選択
    const personality = document.getElementById('personality');
    select_tab(personality, user_info.personality);
    //13.why_gsのvalueを選択
    const why_gs = document.getElementById('why_gs');
    input_insert(why_gs, user_info.why_gs);
    // 14.portfolioのDOM
    const portfolio_area_title1 = document.getElementById('portfolio_area_title1');
    const portfolio_area_url1 = document.getElementById('portfolio_area_url1');
    const portfolio_area_description1 = document.getElementById('portfolio_area_description1');
    portfolio_ap(portfolio_area_url1, portfolio_area_title1, user_info.portfolio_url1, user_info.portfolio_title1);
    input_insert(portfolio_area_description1, user_info.portfolio_comment1);
    const portfolio_area_title2 = document.getElementById('portfolio_area_title2');
    const portfolio_area_url2 = document.getElementById('portfolio_area_url2');
    const portfolio_area_description2 = document.getElementById('portfolio_area_description2');
    portfolio_ap(portfolio_area_url2, portfolio_area_title2, user_info.portfolio_url2, user_info.portfolio_title2);
    input_insert(portfolio_area_description2, user_info.portfolio_comment2);
    const portfolio_area_title3 = document.getElementById('portfolio_area_title3');
    const portfolio_area_url3 = document.getElementById('portfolio_area_url3');
    const portfolio_area_description3 = document.getElementById('portfolio_area_description3');
    portfolio_ap(portfolio_area_url3, portfolio_area_title3, user_info.portfolio_url3, user_info.portfolio_title3);
    input_insert(portfolio_area_description3, user_info.portfolio_comment3);
    // 15.available_skillのvalueを選択
    const available_skill = document.getElementById('available_skill');
    input_insert(available_skill, user_info.available_skill);
    // 16.historyのvalueを選択
    const history = document.getElementById('history');
    input_insert(history, user_info.history);
    // 17.qualificationのvalueを選択
    const qualification = document.getElementById('qualification');
    input_insert(qualification, user_info.qualification);
    // 18.free_spaceのvalueを選択
    const free_space = document.getElementById('free_space');
    input_insert(free_space, user_info.free_space);
    // 19.nameのtextContent挿入
    const name = document.getElementById('name');
    name.textContent = user_info.name;

    // ----------------------------------------------
    // json_dataの取得
    // ----------------------------------------------
    // 1.user_occupationの取得
    const json2 = <?= $user_occupation ?>;
    const json2_str = JSON.stringify(json2);
    const user_occupation = JSON.parse(json2_str);
    const occupation = document.querySelectorAll('input[name="occupation[]"]');

    // 2.チェックボックスのDOM操作
    if (user_occupation != undefined) {
      user_occupation.forEach(target => {
        occupation.forEach(html_oc => {
          if (target.occupation_id == html_oc.value) {
            html_oc.checked = true;
          }
        })
      })
    }

    // ----------------------------------------------
    // json_dataの取得
    // ----------------------------------------------
    // 1.user_langの取得
    const json3 = <?= $user_lang ?>;
    const json3_str = JSON.stringify(json3);
    const user_lang = JSON.parse(json3_str);
    const lang = document.querySelectorAll('input[name="available_programming_language[]"]');

    // 2.チェックボックスのDOM操作
    if (user_lang != undefined) {
      user_lang.forEach(target => {
        lang.forEach(html_la => {
          if (target.available_programming_language_id == html_la.value) {
            html_la.checked = true;
          }
        })
      })
    }

    // ----------------------------------------------
    // checkboxの操作
    // ----------------------------------------------
    // occupationが変化する度に監視
    occupation.forEach(target => {
      target.addEventListener('change', (e) => {
        const ck = document.querySelectorAll('input[name="occupation[]"]:checked');
        if (ck.length >= 4) {
          alert('選択できる項目は3つまでです。');
          e.target.checked = false;
        }
      })
    })
    //langが変化する度に監視
    lang.forEach(target => {
      target.addEventListener('change', (e) => {
        const ck = document.querySelectorAll('input[name="available_programming_language[]"]:checked');
        if (ck.length >= 7) {
          alert('選択できる項目は6つまでです。');
          e.target.checked = false;
        }
      })
    })
  </script>

</body>

</html>
