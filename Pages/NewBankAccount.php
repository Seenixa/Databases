<?php #A felhasználó ezen az oldalon tud új folyószámlát nyitni a nevére.#
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
  <link rel="icon" href="../Logo/Logo.jpg">
</head>

<body>
  <a href="../index.php">Főoldal</a>
  <form action="../FormHandlers/newBankAccountHandler.php" method="post">
    <label>Létrehozandó számla típusa: <br><input type="text" name="type" value="" placeholder="típus" autofocus
        tabindex="1" required></label><br>
    <input name="create" type="submit" tabindex="2" value="Létrehozás"><br>
    <p><a href="Register.php">Regisztráció</a></p>
  </form>
</body>

</body>

</html>