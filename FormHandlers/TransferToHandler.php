<?php # Ügyfelenként és havi bontásban (év, hónap) kilistázni az ügyfél számláira érkező utalások összegét. #

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST["userId"];
    $date = $_POST["date"];

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