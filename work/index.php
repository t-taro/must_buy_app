<?php
  if(!isset($_SESSION)){
    session_start();
  }
  
  // 既にログイン後の場合はログイン後の画面へ遷移する
  if (isset($_SESSION['email'])){
    header('Location: ./home/home.php');
  };
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="./common/header_footer.css">
  <link rel="stylesheet" href="styles.css">
  <link rel="apple-touch-icon" href="apple-touch-icon.png">
  <script src="https://kit.fontawesome.com/ea3c053da1.js" crossorigin="anonymous"></script>
</head>
<body>
  <div class="container">
  <?php include('./common/header.php') ?>
  <main>
    <form action="login.php" method="post" id="login_form">
      <div class="login_item">
        <label for="email">Email</label>
        <input type="text" name="email">
      </div>
      <div class="login_item">
        <label for="password">Password</label>
        <input type="password" name="password">
      </div>
      <input type="submit" value="Login">
    </form>
    <p><a href="./signin/signin_page.php">新規サインインはこちら</a></p>
    
  </main>
  
  <?php include('./common/footer.php') ?>
  </div>
  <script src="./common/header_custom.js"></script>
</body>
</html>