<?php
session_start();
#A bejelentkezéshez használt űrlap feldolgozásához használt file.
?>

<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

  if (!isset($_POST["nev"])) {
    die("A felhasználónevet meg kell adni. Újra -> <a href=../Pages/login.php>Bejelentkezés</a>");
  }

  if (!isset($_POST["pw"])) {
    die("A jelszót meg kell adni. Újra -> <a href=../Pages/login.php>Bejelentkezés</a>");
  }

  $username = $_POST["nev"];
  $password = $_POST["pw"];

  try {
    require_once("../includes/dbh.inc.php");

    $query = "SELECT * FROM felhasználók WHERE név = ?;";
    $stmt = $pdo->prepare($query);

    $stmt->execute([$username]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if (count($result) == 0) {
      die("Sikertelen bejelentkezés. Újra -> <a href=../Pages/login.php>Bejelentkezés</a>");
    }

    if (!password_verify($password, $result["jelszó"]) && $password != $result["jelszó"]) {
      die("Sikertelen bejelentkezés. Újra -> <a href=../Pages/login.php>Bejelentkezés</a>");
    }

    $pdo = null;
    $stmt = null;

    $_SESSION["user"] = $result;
    die("Sikeres bejelentkezés. Vissza a főoldalra -> <a href=../index.php>Főoldal</a>");

  } catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
  }

} else {
  header("Location: ../index.php");
  die();
}