
<?php # Ügyfelenként és havi bontásban (év, hónap) kilistázni az ügyfél számláira érkező utalások összegét. #

    try {
        require_once "../Includes/dbh.inc.php";

        $query = "SELECT felhasználók.név AS 'Felhasználó' FROM felhasználók
        JOIN kinek_a_számlája ON felhasználók.azonosító = kinek_a_számlája.felhasználó_azonosító
        JOIN folyószámlák ON folyószámlák.számlaszám = kinek_a_számlája.folyószámla_számlaszám
        WHERE folyószámlák.egyenleg = 0
        GROUP BY felhasználók.név;";

        $stmt = $pdo->prepare($query);

        $stmt->execute([]);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $pdo = null;
        $stmt = null;

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
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
        echo "A felhasználó(k), akiknek van olyan számlája amelyen az egyenleg 0.";
        echo "<br>";
    }
    foreach ($result as $row) {
        echo htmlspecialchars($row["Felhasználó"]) . "<br>";
    }
    ?>
    
</body>