<?php
session_start();
include_once __DIR__ . "/funcs.php";

//SESSIONを初期化（空っぽにする）
$_SESSION = array();

//Cookieに保存してある"SessionIDの保存期間を過去にして破棄
if (isset($_COOKIE[session_name()])) { //session_name()は、セッションID名を返す関数
    setcookie(session_name(), '', time()-42000, '/');
}

//サーバ側での、セッションIDの破棄
session_destroy();

//処理後、landing.phpへリダイレクト
redirect("../view/landing.php");
exit();
