<?php
#Regisztrációs űrlap.  Név, jelszóx2 titkosítva.#
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
    <label>*Felhasználó Név<br>(Legalább 5 maximum 20 karakter): <br><input type="text" name="nev" value="" placeholder="Név" maxlength="20" minlength="5"
        autofocus tabindex="1" required>
    </label><br>
    <fieldset>
      <legend>Jelszó</legend>
      <label>*Jelszó<br>(Legalább 5 maximum 20 karakter): <br><input type="password" name="pw" value="" placeholder="Jelszó" maxlength="20" minlength="5"
          tabindex="4" required></label><br>
      <label>*Jelszó megerősítése: <br><input type="password" name="Repeatpw" value="" placeholder="Jelszó"
          maxlength="20" minlength="5" tabindex="5" required></label><br>
    </fieldset>

    <label for="checkbox1">*Elfogadom a felhasználási feltételeket.</label>
    <input type="checkbox" id="checkbox1" name="agreement" value="agree" tabindex="7" required> <br>
    <div><strong>A *-al jelölt mezők kitöltése kötelező!</strong> </div>


    <input class="submit" type="reset" value="Újratöltés">
    <input class="submit" type="submit" name="register" value="Regisztráció">
  </form>





</body>

</html>