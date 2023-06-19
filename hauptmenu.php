<?php
//include('navbar.php');

// Inclure la bibliothèque QRcode
include 'C:\Users\saturn\Desktop\cordova\projet\phpqrcode-2010100721_1.1.4\phpqrcode/qrlib.php';

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

// Récupérer les informations depuis la base de données
//$informations = informationsFromDatabase();
if (isset($_GET['id'])) {
  $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

  $sql1 = "SELECT * FROM fiche WHERE id=$id";
  $stat = $pdo->query($sql1);

  $stmt = $pdo->prepare("SELECT * FROM fiche WHERE id = $id");
  //  $stmt->bindParam(':id', $id);
  // $id = 1;
  $stmt->execute();


  // Informationen aus der ersten Ergebniszeile abrufen
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  $name = $row['name'];
$vorname = $row['vorname'];
$dat1 = $row['dat1'];
$straße = $row['straße'];
$hausnummer = $row['hausnummer'];
$postleitzahl = $row['postleitzahl'];
$stadt= $row['stadt'];
$tel = $row['tel'];  
$email = $row['email'];   
$versicherung = $row['versicherung'];
$beruf = $row['beruf'];
$größe = $row['größe'];
$gewicht = $row['gewicht'];  
$geschlecht = $row['geschlecht'];
$beschwerde = $row['beschwerde'];
$anfangsdatum = $row['anfangsdatum'];
$stark = $row['stark'];
$veränderung = $row['veränderung'];
$vorschreibung = $row['vorschreibung'];
$periode = $row['periode'];
$rauchen = $row['rauchen'];
$alkohol = $row['alkohol'];
$drogen = $row['drogen'];
$medikamente = $row['medikamente'];

$tableName= $row['konto'];
  $tableName = str_replace(' ', '', $tableName);

  $sql = "SELECT * FROM $tableName";
  $stat1 = $pdo->query($sql);

  $med = $pdo->prepare("SELECT * FROM $tableName");
  //  $stmt->bindParam(':id', $id);
  // $id = 1;
  $med->execute();
  $medi = $med->fetchAll(PDO::FETCH_ASSOC);

  $idmed = count($medi); 

//   echo "number $idmed";
foreach ($medi as $item) {
$name_medikament[] = $item['name_medikament']; 
$stärke[] = $item['stärke'];
$gestalt[] = $item['gestalt'];
$morgens[] = $item['morgens'];
$mittags[] = $item['mittags'];
$abends[] = $item['abends'];
$nachts[] = $item['nachts'];
$einheit[] = $item['einheit'];
$hinweis[] = $item['hinweis'];
$grund[] = $item['grund'];

}
// echo "number $stärke[1]";

$operation = $row['operation'];
$allergien = $row['allergien'];
$bluthochdruck = $row['bluthochdruck'];
$herzerkrankung = $row['herzerkrankung'];
$diabetes = $row['diabetes'];
$schilddrüse = $row['schilddrüse'];
$blutfette = $row['blutfette'];
$lunge = $row['lunge'];
$digestion = $row['digestion'];
$nervensystem = $row['nervensystem'];
$krebs = $row['krebs'];
$schlaganfall = $row['schlaganfall'];
$herzinfarkt = $row['herzinfarkt'];
$rheumatische = $row['rheumatische'];
$chronische = $row['chronische'];
$infektion = $row['infektion'];
$bluthochdruck1 = $row['bluthochdruck1'];
$koronare = $row['koronare'];
$diabetes1 = $row['diabetes1'];
$blutfette1 = $row['blutfette1'];
$nervensystem1 = $row['nervensystem1'];
$krebs1 = $row['krebs1'];
$schlaganfall1 = $row['schlaganfall1'];
$herzinfarkt1 = $row['herzinfarkt1'];

//   $krank = implode(',' , $beschwerde);
//   $aller = implode(',' , $allergien);
 
 // QR-Code regenerieren 
 $texte_d_entree= "";
 $texte_d_entree .= "Name: " . $name . 
 "\nVorname : " . $vorname .
  "\nGebursdatum : " . $dat1 .
   "\nstraße : " . $straße .
    "\nhausnummer : " . $hausnummer . 
    "\npostleitzahl : " . $postleitzahl . 
    "\nstadt : " . $stadt . 
    "\ntel : " . $tel .
     "\nemail : " . $email .
      "\nversicherung : " . $versicherung .
       "\nberuf : " . $beruf . 
       "\ngröße : " . $größe . 
       "\ngewicht : " . $gewicht .
        "\ngeschlecht : " . $geschlecht .
         "\nbeschwerde : " . $beschwerde . 
         "\nanfangsdatum : " . $anfangsdatum . 
         "\nstark : " . $stark .
          "\nveränderung : " . $veränderung . 
          "\nvorschreibung : " . $vorschreibung .
           "\nperiode : " . $periode .
            "\nrauchen : " . $rauchen .
             "\nalkohol : " . $alkohol . 
             "\ndrogen : " . $drogen . 
             "\nmedikamente : " . $medikamente ;
             if($idmed>0){
             for($i=0; $i<sizeof($name_medikament); $i++){
             $texte_d_entree .= "\nname_medikament : " . $name_medikament[$i] .
              "\nstärke : " . $stärke[$i] . 
              "\ngestalt : " . $gestalt [$i].
               "\nmorgens : " . $morgens[$i] . 
               "\nmittags : " . $mittags[$i] . 
               "\nabends : " . $abends[$i] . 
               "\nnachts : " . $nachts[$i] .
                "\neinheit : " . $einheit[$i] . 
                "\nhinweis : " . $hinweis[$i] .
                 "\ngrund : " . $grund[$i] ; 
                 if($i!= sizeof($name_medikament)){
                    $texte_d_entree .="\n--------------------------------"; 
                 }
             }}
                 $texte_d_entree .= "\noperation : " . $operation . 
                 "\nallergien : " . $allergien . 
                 "\nbluthochdruck : " . $bluthochdruck . 
                 "\nherzerkrankung : " . $herzerkrankung .
                  "\ndiabetes : " . $diabetes .
                   "\nschilddrüse : " . $schilddrüse .
                    "\nblutfette : " . $blutfette . 
                    "\nlunge : " . $lunge . 
                    "\ndigestion : " . $digestion .
                     "\nnervensystem : " . $nervensystem .
                      "\nkrebs : " . $krebs .
                       "\nschlaganfall : " . $schlaganfall .
                        "\nherzinfarkt : " . $herzinfarkt .
                         "\nrheumatische : " . $rheumatische .
                          "\nchronische : " . $chronische . 
                          "\ninfektion : " . $infektion . 
                          "\nbluthochdruck1 : " . $bluthochdruck1 . 
                          "\nkoronare : " . $koronare .
                           "\ndiabetes1 : " . $diabetes1 .
                            "\nblutfette1 : " . $blutfette1 .
                             "\nnervensystem1 : " . $nervensystem1 .
                              "\nkrebs1 : " . $krebs1 . 
                              "\nschlaganfall1 : " . $schlaganfall1 .
                              "\nherzinfarkt1 : " . $herzinfarkt1; 

 QRcode::png($texte_d_entree, 'qrcode.png', QR_ECLEVEL_L, 6, 20);


 if (isset($_POST['reset'])){
    if (isset($_GET['id'])) {
      $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
}
 }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/index.css">
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
            <a href="konto.html" class="logo" >Digitale<span>Anamnesebogen</span></a>
            <a href="#">  </a>	

        </div>
    </header>
    
    <section class="home" id="hauptmenu">
    <div class="image-container">
    <!-- <div class="text">Your information has been saved</div> -->
    <img src="qrcode.png" alt="Mon image" >
    <div class="text">Your information has been saved</div>
    </div> 
        <div class="home-text">
            <?php if($row = $stat->fetch()): ?>
            <a href="formular.php?id=<?= $row['id'] ?>" class="btn"> Formular bearbeiten</a>
            <?php if($row['id']!= 1): ?>
            <a href="delete.php?id=<?= $row['id'] ?>" class="btn" id="delete"> Konto löschen</a>
            <?php endif ?>
            <?php endif ?>

        </div>
    </section>
    <script src="js/script.js"></script>
    
</body>
</html>
