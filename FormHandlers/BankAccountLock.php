<?php #Egy számlatípus "törlése", azaz passzívvá tétele#

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!isset($_POST["accountNumber"])) {
        die("Adja meg a számlaszámát a számlának amit zárolni szeretne.");
    }
    
    $accountNumber = $_POST["accountNumber"];
    $status = TRUE;

    try {
        require_once "../Includes/dbh.inc.php";

        $query = "UPDATE folyószámlák SET zárolva = ':status'; WHERE számlaszám == $accountNumber;";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":status", $status);
        $stmt->execute();

        $pdo = null;
        $stmt = null;

        header("Location: ../index.php");

        die("A folyószámla sikeresen zárolva.");


    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }


} else {
    header("Location: ../index.php");
}