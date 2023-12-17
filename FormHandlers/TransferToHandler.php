<?php # Ügyfelenként és havi bontásban (év, hónap) kilistázni az ügyfél számláira érkező utalások összegét. #

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $year = null;
    $userId = null;

    if (isset($_POST["userId"]) && $_POST["userId"] != null ) {
        $userId = $_POST["userId"];
    }

    if (isset($_POST["year"]) && $_POST["year"] != null) {
        $year = $_POST["year"];
    }

    try {
        require_once "../Includes/dbh.inc.php";

        $query = "SELECT felhasználók.név AS 'Felhasználó',
        SUM(utalások.összeg) AS 'Összes érkező utalás',
        CONCAT(YEAR(utalások.teljesítési_határidő), '-', MONTH(utalások.teljesítési_határidő)) AS 'Dátum' 
        FROM felhasználók 
        JOIN kinek_a_számlája ON felhasználók.azonosító = kinek_a_számlája.felhasználó_azonosító
        JOIN utalások ON utalások.cél_számlaszám = kinek_a_számlája.folyószámla_számlaszám
        WHERE (? IS NULL OR YEAR(utalások.teljesítési_határidő) = ?) AND (? IS NULL OR felhasználók.azonosító = ?)
        GROUP BY MONTH(utalások.teljesítési_határidő), felhasználók.név
        ORDER BY utalások.teljesítési_határidő;";

        $stmt = $pdo->prepare($query);

        $stmt->execute([$year, $year, $userId, $userId]);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $pdo = null;
        $stmt = null;

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }


} else {
    header("Location: ../index.php");
}
?>

<!DOCTYPE html>
<html class="RegisterLogin" lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank | Főoldal</title>
    <meta name="description" content="Főoldal">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="icon" href="Logo/Logo.jpg">
</head>

<body>
    <?php
    if (empty($result)){
        echo "<br>";
        echo "There were no results.";
        echo "<br>";
    } else {
        echo "<br>";
        echo "A felhasználó(k), akiknek az adott adatok szerint a számlájára utalás érkezett, és azoknak összege.<br><br>";
        echo "Felhasználó Összeg Év-Hónap";
        echo "<br>";
    }

    foreach ($result as $row) {
        echo htmlspecialchars($row["Felhasználó"] . "\t");
        echo htmlspecialchars($row["Összes érkező utalás"] . "\t");
        echo htmlspecialchars($row["Dátum"]) . "<br>";
    }
    echo "<br>Vissza a főoldalra -> <a href=../index.php>Főoldal</a>";
    ?>
</body>