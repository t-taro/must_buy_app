<?php
  session_start();
  
  
  try {
    $dsn = "mysql:host=must_buy_mysql;dbname=must_buy_app_db;";
    $db = new PDO($dsn, 'testuser', 'pass');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // itemsテーブルへの登録
    $sql = 'insert into items (item_name, state, user_id) values (:item_name, :state, :user_id)';
    $stmt = $db->prepare($sql);
    
    $itemInfo = array(':item_name' => $_POST['new_item'], ':state' => $_POST['new_item_status'], ':user_id' => $_SESSION['userId']);
    
    $stmt->execute($itemInfo);
    
    //新しいAUTO_INCREMENT値を取得
    $sql = 'select LAST_INSERT_ID()';
    $stmt = $db -> query($sql);
    $lastInsertedId = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $lastId = (int)$lastInsertedId[0]["LAST_INSERT_ID()"];
    
    
    // tagsテーブルへの登録
    if (!is_null($_POST['selected_shop_tag'])){
      foreach($_POST['selected_shop_tag'] as $shop){
        
        $sql = 'insert into tags (shop_name, item_id) values (:shop_name, :item_id)';
        $stmt = $db->prepare($sql);
        
        $itemInfo = array(':shop_name' => $shop, ':item_id' => $lastId);
        
        $stmt->execute($itemInfo);
      };
    };
    
    
    header('Location: ./add_item_page.php?success=1&lastitem='.$lastId);
  } catch (PDOException $e) {
    echo $e->getMessage();
    exit;
  } 
  