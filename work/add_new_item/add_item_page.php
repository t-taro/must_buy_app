<?php
  session_start();
  require_once('../get.php');
  
  if (!isset($_SESSION['email'])){
    header('Location: /');
  };
  
  if ( isset($_GET['success']) && $_GET['success'] == 1 ){
    foreach($itemResult as $row){
      if ($row['id'] == $_GET['lastitem']){
        $addedItemName = $row['item_name'];
      };
    };
    $successMessage = $addedItemName . 'を追加しました。';
  };
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="../common/header_footer.css">
  <link rel="stylesheet" href="../styles.css">
  <link rel="stylesheet" href="add_item_page.css">
  <script src="https://kit.fontawesome.com/ea3c053da1.js" crossorigin="anonymous"></script>
</head>
<body>
  <div class="container">
    <?php include('../common/header.php') ?>
    <main> 
      <p><?= $successMessage ?></p>
      <form action="add_new_item.php" method="post">
        <section id="name" class="flex_column add_new_item_section">
          <label for="new_item">Item</label>
          <input type="text" name="new_item" id="new_item">
        </section>
        
        <section id="status" class="flex_column add_new_item_section">
          <label for="new_item_status"></label>
          <select name="new_item_status" id="new_item_status">
            <option value="0">在庫なし</option>
            <option value="1">ラスト１</option>
            <option value="2">残りわずか</option>
          </select>
        </section>
        
        <section id="shop" class="add_new_item_section">
          <ul>
            <li>
              <label><input type="checkbox" name="selected_shop_tag[]" value="supermarket">スーパーマーケット</label>
            </li>
            <li>
              <label><input type="checkbox" name="selected_shop_tag[]" value="drugstore">ドラッグストア</label>
            </li>
            <li>
              <label><input type="checkbox" name="selected_shop_tag[]" value="other">その他</label>
            </li>
          </ul>
        </section>
        
        <input type="submit" value="Add to list">
      </form>
    </main>
    
    <?php include('../common/footer.php') ?>
  </div>
  <script src="../common/header_custom.js"></script>
</body>
</html>