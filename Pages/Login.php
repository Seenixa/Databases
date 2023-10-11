<?php #Bejelentkezés űrlap. Azonosító + Jelszó. ?>

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
  <form action="../FormHandlers/LoginHandler.php" method="post">
    <label>Felhasználó Azonosító: <br><input type="text" name="nev" value="" placeholder="Név" maxlength="20" minlength="5"
        autofocus tabindex="1" required></label><br>
    <label>Jelszó: <br><input type="password" name="pw" value="" placeholder="Jelszó" maxlength="20" minlength="5"
        tabindex="2" required></label><br>
    <input class="submit" name="login" type="submit" tabindex="3" value="Bejelentkezés"><br>
    <p><a class="LoginLink" href="Register.php">Regisztráció</a></p>
  </form>
</body>

</body>

</html>