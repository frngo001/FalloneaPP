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

//  Abrufen von Formulardaten
 
// $pdo->exec("ALTER TABLE fiche ADD COLUMN konto TEXT");
//$pdo->exec("INSERT INTO fiche (konto) VALUES ('meine Konto') ");

 //$pdo->exec("UPDATE fiche SET konto = 'meine Konto' WHERE id=1");
// $pdo->exec("DELETE FROM fiche");
if(isset($_POST['submit'])){
    $konto = htmlspecialchars($_POST['konto']);
    if(!$konto){
        $erreur = "Bitte geben Sie einen Name ein !";
    }else{ 
        $test = "SELECT * FROM fiche WHERE konto ='$konto'";
        $stat = $pdo->query($test);
        if ($stat->fetch() == 0) {

 $sql = "INSERT INTO fiche (konto) VALUES (:konto)";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':konto', $konto);
$stmt->execute();
header('location: konto.php');
}else{
    $erreur = "dieses Konto existiert schon";
}

    }
  
 }
      

?>

<!DOCTYPE html>
<html lang="en">
<head>
</head><script src="sweetalert.js"></script>
	<script src="sweetalert.min.js"></script> 
    <link rel="stylesheet" type="text/css" href="css/pin.css">
	<link rel="stylesheet" href="css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
<header>
        <div class="nav container">
        <a href="konto.php"> <i class='bx bx-chevron-left' id="menu-icon"></i> </a>	
            <a href="index.html" class="logo" >Digitale<span>Anamnesebogen</span></a>
            <a href="#">  </a>	
        
        </div>
    </header>
<h2>Neue Konto hinzufügen</h2>
        <div id="regForm" >
        <form method="POST">
          <label for="konto-name">Geben Sie einen Name ein:</label>
          <input type="text"  name="konto">
          <button type="submit"  name="submit">Speichern</button>
          
          <?php
if (isset($erreur)) {
    echo"<p  style='background:#DF6762;color:#160101;text-align:center;'>".$erreur."</p>";
 } 
?>	

<?php
if (isset($msg)) {
 	echo"<p  style='background:#55E723;color:#021E01;text-align:center;'>".$msg."</p>";
 } 
?>	
        </form>
        </div>
    
</body>
</html>
