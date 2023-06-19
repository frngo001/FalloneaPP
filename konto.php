<?php
include('navbar.php');


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

$sql1 = "SELECT * FROM fiche";
$stat = $pdo->query($sql1);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link href="css/style.css" rel="stylesheet">
    <!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <header>
        <div class="nav container">
            <!-- <a href="pin.php"> <i class='bx bx-chevron-left' id="menu-icon"></i> </a>	 -->
            <a href=""> </a>
            <a href="index.html" class="logo">Digitale<span>Anamnesebogen</span></a>
            <a href=""> </a>

        </div>
    </header>

    <section class="home" id="hauptmenu">
        <div class="home-text">
            <h2>Sie sind angemeldet<br><span>Hier können Sie Ihre Konto verwalten</span>. </h2>
            <?php while ($row = $stat->fetch()) : ?>
                <a href="hauptmenu.php?id=<?= $row['id'] ?>" class="btn"><?= $row['konto'] ?>

                </a>

            <?php endwhile ?>
            <a href="neue_konto.php" id="remplace">+ Konto hinzufügen</a>
        </div>
    </section>
    <script src="js/script.js"></script>

</body>

</html>