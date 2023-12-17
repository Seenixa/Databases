<?php #Új számlatípus készítéséhet használt űrlap feldolgozásáért felelős file.


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $accountTypeName = $_POST["nev"];

  if (!isset($_POST["nev"])) {
    die("A felhasználó nevet meg kell adni.<br>");
  }

  try {
    require_once "../Includes/dbh.inc.php";

    $query = "INSERT INTO számlatípusok (név) VALUES
      (?);";

    $stmt = $pdo->prepare($query);

    $stmt->execute([$accountTypeName]);

    $pdo = null;
    $stmt = null;

    die("Sikeresen létrehozta az új számlatípust. Vissza a főoldalra -> <a href=../index.php>Főoldal</a>");

  } catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
  }


} else {
  header("Location: ../index.php");
}