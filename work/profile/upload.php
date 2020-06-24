<?php

  session_start();

  if (!isset($_SESSION['email'])){
    header('Location: /');
  };
  
  $tempfile = $_FILES['userImage']['tmp_name'];
  $filename = $_SESSION['userId']."_".$_FILES['userImage']['name'];
  $upload_dir = './user_images';

  if (is_uploaded_file($tempfile)) {
    if (move_uploaded_file($tempfile, $upload_dir."/".$filename)){ 
      try {
        $dsn = "mysql:host=must_buy_mysql;dbname=must_buy_app_db;";
        $db = new PDO($dsn, 'testuser', 'pass');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'update users set image = :filename where id = :userId'; 
        $stmt = $db->prepare($sql);
        
        $executeArray = array(':filename'=>$upload_dir."/".$filename, ':userId'=>$_SESSION['userId']);
        
        $stmt->execute($executeArray);
        
        header('Location: ./mypage.php');
      } catch (PDOException $e) {
        $errorMessage = $e->getMessage();
        exit;
      }
      
    } else {
      echo "ファイルをアップロードできません。";
    };
  } else {
    echo "ファイルが選択されていません。";
  };