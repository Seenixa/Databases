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
  <form action="../FormHandlers/NewAccountTypeHandler.php" method="post">
    <label>Számlatípus név: <br><input type="text" name="nev" value="" placeholder="Név" maxlength="255" minlength="1"
        autofocus tabindex="1" required></label><br>
    <input class="submit" name="login" type="submit" tabindex="2" value="Létrehozás"><br>
  </form>
</body>

</body>

</html>