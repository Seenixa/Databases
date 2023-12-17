<?php #Egy számlatípus "törlése", azaz passzívvá tétele#

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!isset($_POST["accountNumber"])) {
        die("Adja meg a számlaszámát a számlának amit zárolni szeretne.");
    }
    
    $accountNumber = $_POST["accountNumber"];


    try {
        require_once "../Includes/dbh.inc.php";

        $query = "UPDATE folyószámlák SET zárolva = 1 WHERE számlaszám = $accountNumber;";

        $stmt = $pdo->prepare($query);

        $stmt->execute();

        $pdo = null;
        $stmt = null;

        die("A folyószámla sikeresen zárolva. Vissza a főoldalra -> <a href=../index.php>Főoldal</a>");


    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }


} else {
    header("Location: ../index.php");
}