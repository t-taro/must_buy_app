<?php
  session_start();
  require_once('../get.php');
  
  if (!isset($_SESSION['email'])){
    header('Location: /');
  }
  
  function h($message){
    return htmlspecialchars($message, ENT_QUOTES);
  }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="../common/header_footer.css">
  <link rel="stylesheet" href="../styles.css">
  <link rel="stylesheet" href="home.css">
  <link rel="apple-touch-icon" href="../apple-touch-icon.png">
  <script src="https://kit.fontawesome.com/ea3c053da1.js" crossorigin="anonymous"></script>
</head>
<body>
  <div class="container">
    <?php include('../common/header.php') ?>
    <main>
      <h1>Shopping list</h1>
      <a href="../add_new_item/add_item_page.php"><i class="fas fa-plus"></i></a>
      <div class="second_row flex_row">
        <section id="shop_filter_section" class="flex_row">
          <label for="shop_filter_select">Shop filter</label>
          <!-- 選択肢を増やす場合はadd_item_page.phpも修正 -->
          <select name="shop_filter" id="shop_filter_select">
            <option value="default" selected>All</option>
            <option value="supermarket">スーパーマーケット</option>
            <option value="drugstore">ドラッグストア</option>
            <option value="other">その他</option>
          </select>
        </section>
      </div>
      <section id="buy_list_section">
        <ul>
          <?php
            foreach($itemResult as $itemRow){
              switch ($itemRow['state']) {
                case 0:
                  $itemState = '在庫なし';
                break;
                case 1:
                  $itemState = 'ラスト１';
                break;
                case 2:
                  $itemState = '残りわずか';
                break;
              }
          ?>
          
          <li class="item_row flex_row" data-item-id=<?= $itemRow['id'] ?>>
            <input type="checkbox" name="buy_check" class="buy_checkbox"> 
            <div class="item_info">
              <h1 class="item_name"><?= h($itemRow['item_name']) ?></h1>
              <p class="item_status"><?= $itemState ?></p>
              <div class="tags">
                <?php
                  foreach($tagResult as $tagRow){
                    if ($itemRow['id'] === $tagRow['item_id']){
                      $shop_tag = h($tagRow['shop_name']);
                ?>
                      <span class="shop_tag" data-shop="<?= $shop_tag ?>"><?= $shop_tag ?></span>
                <?php
                    };
                  };
                ?>
                
              </div>
            </div>
          </li>
          
          <?php
            };
          ?>
        </ul>
        <input type="submit" value="Buy" id="buy_btn">
      </section>
    </main>
    
    <?php include('../common/footer.php') ?>
  </div>
  <script src="../common/header_custom.js"></script>
  <script src="../buy_ajax/buy_ajax.js"></script>
  <script src="tag_color.js"></script>
  <script src="shop_filter.js"></script>
</body>
</html>