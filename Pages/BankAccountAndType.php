<?php
#A banki alkalmazottak itt hozhatnak létre új számlatípust. Név, mettől, meddig, állapot#
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
  <link rel="icon" href="../Logo/Logo.jpg">
</head>

<body>
  <a href="../index.php">Főoldal</a>
  <form action="../FormHandlers/AccountTypeDisable.php" method="post">
    <label>Számlatípus azonosítója: <br><input type="number" name="id" value="" placeholder="Azonosító" 
        autofocus tabindex="1" required></label><br>
    <input class="submit" name="deactivate" type="submit" tabindex="2" value="Típus passziválása"><br>
  </form>
  <br><br>
  <form action="../FormHandlers/BankAccountLock.php" method="post">
    <label>Folyószámla száma: <br><input type="number" name="accountNumber" value="" placeholder="Számlaszám"
        autofocus tabindex="3" required></label><br>
    <input class="submit" name="lock" type="submit" tabindex="4" value="Számla zárolása"><br>
  </form>
</body>

</body>

</html>