<?php #Egy számlatípus "törlése", azaz passzívvá tétele#

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!isset($_POST["id"])) {
        die("Adja meg a típust amelyet passziválni szeretne.");
    }

    $id = $_POST["id"];
    $status = FALSE;

    try {
        require_once "../Includes/dbh.inc.php";

        $query = "UPDATE számlatípusok SET állapot = ':status'; WHERE azonosító == $id;";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":status", $status);
        $stmt->execute();

        $pdo = null;
        $stmt = null;

        header("Location: ../index.php");

        die("A számlatípus sikeresen passzíválva.");


    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }


} else {
    header("Location: ../index.php");
}