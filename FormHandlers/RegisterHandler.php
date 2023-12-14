<?php #Regisztrációs űrlap feldolgozásáért felelős file. ?>

<!DOCTYPE html>
<html class="RegisterLogin" lang="hu">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Starcraft | Regisztráció</title>
  <meta name="description" content="Regisztráció">
  <link rel="stylesheet" href="../CSS/style.css">
  <link rel="icon" href="../Images/SCLogo.png">
</head>
<body class="RegisterLoginBody">
  <?php
  include_once "../Classes/User.php";
  include_once "../Functions/SaveLoad.php";

  if (isset($_POST["register"])) {
    $username = $_POST["nev"];
    $password = $_POST["pw"];
    $repeatPassword = $_POST["Repeatpw"];
    $email = $_POST["email"];
    $repeatEmail = $_POST["RepeatEmail"];
    $race = "";
    $agreement = $_POST["agreement"];
    $profilePicture = "../images/SClogo.png";
    $priviledge = 0;
    $errors = [];


    // Létezik-e már a felhasználó
  
    foreach ($userBase as $user) {
      if ($user["nev"] == $username) {
        $errors[] = "A felhasználónév már használatban van.";
      }
    }
    
    foreach($userBase as $user){
      if ($user["email"] == $email){
          $errors[] = "Az e-mail cím már használatban van.";
      }
    }

    // Ugyanazt az Jelszót címet írta-e be kétszer
  
    if ($repeatPassword != $password) {
      $errors[] = "A megadott jelszavak nem egyeznek.";
    }

    // Ha nincs hiba akkor felhasználó bevitele a mentésbe és üdvözlés, egyébként hibák kilistázása.
  
    if (count($errors) != 0) {
        echo "<div>Sikertelen regisztráció<br></div>";
      foreach ($errors as $error) {
        echo "<div>$error<br></div>";
        echo "<div><br><a class=LoginLink href=../Pages/Register.php>Újrapróbálkozás</a><br></div>";
        echo "<div><br><a class=LoginLink href=../Pages/index.php>Vissza a főoldalra</a><br></div>";
      }
    }


      echo "<div>Sikeres regisztráció!<br>Üdvözlünk a weboldalon $username!</div>";
    } 

    echo "<div><br><a class=LoginLink href=../Pages/index.php>Vissza a főoldalra</a><br></div>";

  ?>
</body>