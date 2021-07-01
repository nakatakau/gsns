<?php
session_start();

include_once __DIR__ . "/../app/funcs.php";
sschk();
$my_id = $_SESSION["my_id"];
$destination_user_id = isset($_POST['destination_user_id']) ? $_POST['destination_user_id'] : NULL;
$destination_user_id = 2;
// v($my_id);
// v($destination_user_id);

// DB接続
$pdo = db_conn();


if ($destination_user_id !== NULL) {
  $sql = "
INSERT INTO
  messages (text,user_id,destination_user_id,created_at)
VALUES
 ('',$my_id,$destination_user_id,sysdate());";
  //  v($sql);
  $stmt = $pdo->prepare($sql);
  // $stmt->bindValue(':my_id', $my_id, PDO::PARAM_STR);
  $status = $stmt->execute();
  //SQL実行時にエラーがある場合STOP
  if ($status == false) {
    sql_error($stmt);
  }
}
$sql = "
  SELECT
    messages.user_id,destination_user_id,name,admission_area,course_name,admission_period,profile_image,max(created_at)
  FROM
    messages
  JOIN
    users on messages.destination_user_id=users.user_id
  WHERE
    messages.user_id=$my_id
  GROUP BY
    destination_user_id
  ORDER BY
    max(created_at) DESC";
// v($sql);
$stmt = $pdo->prepare($sql);
// $stmt->bindValue(':my_id', $my_id, PDO::PARAM_STR);
$status = $stmt->execute();
//SQL実行時にエラーがある場合STOP
if ($status == false) {
  sql_error($stmt);
}
$destination_users = $stmt->fetchAll(PDO::FETCH_ASSOC);
// v($destination_users);
$result_json_destination_users = json_encode($destination_users);
// v($result_json_destination_users);


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
  <link rel="stylesheet" href="../css/message.css">
  <!-- line-awesome -->
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
  <!-- アイコン設定 -->
  <link rel="shortcut icon" href="../icon/icon_48.png" />
  <title>メッセージ</title>
  <!-- featherアイコンの読み込み -->
  <script src="https://unpkg.com/feather-icons"></script>
</head>

