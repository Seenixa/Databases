<?php # Ügyfelenként és havi bontásban (év, hónap) kilistázni az ügyfél számláira érkező utalások összegét. # ?>


<!DOCTYPE html>
<html class="RegisterLogin" lang="hu">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bank | Főoldal</title>
  <meta name="description" content="Főoldal">
  <link rel="stylesheet" href="../CSS/style.css">
  <link rel="icon" href="../Logo/Logo.jpg">
</head>

<body>
  <a href="../index.php">Főoldal</a>
  <form action="../FormHandlers/TransferToHandler.php" method="post">
    <label>Felhasználó azonosítója: <br><input type="number" name="userId" value="" placeholder="Felhasználó azonosító" maxlength="255" minlength="1"
        autofocus tabindex="1"></label><br>
    <label>Utalás határidejének éve: <br><input type="number" name="year" value="" placeholder="év"
        autofocus tabindex="2"></label><br>
    <input class="submit" name="List" type="submit" tabindex="3" value="Utalások listázása."><br>
  </form>
</body>

</body>

</html>
