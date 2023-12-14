<?php #A felhasználó ezen az oldalon tud új folyószámlát nyitni a nevére.#
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
  <form action="../FormHandlers/newBankAccountHandler.php" method="post">
    <label>Létrehozandó számla típusa: <br><input type="number" name="nev" value="" placeholder="típus" max="4000" min="2999"
        autofocus tabindex="1" required></label><br>
    <input class="submit" name="login" type="submit" tabindex="2" value="Létrehozás"><br>
    <p><a class="LoginLink" href="Register.php">Regisztráció</a></p>
  </form>
</body>

</body>

</html>