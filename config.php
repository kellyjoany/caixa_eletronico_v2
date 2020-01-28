<?php
  try {
    $pdo = new PDO("mysql:dbname=caixainicio;host=localhost", "root", "");
  } catch(PDOException $e) {
    echo "ERRO: ".$e->getMessage();
    exit;
  }
?>
