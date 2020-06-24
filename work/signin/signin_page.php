<?php
  session_start();
  
  if (isset($_SESSION['email'])){
    header('Location: /home.php');
  }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signin</title>
  <!-- <link rel="stylesheet" href="/var/www/html/common/header_footer.css"> -->
  <link rel="stylesheet" href="../common/header_footer.css">
  <link rel="stylesheet" href="../styles.css">
  <script src="https://kit.fontawesome.com/ea3c053da1.js" crossorigin="anonymous"></script>
</head>
<body>
  <div class="container">
  <?php include('/var/www/html/common/header.php') ?>
  <main>
    <section class="signin">
      <p>サインイン</p>
      <form action="signin.php" method="post">
        <label>name<input type="text" name="name" id="Name"></label>
        <label>e-mail<input type="text" name="email" id="Email"></label>
        <label>password<input type="password" name="password" id="Password"></label>
        <input type="submit" value="Signin">
      </form>
    </section>
  </main>
  
  <?php include('/var/www/html/common/footer.php') ?>
  </div>
  <script src="./common/header_custom.js"></script>
</body>
</html>
