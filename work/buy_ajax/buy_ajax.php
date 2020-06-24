<?php
  session_start();
  
  try {
    $dsn = "mysql:host=must_buy_mysql;dbname=must_buy_app_db;";
    $db = new PDO($dsn, 'testuser', 'pass');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    foreach($_POST['deleteItems'] as $item){
      $sql = 'delete from items where id = :id';
      $stmt = $db->prepare($sql);
      
      $delete = array(':id' => (int)$item);
      $stmt->execute($delete);
      
      $sql = 'delete from tags where item_id = :id';
      $stmt = $db->prepare($sql);
      
      $delete = array(':id' => (int)$item);
      $stmt->execute($delete);
    };
    
  } catch (PDOException $e) {
    echo $e->getMessage();
    exit;
  } 
  