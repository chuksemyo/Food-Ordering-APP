<?php
try {
  $host = "localhost";
    $dbname = "food";
    $user = "root";
      $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user); 

   }
    catch(PDOException $e) {
        echo  $e->getMessage();
  }
  ?>
