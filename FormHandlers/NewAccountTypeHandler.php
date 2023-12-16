<?php #Új számlatípus készítéséhet használt űrlap feldolgozásáért felelős file.


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $accountTypeName = $_POST["nev"];

  if (!isset($_POST["nev"])) {
    die("A felhasználó nevet meg kell adni.<br>");
  }

  if ($_SESSION["user"]["privilidge"] < 1){
    die("Csak banki alkalmazottak hozhatnak létre új számlatípust.<br>");
  }

  try {
    require_once "../Includes/dbh.inc.php";

    $query = "INSERT INTO számlatípusok (név) VALUES
      (:név);";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":név", $accountTypeName);

    $stmt->execute();

    $pdo = null;
    $stmt = null;

    header("Location: ../index.php");

    die("Sikeresen létrehozta az új számlatípust.");

  } catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
  }


} else {
  header("Location: ../index.php");
}