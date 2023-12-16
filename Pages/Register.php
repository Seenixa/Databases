<?php
#Regisztrációs űrlap.#
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

  <form action="../FormHandlers/RegisterHandler.php" method="post">
    <label>*Felhasználó Név <br><input type="text" name="nev" value="" placeholder="Név" maxlength="255" minlength="5"
        autofocus tabindex="1" required>
    </label><br>
    <label>*Jelszó<br><input type="password" name="pw" value="" placeholder="Jelszó" maxlength="255" minlength="5"
        tabindex="4" required></label><br>
    <label>*Jelszó megerősítése: <br><input type="password" name="Repeatpw" value="" placeholder="Jelszó"
        maxlength="255" minlength="5" tabindex="2" required></label><br>

    <input class="submit" type="reset" value="Újratöltés">
    <input class="submit" type="submit" name="register" value="Regisztráció">
  </form>

</body>

</html>