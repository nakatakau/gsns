<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- CSS only -->
  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" href="../css/common.css">
  <link rel="stylesheet" href="../css/message.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <title>Document</title>
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

    <div class="user_card">
      <a href="../view/index.php">
        <div class="main_con">
          <div class="prof_a">
            <img class="prof_img" src="../img/test1.png" alt="">
          </div>
          <div class="prof_b">
            <h3>かくまあり</h3>
            <a class="user_name">東京LAB11</a>
          </div>
        </div>
      </a>
    </div>
    <div class="user_card">
      <a href="../view/index.php">
        <div class="main_con">
          <div class="prof_a">
            <img class="prof_img" src="../img/test1.png" alt="">
          </div>
          <div class="prof_b">
            <h3>かくまあり</h3>
            <a class="user_name">東京LAB11</a>
          </div>
        </div>
      </a>
    </div>
    <div class="user_card">
      <a href="../view/index.php">
        <div class="main_con">
          <div class="prof_a">
            <img class="prof_img" src="../img/test1.png" alt="">
          </div>
          <div class="prof_b">
            <h3>かくまあり</h3>
            <a class="user_name">東京LAB11</a>
          </div>
        </div>
      </a>
    </div>
    <div class="user_card">
      <a href="../view/index.php">
        <div class="main_con">
          <div class="prof_a">
            <img class="prof_img" src="../img/test1.png" alt="">
          </div>
          <div class="prof_b">
            <h3>かくまあり</h3>
            <a class="user_name">東京LAB11</a>
          </div>
        </div>
      </a>
    </div>
    <div class="user_card">
      <a href="../view/index.php">
        <div class="main_con">
          <div class="prof_a">
            <img class="prof_img" src="../img/test1.png" alt="">
          </div>
          <div class="prof_b">
            <h3>かくまあり</h3>
            <a class="user_name">東京LAB11</a>
          </div>
        </div>
      </a>
    </div>
    <div class="user_card">
      <a href="../view/index.php">
        <div class="main_con">
          <div class="prof_a">
            <img class="prof_img" src="../img/test1.png" alt="">
          </div>
          <div class="prof_b">
            <h3>かくまあり</h3>
            <a class="user_name">東京LAB11</a>
          </div>
        </div>
      </a>
    </div>
    <div class="user_card">
      <a href="../view/index.php">
        <div class="main_con">
          <div class="prof_a">
            <img class="prof_img" src="../img/test1.png" alt="">
          </div>
          <div class="prof_b">
            <h3>かくまあり</h3>
            <a class="user_name">東京LAB11</a>
          </div>
        </div>
      </a>
    </div>




<!-- /* -------------------------------------------------- */ -->
<!-- ここまで -->
<!-- /* -------------------------------------------------- */ -->

  </div>



<main id="main">
  <!-- <form action="" method="POST"> -->
    <!-- ここにチャットの内容が入る -->
    <div class="chat-area">
    <!-- text -->
      <!-- text -->
        <!-- text -->
          <!-- text -->
        <!-- text -->
      <!-- text -->
    <!-- text -->
    </div>

    <div class="message_box">
      <div class="message-person">
        <input id="me" type="radio" value="me" name="person" checked="checked">
        <label for="me">自分</label>
        <input id="you" type="radio" value="you" name="person">
        <label for="you">相手</label>
      </div>

      <div class="message-area">
        <div class="message-area-text">
          <textarea id="text" placeholder="メッセージを入力"></textarea>
        </div>
        <div class="btn_chat">
          <button id="send" class="disabled-button"><div data-feather="send"></div></button>
        </div>
      </div>
    </div>
  </form>
</main>

</div>

<?php
include("../parts/footer.php");
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>

//featherアイコン
feather.replace();

$(function () {
  $('.message-area-text').on('keypress', (e) => {
    if (e.which === 13) {
      addChat();
      return false;
    }
  })

  $('#send').on('click', function () {
    addChat();
  })

  function addChat() {
    const messageText = $('#text').val()
    if (messageText === '') {
      return false;
    }

    const chatArea = $('.chat-area')
    const messageContainer = $('<div></div>').addClass('message-container')
    // 自分 か 相手どちらにメッセージを送る予定かを取得
    const messagePerson = $('input[name="person"]:checked').val()

    if (messagePerson === 'me') {
      messageContainer.addClass('message-container-me')
    } else {
      messageContainer.addClass('message-container-you')
    }
    // チャットメッセージ用の装飾をしたクラスを当てたpタグを追加
    const message = $('<p></p>').addClass('chat-message').text(messageText)

    //時間を表示
    const nowDate = new Date()
    const hour = (nowDate.getHours() >= 10) ? nowDate.getHours() : '0' + nowDate.getHours()
    const minutes = (nowDate.getMinutes() >= 10) ? nowDate.getMinutes() : '0' + nowDate.getMinutes()
    const nowTime = hour + ':' + minutes
    const sendTime = $('<p></p>').text(nowTime).addClass('chat-time')

    messageContainer.append(sendTime).append(message)
    chatArea.append(messageContainer)
    // 常に最下部までスクロールしておく
    chatArea.scrollTop(chatArea[0].scrollHeight)

    $('#text').val('')
  }
});


</script>
</body>
</html>
