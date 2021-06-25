<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSSの取り込み -->
  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" href="../css/common.css">
  <link rel="stylesheet" href="../css/profile.css">
  <!-- line-awesome -->
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
  <title>my_profile</title>
  <script src="https://unpkg.com/feather-icons"></script>
</head>

<body>
  <?php
  include('../parts/header.php');
  ?>
  <main>
    <form action="">
      <div class="profile_flex">
        <!-- プロフィールの１番目のブロック（アイコンとメッセージ） -->
        <div class="left">
          <div class="icon">
            <div class="gs_year">
              <p>地域</p>
              <select id="" name="admission_area">
                <option value="1"></option>
                <option value="3">東京</option>
                <option value="4">福岡</option>
                <option value="5">北海道</option>
                <option value="2">その他</option>
              </select>
            </div>
            <div class="gs_course">
              <p>コース</p>
              <select id="" name="course_name">
                <option value="1"></option>
                <option value="3">LAB</option>
                <option value="4">DEV</option>
                <option value="5">BIZ</option>
                <option value="2">その他</option>
              </select>
              <input type="text" pattern="\d{2}" name="" maxlength="2" name="admission_period">
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
                <label for="profile_image" class="icon_select">
                  <input type="file" id="profile_image" name="profile_image" accept=".jpg,.png,.jpeg" style="display: none">
                  <i class="las la-camera" id="icon_select"></i>
                </label>
              </div>
            </div>
            <div class="icon_name_area">
              <p class="name">名前</p>
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
            <textarea name="" id="" cols="30" rows="3" placeholder="一言お願いします。" maxlength='42' name="comment"></textarea>
          </div>
          <div class="other">
            <table class="other_table">
              <tr class="cell">
                <td class="cell_left">血液型</td>
                <td class="cell_right">
                  <select name="blood_type" id="">
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
                  <select name="annual_income" id="">
                    <option value="1"></option>
                    <option value="3">200万 - 399万</option>
                    <option value="4">400万 - 599万</option>
                    <option value="5">600万 - 799万</option>
                    <option value="6">800万 - 999万</option>
                    <option value="7">1000万 -</option>
                    <option value="2">その他</option>
                  </select>
                </td>
              </tr>
              <tr class="cell">
                <td class="cell_left">英語スキル</td>
                <td class="cell_right">
                  <select name="english_skill" id="">
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
                  <select name="personality" id="">
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
              <textarea name="why_gs" id="" cols="62" rows="9" placeholder="背景・経緯などを教えてください" class="profile_description" maxlength='400'></textarea>
            </div>
          </div>
          <!-- プロフィールの２番目のブロック（ポートフォリオ） -->
          <div class="second">
            <p class="portfolio_title">ポートフォリオ・作品（３点まで）</p>
            <!-- １つ目のポートフォリオ -->
            <div class="portfolio_area" id="portfolio_area_1">
              <input type="text" name="portfolio_title1" class="portfolio_area_title" id="portfolio_area_title1" placeholder="タイトルを入力">
              <input type="text" name="portfolio_url1" class="portfolio_area_url" id="portfolio_area_url1" placeholder="URLを入力">
              <textarea name="portfolio_comment1" id="" cols="50" rows="4" class="portfolio_area_description" id="portfolio_area_description1" placeholder="説明"></textarea>
              <!-- <div class="portfolio_area_content" id="portfolio_area_content1">
            <img src="" alt="" class="portfolio_area_content_img" id="portfolio_area_content_img1">
          </div> -->
            </div>
            <!-- ２つ目のポートフォリオ -->
            <div class="portfolio_area" id="portfolio_area_2">
              <input type="text" name="portfolio_title2" class="portfolio_area_title" id="portfolio_area_title2" placeholder="タイトルを入力">
              <input type="text" name="portfolio_url2" class="portfolio_area_url" id="portfolio_area_url2" placeholder="URLを入力">
              <textarea name="portfolio_comment2" id="" cols="50" rows="4" class="portfolio_area_description" id="portfolio_area_description2" placeholder="説明"></textarea>
              <!-- <div class="portfolio_area_content" id="portfolio_area_content2">
            <img src="" alt="" class="portfolio_area_content_img" id="portfolio_area_content_img2">
          </div> -->
            </div>
            <!-- ３つ目のポートフォリオ -->
            <div class="portfolio_area" id="portfolio_area_3">
              <input type="text" name="portfolio_title3" class="portfolio_area_title" id="portfolio_area_title3" placeholder="タイトルを入力">
              <input type="text" name="portfolio_url3" class="portfolio_area_url" id="portfolio_area_url3" placeholder="URLを入力">
              <textarea name="portfolio_comment3" id="" cols="50" rows="4" class="portfolio_area_description" id="portfolio_area_description3" placeholder="説明"></textarea>
              <!-- <div class="portfolio_area_content" id="portfolio_area_content3">
            <img src="" alt="" class="portfolio_area_content_img" id="portfolio_area_content_img3">
          </div> -->
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
                        <input type="checkbox" id="check_2" name="occupation" value="3">
                        <label for="check_2" class="check_display">フロントエンドエンジニア</label>
                      </td>
                      <td>
                        <input type="checkbox" id="check_8" name="occupation" value="4">
                        <label for="check_8" class="check_display">バックエンドエンジニア</label>
                      </td>
                      <td>
                        <input type="checkbox" id="check_4" name="occupation" value="11">
                        <label for="check_4" class="check_display">データサイエンティスト</label>
                      </td>
                      <td>
                        <input type="checkbox" id="check_5" name="occupation" value="14">
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
                        <input type="checkbox" id="check_10" name="occupation" value="10">
                        <label for="check_10" class="check_display">ゲーム開発エンジニア</label>
                      </td>
                      <td>
                        <input type="checkbox" id="check_7" name="occupation" value="18">
                        <label for="check_7" class="check_display">クリエイティブデザイナー</label>
                      </td>
                      <td>
                        <input type="checkbox" id="check_3" name="occupation" value="7">
                        <label for="check_3" class="check_display">機械学習エンジニア</label>
                      </td>
                      <td>
                        <input type="checkbox" id="check_9" name="occupation" value="8">
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
                        <input type="checkbox" id="check_14" name="occupation" value="9">
                        <label for="check_14" class="check_display">Androidエンジニア</label>
                      </td>
                      <td>
                        <input type="checkbox" id="check_11" name="occupation" value="15">
                        <label for="check_11" class="check_display">ゲームデザイナー</label>
                      </td>
                      <td>
                        <input type="checkbox" id="check_18" name="occupation" value="6">
                        <label for="check_18" class="check_display">Dev Opsエンジニア</label>
                      </td>
                      <td>
                        <input type="checkbox" id="check_13" name="occupation" value="5">
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
                        <input type="checkbox" id="check_12" name="occupation" value="21">
                        <label for="check_12" class="check_display">PM</label>
                      </td>
                      <td>
                        <input type="checkbox" id="check_15" name="occupation" value="12">
                        <label for="check_15" class="check_display">グラフィックデザイナー</label>
                      </td>
                      <td>
                        <input type="checkbox" id="check_16" name="occupation" value="16">
                        <label for="check_16" class="check_display">UI|UXデザイナー</label>
                      </td>
                      <td>
                        <input type="checkbox" id="check_17" name="occupation" value="19">
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
                        <input type="checkbox" id="check_23" name="occupation" value="22">
                        <label for="check_23" class="check_display">PO</label>
                      </td>
                      <td>
                        <input type="checkbox" id="check_22" name="occupation" value="20">
                        <label for="check_22" class="check_display">アートディレクター</label>
                      </td>
                      <td>
                        <input type="checkbox" id="check_20" name="occupation" value="13">
                        <label for="check_20" class="check_display">Webデザイナー</label>
                      </td>
                      <td>
                        <input type="checkbox" id="check_21" name="occupation" value="17">
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
                          <input type="checkbox" id="check_ht" name="available_programming_language" value="3">
                          <label for="check_ht" class="check_display">HTML</label>
                        </td>
                        <td>
                          <input type="checkbox" id="check_cc" name="available_programming_language" value="7">
                          <label for="check_cc" class="check_display">C#</label>
                        </td>
                        <td>
                          <input type="checkbox" id="check_go" name="available_programming_language" value="11">
                          <label for="check_go" class="check_display">Go</label>
                        </td>
                        <td>
                          <input type="checkbox" id="check_kt" name="available_programming_language" value="15">
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
                          <input type="checkbox" id="check_cs" name="available_programming_language" value="4">
                          <label for="check_cs" class="check_display">CSS</label>
                        </td>
                        <td>
                          <input type="checkbox" id="check_py" name="available_programming_language" value="8">
                          <label for="check_py" class="check_display">Python</label>
                        </td>
                        <td>
                          <input type="checkbox" id="check_sw" name="available_programming_language" value="12">
                          <label for="check_sw" class="check_display">Swift</label>
                        </td>
                        <td>
                          <input type="checkbox" id="check_jv" name="available_programming_language" value="5">
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
                          <input type="checkbox" id="check_js" name="available_programming_language" value="9">
                          <label for="check_js" class="check_display1">JavaScript</label>
                        </td>
                        <td>
                          <input type="checkbox" id="check_ph" name="available_programming_language" value="13">
                          <label for="check_ph" class="check_display1">PHP</label>
                        </td>
                        <td>
                          <input type="checkbox" id="check_cp" name="available_programming_language" value="6">
                          <label for="check_cp" class="check_display2">C++</label>
                        </td>
                        <td>
                          <input type="checkbox" id="check_rb" name="available_programming_language" value="10">
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
                          <input type="checkbox" id="check_ts" name="available_programming_language" value="14">
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
                <textarea name="available_skill" id="" cols="62" rows="9" placeholder="（記載例）AWS構築・運用の経験あり。Adobe系のソフトで業務経験あり。等" maxlength='400'></textarea>
              </div>
            </div>
            <!-- 来歴（学歴・職歴など） -->
            <div class="profile_area">
              <div class="profile_area_title">
                <p class="profile_area_name"> 来歴（学歴・職歴など） </p>
              </div>
              <div class="profile_area_content">
                <textarea name="history" id="" cols="62" rows="9" placeholder="（例）20XX年 〇〇大学卒業 &#13;20XX年-20XX年 株式会社〇〇にて××を担当" maxlength='400'></textarea>
              </div>
            </div>
            <!--  資格 -->
            <div class="profile_area">
              <div class="profile_area_title">
                <p class="profile_area_name"> 資格 </p>
              </div>
              <div class="profile_area_content">
                <textarea name="qualification" id="" cols="62" rows="9" placeholder="（例）応用情報技術者（AP）、TOEIC 700点 等" maxlength='400'></textarea>
              </div>
            </div>
            <!-- フリーコメント -->
            <div class="profile_area">
              <div class="profile_area_title">
                <p class="profile_area_name"> フリーコメント </p>
              </div>
              <div class="profile_area_content">
                <textarea name="free_space" id="" cols="62" rows="9" placeholder="（例）〇〇の技術を持った方を探しています。〇〇の案件に興味あります。等" maxlength='400'></textarea>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="button_area">
        <input type="submit" class="edit_button" value="保存する">
      </div>
    </form>
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
    // アイコン画像のプレビューを表示
    // ----------------------------------------------
    // 1.input[type=file]とアイコン画像のDOM
    const profile_image = document.getElementById('profile_image');
    const img = document.getElementById('img');

    // プレビュー関数
    function imgPreview(file) {
      // FileReaderオブジェクトを作成
      const reader = new FileReader();
      // URLとして読み込まれたときに実行する処理
      reader.onload = function(e) {
        const img_url = e.target.result;
        img.src = img_url;
      }
      // いざファイルをURLとして読み込む
      reader.readAsDataURL(file);
    }

    // 2.fileデータの取得
    const file = () => {
      const file_data = profile_image.files;
      imgPreview(file_data[0]);
    }

    // イベントを追加
    profile_image.addEventListener('change', file);
  </script>
</body>

</html>
