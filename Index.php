<?php
session_start();
?>

<!DOCTYPE html>
<html class="RegisterLogin" lang="hu">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Starcraft | Regisztráció</title>
  <meta name="description" content="Regisztráció">
  <link rel="stylesheet" href="../CSS/style.css">
  <link rel="icon" href="Logo/Logo.jpg">
</head>

<body>
  <a href="Pages/Login.php">Bejelentkezés</a><br>
  <a href="Pages/Register.php">Regisztráció</a>
  <?php
  if (isset($_SESSION["user"]) && $_SESSION["user"]["privilidge"] == 1) {
    if ($_SESSION["user"]["privilidge"] > 1) {
      echo "<a href=Pages/NewAccountType.php>Új számlatípus létrehozása</a>";
      echo "<a href=Pages/BankAccountAndType.php>Számlatípus passziválása/Folyószámla zárolása</a>";
    }
    echo "<a href=Pages/NewBankAccount.php>Új folyószámla nyitása</a>";
    echo "<a href=Pages/NewTransfer.php>Utalás indítása</a>";
  }
  ?>

</body>

</html>