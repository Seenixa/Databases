<?php
session_start();
include_once("Includes/dbh.inc.php");
?>

<!DOCTYPE html>
<html class="RegisterLogin" lang="hu">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bank | Főoldal</title>
  <meta name="description" content="Főoldal">
  <link rel="stylesheet" href="../CSS/style.css">
  <link rel="icon" href="Logo/Logo.jpg">
</head>

<body>


  <?php
  if (isset($_SESSION["user"])) {
    echo "Bejelentkezve mint: " . $_SESSION["user"]["név"] . ".<br><br>";
  } else {
    echo "<fieldset><a href=Pages/Login.php>Bejelentkezés</a><br>
        <a href=Pages/Register.php>Regisztráció</a><br></fieldset>";
  }
  # if (isset($_SESSION["user"]) && $_SESSION["user"]["privilidge"] == 1) {
  #   if ($_SESSION["user"]["privilidge"] > 1) {
  echo "<fieldset><a href=Pages/TransferStartedByUser.php>Felhasználó által indított utalások</a><br><br>";
  echo "<a href=Pages/TransferTo.php>Felhasználó számláira érkező utalások</a><br><br>";
  echo "<a href=Pages/BankAccountAndType.php>Számlatípus passziválása/Folyószámla zárolása</a><br><br>";
  echo "<a href=Pages/EmptyAccounts.php>Üres folyószámlák felhasználói</a><br><br>";
  echo "<a href=Pages/ExpireSoon.php>Hamarosan lejáró folyószámlák</a><br><br>";
  echo "<a href=Pages/EmptyAccounts.php>Felhasználók akiknek van üres folyószámlája.</a><br><br></fieldset>";
  #   }
  echo "<fieldset><a href=Pages/NewAccountType.php>Új számlatípus létrehozása</a><br><br>";
  echo "<a href=Pages/NewBankAccount.php>Új folyószámla nyitása</a><br><br>";
  echo "<a href=Pages/NewTransfer.php>Utalás indítása</a><br><br></fieldset>";
  echo "<a href=Functions/Logout.php>Kijelentkezés</a>"



  # }
  


  ?>

</body>

</html>