<body>
  <?php
  include("../parts/header.php");
  ?>
  <div id="display" class="oll">

    <!-- ここからがサイドバー -->
    <div id="side_bar" class="side_bar">

      <!-- /* -------------------------------------------------- */ -->
      <!-- ユーザーのカード -->
      <!-- /* -------------------------------------------------- */ -->

    </div>



    <main id="main">
      <!-- <form action="" method="POST"> -->
      <!-- ここにチャットの内容が入る -->
      <div class="chat-area" id="chat-area">
        <!-- text -->
        <!-- text -->
        <!-- text -->
        <!-- text -->
        <!-- text -->
        <!-- text -->
        <!-- text -->
      </div>

      <!-- <div class="message_box">
      <div class="message-person">
        <input id="me" type="radio" value="me" name="person" checked="checked">
        <label for="me">自分</label>
        <input id="you" type="radio" value="you" name="person">
        <label for="you">相手</label>
      </div> -->

      <div class="message-area">
        <div class="message-area-text">
          <textarea id="text" placeholder="メッセージを入力してください。"></textarea>
        </div>
        <div class="btn_chat">
          <button id="send" class="disabled-button">
            <div data-feather="send"></div>
          </button>
        </div>
      </div>
  </div>
  </form>
  </main>

  </div>

  <?php
  include("../parts/footer.php");
  ?>
  <!-- axios -->
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script>
    //featherアイコン
    feather.replace();
    $(function() {
      // ENTERで送信
      // $('.message-area-text').on('keypress', (e) => {
      //   if (e.which === 13) {
      //     addChat();
      //     return false;
      //   }
      // })
      // // 送信ボタンで送信
      // $('#send').on('click', function() {
      //   addChat();
      // })
      // 送信処理
      // function addChat() {
      //   const messageText = $('#text').val()
      //   if (messageText === '') {
      //     return false;
      //   }
      //   const chatArea = $('.chat-area')
      //   const messageContainer = $('<div></div>').addClass('message-container')
      //   // 自分 か 相手どちらにメッセージを送る予定かを取得
      //   const messagePerson = $('input[name="person"]:checked').val()
      //   if (messagePerson === 'me') {
      //     messageContainer.addClass('message-container-me')
      //   } else {
      //     messageContainer.addClass('message-container-you')
      //   }
      //   // チャットメッセージ用の装飾をしたクラスを当てたpタグを追加
      //   const message = $('<p></p>').addClass('chat-message').text(messageText)
      //   //時間を表示
      //   const nowDate = new Date()
      //   const hour = (nowDate.getHours() >= 10) ? nowDate.getHours() : '0' + nowDate.getHours()
      //   const minutes = (nowDate.getMinutes() >= 10) ? nowDate.getMinutes() : '0' + nowDate.getMinutes()
      //   const nowTime = hour + ':' + minutes
      //   const sendTime = $('<p></p>').text(nowTime).addClass('chat-time')
      //   messageContainer.append(sendTime).append(message)
      //   chatArea.append(messageContainer)
      //   // 常に最下部までスクロールしておく
      //   chatArea.scrollTop(chatArea[0].scrollHeight)
      //   $('#text').val('')
      // }
    });

    // ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
    // サイドバーの実装
    // ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
    const area = [
      "",
      "",
      "その他",
      "東京",
      "福岡",
      "北海道"
    ]
    const course = [
      "",
      "",
      "その他",
      "LAB",
      "DEV",
      "BIZ"
    ]
    // message
    let message = null;
    let destination_user_id = null;
    let icon = null;
    // jsonデータの取得
    const json1 = <?= $result_json_destination_users ?>;
    const json1_str = JSON.stringify(json1);
    const message_user = JSON.parse(json1_str);
    // side_bar
    const side_bar = document.getElementById('side_bar');
    for (let i = 0; i < message_user.length; i++) {
      // user_card
      const user_card = document.createElement('div');
      user_card.className = "user_card";
      side_bar.appendChild(user_card);
      // main_con
      const main_con = document.createElement('div');
      main_con.className = "main_con";
      user_card.appendChild(main_con);
      // prof_a
      const prof_a = document.createElement('div');
      prof_a.className = "prof_a";
      main_con.appendChild(prof_a);
      // prof_img
      const prof_img = document.createElement('img');
      prof_img.className = "prof_img";
      if (message_user[i].profile_image != undefined || null || "") {
        prof_img.src = "../icon/" + message_user[i].profile_image;
      } else {
        prof_img.src = "../img/default_icon.img";
      }
      prof_a.appendChild(prof_img);
      // prof_b
      const prof_b = document.createElement('div');
      prof_b.className = "prof_b";
      main_con.appendChild(prof_b);
      // name
      const h3 = document.createElement('h3');
      h3.className = "name";
      h3.textContent = message_user[i].name;
      prof_b.appendChild(h3);
      // user_name
      const a = document.createElement('a');
      a.className = "user_name";
      a.textContent = area[Number(message_user[i].admission_area)] + "/" + course[Number(message_user[i].course_name)] + message_user[i].admission_period + "期";
      prof_b.appendChild(a);
      user_card.addEventListener('click', () => {
        destination_user_id = message_user[i].destination_user_id;
        console.log(destination_user_id);
        const data = {
          destination_user_id: message_user[i].destination_user_id
        }
        axios.get('../app/messages_return.php', {
          params: data
        }).then(function(response) {
          const msg = response.data;
          const msg_str = JSON.stringify(msg);
          message = JSON.parse(msg_str);
          add_chat_all(message);
        }).catch(function(error) {
          alert("エラー:" + error);
        })
      })
    }
    // ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
    // テキストメッセージ
    // ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
    const send = document.getElementById('send');
    send.addEventListener('click', () => {
      if (destination_user_id != null) {
        const messageText = document.getElementById('text');
        if (!(messageText.value === "")) {
          const data = {
            destination_user_id: destination_user_id,
            message: messageText.value
          }
          axios.get("../app/message_create.php", {
            params: data
          }).then(function(response) {
            const message_json = response.data;
            console.log(message_json);
            const message_json1 = JSON.stringify(message_json);
            const new_message = JSON.parse(message_json1);
            // console.log(new_message);
            add_chat(new_message);
          })
        }
      } else {
        alert("送信先のユーザーを選択してください。")
      }
    })
    // ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
    // messageを送信する関数
    // ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
    function add_chat_all(message) {
      const chatArea = $('.chat-area');
      const chatArea_id = document.getElementById('chat-area');
      while (chatArea_id.firstChild) {
        chatArea_id.removeChild(chatArea_id.firstChild);
      }
      for (let i = 0; i < message.length; i++) {
        const messageText = document.getElementById('text');
        messageText.value = message[i].text;
        if (messageText.value != '' || null || undefined) {
          const messageContainer = $('<div></div>').addClass('message-container')
          // 自分 か 相手どちらにメッセージを送る予定かを取得
          if (message[i].user_id == destination_user_id) {
            messageContainer.addClass('message-container-you')
          } else {
            messageContainer.addClass('message-container-me')
          }
          // チャットメッセージ用の装飾をしたクラスを当てたpタグを追加
          const message_area = $('<p></p>').addClass('chat-message').text(messageText.value)
          //時間を表示
          const date_time = message[i].created_at;
          const date_array = date_time.split(" ");
          const time_array = date_array[1].split(":");
          const hour = time_array[0];
          const minutes = time_array[1];
          const nowTime = hour + ':' + minutes
          const sendTime = $('<p></p>').text(nowTime).addClass('chat-time')
          messageContainer.append(sendTime).append(message_area)
          chatArea.append(messageContainer)
          // 常に最下部までスクロールしておく
          chatArea.scrollTop(chatArea[0].scrollHeight)
          $('#text').val('')
        }
      }
    }

    function add_chat(message) {
      const chatArea = $('.chat-area');
      for (let i = 0; i < message.length; i++) {
        const messageText = document.getElementById('text');
        messageText.value = message[i].text;
        if (messageText.value != '' || null || undefined) {
          const messageContainer = $('<div></div>').addClass('message-container')
          // 自分 か 相手どちらにメッセージを送る予定かを取得
          messageContainer.addClass('message-container-me')
          // チャットメッセージ用の装飾をしたクラスを当てたpタグを追加
          const message_area = $('<p></p>').addClass('chat-message').text(messageText.value)
          //時間を表示
          const date_time = message[i].created_at;
          const date_array = date_time.split(" ");
          const time_array = date_array[1].split(":");
          const hour = time_array[0];
          const minutes = time_array[1];
          const nowTime = hour + ':' + minutes
          const sendTime = $('<p></p>').text(nowTime).addClass('chat-time')
          messageContainer.append(sendTime).append(message_area)
          chatArea.append(messageContainer)
          // 常に最下部までスクロールしておく
          chatArea.scrollTop(chatArea[0].scrollHeight)
          $('#text').val('')
        }
      }
    }
  </script>
</body>

</html>
