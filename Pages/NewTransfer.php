<?php #A felhasználó ezen az oldalon tud új átutalást kezdeményezni. összeg, teljesítési_határidő, cél_számlaszám, forrás_számlaszám, ki_kezdeményezte#
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
    <form action="../FormHandlers/NewTransferHandler.php" method="post">
        <label>Átutalás összege: <br><input type="number" name="amount" value="" placeholder="osszeg" max="2147483647"
                min="0" autofocus tabindex="1" required></label><br>
        <label>Teljesíési határidő (éééé-hh-nn): <br><input type="date" name="deadline" value="" placeholder="határidő"
                autofocus tabindex="2" required></label><br>
        <label>Cél számlaszám: <br><input type="number" name="target" value="" placeholder="cél" max="2999" min="2000"
                autofocus tabindex="3" required></label><br>
        <label>Forrás számlaszám: <br><input type="number" name="from" value="" placeholder="forrás" max="2999"
                min="2000" autofocus tabindex="4" required></label><br>
        <input name="create" type="submit" tabindex="5" value="Utalás indítása"><br>
    </form>
</body>

</body>

</html>