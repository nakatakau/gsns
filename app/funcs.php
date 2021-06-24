<?php
// HTMLでのエスケープ処理をする関数
// 引数には変数も配列も両方受け取って
// サニタイジングできる関数として定義
function h($var)
{
  if (is_array($var)) {
    // 配列を受け取った時の処理
    return array_map('h', $var);
    // array_map:配列内の各部屋に
    // 第1引数で指定した関数を実行する
  } else {
    // 配列じゃない時の処理
    return htmlspecialchars($var, ENT_QUOTES, 'UTF-8');
  }
}
// デバッグ用関数
function v($val)
{
  echo '<pre>';
  var_dump($val);
  echo '</pre>';
}
