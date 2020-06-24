<?php
  session_start();
  
  $_SESSION = array();

  // セッションを切断するにはセッションクッキーも削除する。
  // Note: セッション情報だけでなくセッションを破壊する。
  //session_get_cookie_params():セッションクッキーのパラメータを得る
  //setcookie():クッキーを送信する
  //session_name():現在のセッション名を取得または設定する（デフォルトはPHPSESSID）
  //session_get_cookie_params()で現在のパラメータを取得して、setcookie関数の中ではクッキーを削除するために過去の時間を指定している。
  if (ini_get("session.use_cookies")) {
      $params = session_get_cookie_params();
      setcookie(session_name(), '', time() - 42000,
          $params["path"], $params["domain"],
          $params["secure"], $params["httponly"]
      );
  };
  
  // 最終的に、セッションを破壊する
  session_destroy();
  
  // echo "ログアウトしました。"
  
  header('Location: /');
?>