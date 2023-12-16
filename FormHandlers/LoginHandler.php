<?php 
session_start();
#A bejelentkezéshez használt űrlap feldolgozásához használt file.
?>

  <?php
  $errors = [];

  if(!isset($_POST["login"])){
    $errors[] = "Hogy kerültél ide?<br>";
  }

  if(!isset($_POST["nev"])){
    $errors[] = "A felhasználó nevet meg kell adni.<br>";
  }

  if(!isset($_POST["pw"])){
    $errors[] = "Meg a jelszót is.<br>";
  }

  if (count($errors) != 0){
    foreach($errors as $error)
      echo $error;
  }
  try {
    require_once("../includes/dbh.inc.php");

    $query = "SELECT név FROM felhasználók (felhasználónév, jelszó) VALUES
    (:username, :pwd, :email);";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":név", $_POST["nev"]);
    $stmt->bindParam(":név", $_POST["pw"]);

    $stmt->execute();

    $pdo = null;
    $stmt = null;
  

  }
  
  
