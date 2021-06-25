<!-- コメント -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSSを入れる -->
  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" href="../css/common.css">
  <link rel="stylesheet" href="../css/index.css">
  <title>indexページ</title>
  <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>

<?php
include("../parts/header.php");
?>

<main>
<div class="main">

<!-- ///////////////////ここから検索カード////////////////////// -->

  <form action="#" post="#" class="input_form">
    <div class="display_card_first">

      <!-- -----職種選択----- -->
      <div class="my_sentaku">
        <h1 class="#">職種</h1>
        <div class="tb_flex">

          <div class="check_box_design">
            <table>
            <tr class="cell_tb">
            <td>
            <input type="checkbox" id="check_1" name="occupation" value="3">
            <label for="check_1" class="check_display">フロントエンドエンジニア</label>
            </td>
            </tr>
            <tr class="cell_tb">
            <td>
            <input type="checkbox" id="check_2" name="occupation" value="7">
            <label for="check_2" class="check_display">機械学習エンジニア</label>
            </td>
            </tr>
            <tr class="cell_tb">
            <td>
            <input type="checkbox" id="check_3" name="occupation" value="11">
            <label for="check_3" class="check_display">データサイエンティスト</label>
            </td>
            </tr>
            <tr class="cell_tb">
            <td>
            <input type="checkbox" id="check_4" name="15">
            <label for="check_4" class="check_display">ゲームデザイナー</label>
            </td>
            </tr>
            <tr class="cell_tb">
            <td>
            <input type="checkbox" id="check_5" name="19">
            <label for="check_5" class="check_display">テクニカルディレクター</label>
            </td>
            </tr>
            </table>
          </div>

          <div class="check_box_design">
            <table>
            <tr class="cell_tb">
            <td>
            <input type="checkbox" id="check_6" name="4">
            <label for="check_6" class="check_display">バックエンドエンジニア</label>
            </td>
            </tr>
            <tr class="cell_tb">
            <td>
            <input type="checkbox" id="check_7" name="8">
            <label for="check_7" class="check_display">iOSエンジニア</label>
            </td>
            </tr>
            <tr class="cell_tb">
            <td>
            <input type="checkbox" id="check_8" name="12">
            <label for="check_8 class="check_display">グラフィックデザイナー</label>
            </td>
            </tr>
            <tr class="cell_tb">
            <td>
            <input type="checkbox" id="check_9" name="16">
            <label for="check_9" class="check_display">UI|UXデザイナー</label>
            </td>
            </tr>
            <tr class="cell_tb">
            <td>
            <input type="checkbox" id="check_10" name="20">
            <label for="check_10" class="check_display">アートディレクター</label>
            </td>
            </tr>
            </table>
          </div>

          <div class="check_box_design">
            <table>
            <tr class="cell_tb">
            <td>
            <input type="checkbox" id="check_11" name="5">
            <label for="check_11" class="check_display">インフラエンジニア</label>
            </td>
            </tr>
            <tr class="cell_tb">
            <td>
            <input type="checkbox" id="check_12" name="9">
            <label for="check_12" class="check_display">Androidエンジニア</label>
            </td>
            </tr>
            <tr class="cell_tb">
            <td>
            <input type="checkbox" id="check_13" name="13">
            <label for="check_13" class="check_display">Webデザイナー</label>
            </td>
            </tr>
            <tr class="cell_tb">
            <td>
            <input type="checkbox" id="check_14" name="17">
            <label for="check_14" class="check_display">プロダクトデザイナー</label>
            </td>
            </tr>
            <tr class="cell_tb">
            <td>
            <input type="checkbox" id="check_15" name="21">
            <label for="check_15" class="check_display">PM</label>
            </td>
            </tr>
            </table>
          </div>

          <div class="check_box_design">
            <table>
            <tr class="cell_tb">
            <td>
            <input type="checkbox" id="check_16" name="6">
            <label for="check_16" class="check_display">Dev Opsエンジニア</label>
            </td>
            </tr>
            <tr class="cell_tb">
            <td>
            <input type="checkbox" id="check_17" name="10">
            <label for="check_17" class="check_display">ゲーム開発エンジニア</label>
            </td>
            </tr>
            <tr class="cell_tb">
            <td>
            <input type="checkbox" id="check_18" name="14">
            <label for="check_18" class="check_display">CGデザイナー</label>
            </td>
            </tr>
            <tr class="cell_tb">
            <td>
            <input type="checkbox" id="check_19" name="18">
            <label for="check_19" class="check_display">クリエイティブディレクター</label>
            </td>
            </tr>
            <tr class="cell_tb">
            <td>
            <input type="checkbox" id="check_20" name="22">
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
      <div class="tb_flex">

        <div class="check_box_design">
          <table>
            <tr class="cell_tb">
            <td>
            <input type="checkbox" id="check_ht" name="">
            <label for="check_ht" class="check_display">HTML</label>
            </td>
            </tr>
            <tr class="cell_tb">
            <td>
            <input type="checkbox" id="check_cc" name="">
            <label for="check_cc" class="check_display">C#</label>
            </td>
            </tr>
            <tr class="cell_tb">
            <td>
            <input type="checkbox" id="check_go" name="">
            <label for="check_go" class="check_display">Go</label>
            </td>
            </tr>
            <tr class="cell_tb">
            <td>
            <input type="checkbox" id="check_kt" name="">
            <label for="check_kt" class="check_display">Kotlin</label>
            </td>
            </tr>
          </table>
        </div>

        <div class="check_box_design">
          <table>
            <tr class="cell_tb">
            <td>
            <input type="checkbox" id="check_cs" name="">
            <label for="check_cs" class="check_display">CSS</label>
            </td>
            </tr>
            <tr class="cell_tb">
            <td>
            <input type="checkbox" id="check_py" name="">
            <label for="check_py" class="check_display">Python</label>
            </td>
            </tr>
            <tr class="cell_tb">
            <td>
            <input type="checkbox" id="check_sw" name="">
            <label for="check_sw" class="check_display">Swift</label>
            </td>
            </tr>
          </table>
        </div>

        <div class="check_box_design">
          <table>
            <tr class="cell_tb">
            <td>
            <input type="checkbox" id="check_jv" name="">
            <label for="check_jv" class="check_display1">Java</label>
            </td>
            </tr>
            <tr class="cell_tb">
            <td>
            <input type="checkbox" id="check_js" name="">
            <label for="check_js" class="check_display1">JavaScript</label>
            </td>
            </tr>
            <tr class="cell_tb">
            <td>
            <input type="checkbox" id="check_ph" name="">
            <label for="check_ph" class="check_display1">PHP</label>
            </td>
            </tr>
          </table>
        </div>

        <div class="check_box_design">
          <table>
            <tr class="cell_tb">
            <td>
            <input type="checkbox" id="check_cp" name="">
            <label for="check_cp" class="check_display2">C++</label>
            </td>
            </tr>
            <tr class="cell_tb">
            <td>
            <input type="checkbox" id="check_rb" name="">
            <label for="check_rb" class="check_display2">Ruby</label>
            </td>
            </tr>
            <tr class="cell_tb">
            <td>
            <input type="checkbox" id="check_ts" name="">
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
          <input type="checkbox" class="portfolio_sentaku" id="portfolio_sentaku1" name="">
          <label for="portfolio_sentaku1">ポートフォリオあり</label>
        </div>

        <div class="check_box_design sonota">
          <input type="checkbox" class="zaigakusei_sentaku" id="zaigakusei_sentaku1" name="">
          <label for="zaigakusei_sentaku1">在学生のみ</label>
        </div>

        <div class="check_box_design sonota">
          <input type="checkbox" class="sotugyou_sentaku" id="sotugyou_sentaku1" name="">
          <label for="sotugyou_sentaku1">卒業生のみ</label>
        </div>
      </div>

      <!-- -----ステータスの選択----- -->
      <div class="kihon_info">

        <div class="resident">
          <label for="resident">居住地</label>
          <select id="resident1" type="text" name="">
            <option selected></option>
            <option value="">hoge</option>
            <option value="">hoge</option>
          </select>
        </div>

        <div class="birthplace">
          <label class="labtg" for="resident">出身地</label>
          <select id="birthplace" type="text" name="">
            <option selected></option>
            <option value="">hoge</option>
            <option value="">hoge</option>
          </select>
        </div>

        <div class="blood_type">
          <label class="labtg" for="blood_type">血液型</label>
          <select id="blood_type1" type="text" name="">
            <option selected></option>
            <option value="1">未回答</option>
            <option value="2">不明</option>
            <option value="3">A型</option>
            <option value="4">B型</option>
            <option value="5">AB型</option>
            <option value="6">O型</option>
          </select>
        </div>

        <div class="personality">
          <label class="labtg" for="personality">性格</label>
          <select id="personality1" type="text" name="">
            <option selected></option>
            <option value="">おだやか</option>
            <option value="">頼りにされる</option>
            <option value="">元気</option>
          </select>
        </div>

        <div class="annual">
          <label class="labtg" for="annual">年収</label>
          <select id="annual1" type="text" name="">
            <option selected></option>
            <option value="">〜200万円</option>
            <option value="">200〜400万円</option>
            <option value="">400〜600万円</option>
            <option value="">600〜800万円</option>
            <option value="">800〜1000万円</option>
            <option value="">1000〜1200万円</option>
            <option value="">1200〜1500万円</option>
            <option value="">1500万円〜</option>
          </select>
        </div>

        <div class="english">
          <label class="labtg" for="english">英語力</label>
          <select id="english1" type="text" name="">
            <option selected></option>
            <option value="">hoge</option>
            <option value="">hoge</option>
            <option value="">hoge</option>
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
          <p class="mail_icon" data-feather="mail"></p>
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
          <p class="mail_icon" data-feather="mail"></p>
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
          <p class="mail_icon" data-feather="mail"></p>
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

<script>

  //featherアイコン
  feather.replace();

</script>
</body>
</html>
