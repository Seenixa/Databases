<?php #Új számlanyitáshoz használt űrlap feldolgozásáért felelős file 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $accountType = $_POST["type"];

    if (!isset($_POST["type"])) {
        die("A létrehozandó számla típusát meg kell adni!");
    }

    try {
        require_once "../Includes/dbh.inc.php";

        $query = "INSERT INTO folyószámlák (típus_azonosító) VALUES
      (?);";

        $stmt = $pdo->prepare($query);
        $stmt->execute([$accountType]);

        $pdo = null;
        $stmt = null;


        die("Sikeres bankszámla nyitás! Vissza a főoldalra -> <a href=../index.php>Főoldal</a>");

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }


} else {
    header("Location: ../index.php");
}