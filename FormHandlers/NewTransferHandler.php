<?php #Új átutaláshoz használt űrlap feldolgozásáért felelős file összeg, teljesítési_határidő, cél_számlaszám, forrás_számlaszám, ki_kezdeményezte#

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (!isset($_POST["amount"])) {
    die("Az összeget meg kell adni!");
  }

  if (!isset($_POST["date"])) {
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
  $userId = $_SESSION["user"]["azonosító"];

  try {
    require_once "../Includes/dbh.inc.php";

    $query = "INSERT INTO utalások (összeg, teljesítési_határidő, cél_számlaszám, forrás_számlaszám, ki_kezdeményezte) VALUES
      (:összeg, :teljesítési_határidő, :cél_számlaszám, :forrás_számlaszám, :ki_kezdeményezte);";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":összeg", $amount);
    $stmt->bindParam(":teljesítési_határidő", $deadline);
    $stmt->bindParam(":cél_számlaszám", $targetAccount);
    $stmt->bindParam(":forrás_számlaszám", $accountFrom);
    $stmt->bindParam(":ki_kezdeményezte", $userId);

    $stmt->execute();

    $pdo = null;
    $stmt = null;

    header("Location: ../index.php");

    die("Sikeres utalás kezdeményezés!");

  } catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
  }


} else {
  header("Location: ../index.php");
}