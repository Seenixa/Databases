<?php 
session_start();
#A bejelentkezéshez használt űrlap feldolgozásához használt file.
?>

<!DOCTYPE html>
<html class="RegisterLogin" lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Starcraft | Bejelentkezés</title>
    <meta name="description" content="Bejelentkezés">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="icon" href="../Images/SCLogo.png">
</head>
<body>
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



  foreach($errors as $error)
  echo $error;
  
  
  ?>
</body>