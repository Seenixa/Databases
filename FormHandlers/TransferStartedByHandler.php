<?php # Ügyfelenként és havi bontásban (év, hónap) kilistázni az ügyfél által indított utalások összegét. # 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $year = null;
    $userId = null;

    if (isset($_POST["userId"]) && $_POST["userId"] != null ) {
        $userId = $_POST["userId"];
    }

    if (isset($_POST["year"]) && $_POST["year"] != null) {
        $date = $_POST["year"];
    }



    try {
        require_once "../Includes/dbh.inc.php";

    #   $query = "SELECT felhasználók.név AS Kezdeményező, utalások.összeg AS 'Az utalás összege', utalások.teljesítési_határidő AS dátum 
    #   FROM utalások INNER JOIN felhasználók ON utalások.ki_kezdeményezte = felhasználók.azonosító 
    #   WHERE ? IS NULL OR YEAR(utalások.teljesítési_határidő) = ? AND ? IS NULL OR utalások.ki_kezdeményezte = ?
    #   ORDER BY utalások.teljesítési_határidő;";

        $query = "SELECT felhasználók.név AS 'Kezdeményező',
        SUM(utalások.összeg) AS 'Összes utalás', 
        CONCAT(YEAR(utalások.teljesítési_határidő),'-',  
        MONTH(utalások.teljesítési_határidő)) AS 'Dátum'
        FROM utalások
        JOIN felhasználók ON felhasználók.azonosító = utalások.ki_kezdeményezte
        WHERE ? IS NULL OR felhasználók.azonosító = ? AND ? IS NULL OR YEAR(utalások.teljesítési_határidő) = ?
        GROUP BY MONTH(utalások.teljesítési_határidő), felhasználók.név
        ORDER BY utalások.teljesítési_határidő;";
        
        $stmt = $pdo->prepare($query);

        $stmt->execute([$userId, $userId, $year, $year]);

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
    }
    echo "<br>";
    echo "Az ügyfél(ek) által indított utalások összege havi bontásban.";
    echo "<br><br>";

    foreach ($result as $row) {
        echo htmlspecialchars($row["Kezdeményező"]) . "\t";
        echo htmlspecialchars($row["Összes utalás"]) . "\t";
        echo htmlspecialchars($row["Dátum"]) . "<br>";
    }

    echo "<br>Vissza a főoldalra -> <a href=../index.php>Főoldal</a>";

    ?>
</body>