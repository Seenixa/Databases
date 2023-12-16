<?php #Új számlanyitáshoz használt űrlap feldolgozásáért felelős file 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $accountType = $_POST["type"];

    if (!isset($_POST["type"])) {
        die("A létrehozandó számla típusát meg kell adni!");
    }

    try {
        require_once "../Includes/dbh.inc.php";

        $query = "INSERT INTO folyószámlák (típus) VALUES
      (:típus);";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":típus", $accountTypeName);

        $stmt->execute();

        $pdo = null;
        $stmt = null;

        header("Location: ../index.php");

        die("Sikeres bankszámla nyitás!");

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }


} else {
    header("Location: ../index.php");
}