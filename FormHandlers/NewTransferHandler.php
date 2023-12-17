<?php #Új átutaláshoz használt űrlap feldolgozásáért felelős file összeg, teljesítési_határidő, cél_számlaszám, forrás_számlaszám, ki_kezdeményezte#

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (!isset($_POST["amount"])) {
    die("Az összeget meg kell adni!");
  }

  if (!isset($_POST["deadline"])) {
    die("A teljesítési határidőt meg kell adni!");
  }

  if (!isset($_POST["target"])) {
    die("A cél számlaszámot meg kell adni!");
  }

  if (!isset($_POST["from"])) {
    die("A forrás számlaszámot meg kell adni");
  }

  $amount = $_POST["amount"];
  $deadline = $_POST["deadline"];
  $targetAccount = $_POST["target"];
  $accountFrom = $_POST["from"];
  $userId = 1000;

  try {
    require_once "../Includes/dbh.inc.php";

    $query = "INSERT INTO utalások (összeg, teljesítési_határidő, cél_számlaszám, forrás_számlaszám, ki_kezdeményezte) VALUES
      (?, ?, ?, ?, ?);";

    $stmt = $pdo->prepare($query);

    $stmt->execute([$amount, $deadline, $targetAccount, $accountFrom, $userId]);

    $pdo = null;
    $stmt = null;

    die("Sikeres utalás kezdeményezés! Vissza a főoldalra -> <a href=../index.php>Főoldal</a>");

  } catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
  }


} else {
  header("Location: ../index.php");
}