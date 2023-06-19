<?php

$database = 'db.sqlite';
$dsn = 'sqlite:' . $database;
$username = "fpnk43";
$password = "Trio@foumban7";

// verbindung mit Datenbank
try {
    $pdo = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    echo 'Verbindung fehlgeschlagen : ' . $e->getMessage();
}

/*
$table = "CREATE TABLE pin (
  pin text
)";
$pdo->exec($table);
*/

// Abrufen von Formulardaten
if (isset($_POST['submit'])) {
    $pin = sha1($_POST['pin']);


    // Daten in die Tabelle einzufügen
    $sqlpin = "SELECT * FROM pin";
    $stat = $pdo->query($sqlpin);
    $row = $stat->fetch();
    if ($row == 0) {
        $sql = "INSERT INTO pin (pin) VALUES (:pin)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':pin', $pin);
        $stmt->execute();

        if (!$sql) {
            $erreur = "ein Fehler  ist aufgetretet";
        } else {
            $msg = "code Pin wurde erstellt";
        }
    } else {
        $erreur = "Sie haben schon einen Code-Pin";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script src="js/sweetalert.js"></script>
    <script src="js/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/pin.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <header>
        <div class="nav container">
            <a href="pin.php"> <i class='bx bx-chevron-left' id="menu-icon"></i> </a>
            <a href="index.html" class="logo">Digitale<span>Anamnesebogen</span></a>
            <a href="#"> </a>

        </div>
    </header>
    <h2>PIN erstellen</h2>
    <div id="regForm">
        <form method="POST">
            <label for="access-pin">Geben Sie einen fünfstelligen PIN ein:</label>
            <input type="password" id="access-pin" maxlength="5" name="pin">
            <button type="submit" id="access-button" name="submit">Speichern</button>
            <!-- <p><a href="pin.php" >sich Anmelden</a></p> -->
            <?php
            if (isset($erreur)) {
                echo "<p  style='background:#DF6762;color:#160101;text-align:center;'>" . $erreur . "</p>";
            }
            ?>

            <?php
            if (isset($msg)) {
                echo "<p  style='background:#55E723;color:#021E01;text-align:center;'>" . $msg . "</p>";
            }
            ?>
        </form>
          
    </div>

</body>

</html>