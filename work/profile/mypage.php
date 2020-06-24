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
  <title>profile</title>
  <link rel="stylesheet" href="../common/header_footer.css">
  <link rel="stylesheet" href="../styles.css">
  <link rel="stylesheet" href="mypage.css">
  <script src="https://kit.fontawesome.com/ea3c053da1.js" crossorigin="anonymous"></script>
</head>
<body>
  <div class="container">
    <?php include('../common/header.php') ?>
    <main>
      <h1>Profile</h1>
      <div id="profile_image">
        <div id="profile_image_frame">
          <img src="<?= $loginUserResult['image'] ?>" alt="">
        </div>
        <form action="upload.php" method="post" enctype="multipart/form-data">
          <input type="file" name="userImage">
          <input type="submit" value="upload">
        </form>
      </div>
      
      <div id="user_name">
        <h2>Name</h2>
        <p><?= h($_SESSION['userName']) ?></p>
      </div>
      <div id="email">
        <h2>Email</h2>
        <p><?= h($_SESSION['email']) ?></p>
      </div>
      
      <div id="sharing_with" class="<?php
        $isShare = $shareResult[0];
        if (is_null($isShare)){
          echo 'hidden';
        };
      ?>">
        <h2>Sharing with</h2>
        <ul>
          <?php
            foreach($shareResult as $row){
              if ($row['request_state'] == 1){
                $sharingWith = h($row['user_name']);
                $email = h($row['email']);
                echo '<li>' . $sharingWith . '<span>(' . $email . ')</span></li>';
              };
            };
          ?>
        </ul>
      </div>
      
      <div id="request" class="<?php
        $isShare = $shareResult[0];
        if (is_null($isShare)){
          echo 'hidden';
        };
      ?>">
        <h2>Requesting</h2>
        <ul>
          <?php
            foreach($shareResult as $row){
              if ($row['request_state'] == 0){
                $sharingWith = h($row['user_name']);
                $email = h($row['email']);
                echo '<li>' . $sharingWith . '<span>(' . $email . ')</span></li>';
              };
            };
          ?>
        </ul>
      </div>
      <a href="../home/home.php">Home</a>
    </main>
    <?php include('../common/footer.php') ?>
  </div>
  <script src="../common/header_custom.js"></script>
</body>
</html>