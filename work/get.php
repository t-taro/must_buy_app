<?php
  session_start();
  
  try {
    $dsn = "mysql:host=must_buy_mysql;dbname=must_buy_app_db;";
    $db = new PDO($dsn, 'testuser', 'pass');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt = $db->prepare('SELECT * FROM users WHERE id = :id');
    $userArray = array(':id' => $_SESSION['userId']);
    $stmt->execute($userArray);
    $loginUserResult = $stmt->fetch(PDO::FETCH_ASSOC);
    
  } catch (PDOException $e) {
    echo $e->getMessage();
    exit;
  } 
  
  try {
    $dsn = "mysql:host=must_buy_mysql;dbname=must_buy_app_db;";
    $db = new PDO($dsn, 'testuser', 'pass');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt = $db->query('SELECT * FROM items ORDER BY state ASC');
    $itemResult = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
  } catch (PDOException $e) {
    echo $e->getMessage();
    exit;
  } 
  
  
  try {
    $dsn = "mysql:host=must_buy_mysql;dbname=must_buy_app_db;";
    $db = new PDO($dsn, 'testuser', 'pass');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt = $db->query('SELECT * FROM tags');
    $tagResult = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
  } catch (PDOException $e) {
    echo $e->getMessage();
    exit;
  } 
  
  try {
    $dsn = "mysql:host=must_buy_mysql;dbname=must_buy_app_db;";
    $db = new PDO($dsn, 'testuser', 'pass');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt = $db->prepare('SELECT s.id, user_id, sharing_with, user_name, email, request_state FROM share AS s JOIN users AS u ON s.sharing_with = u.id WHERE user_id = :user_id');
    $userArray = array(':user_id' => $_SESSION['userId']);
    $stmt->execute($userArray);
    $shareResult = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
  } catch (PDOException $e) {
    echo $e->getMessage();
    exit;
  } 