
  <?php
  #Regisztrációs űrlap feldolgozásáért felelős file.

  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["nev"];
    $password = password_hash($_POST["pw"], PASSWORD_DEFAULT);

    if(!isset($_POST["nev"])){
      die("A felhasználó nevet meg kell adni.<br>");
    }

    if(!isset($_POST["pw"])){
      die("Meg a jelszót is.<br>");
    }

    if($_POST["pw"] != $_POST["Repeatpw"]){
      die("A megadott jelszavak nem egyeznek.<br>");
    }


    try {
      require_once "../Includes/dbh.inc.php";

      $query = "INSERT INTO felhasználók (név, jelszó) VALUES
      (?, ?);";

      $stmt = $pdo->prepare($query);
      $stmt->execute([$username, $password]);

      $pdo = null;
      $stmt = null;

      die("Sikeres regisztáció. Vissza a főoldalra -> <a href=../index.php>Főoldal</a>");

    } catch (PDOException $e) {
      die("Query failed: " . $e->getMessage());
    }


  } else {
    header("Location: ../index.php");
    die();
  }
 