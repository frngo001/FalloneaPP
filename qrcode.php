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
$name_medikament = $row['name_medikament']; 
$stärke = $row['stärke'];
$gestalt = $row['gestalt'];
$morgens = $row['morgens'];
$mittags = $row['mittags'];
$abends = $row['abends'];
$nachts = $row['nachts'];
$einheit = $row['einheit'];
$hinweis = $row['hinweis'];
$grund = $row['grund'];
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

$krank = implode(',' , $beschwerde);
  $aller = implode(',' , $allergien);

 // QR-Code regenerieren
 $texte_d_entree = "Name: " . $name . "\nVorname : " . $vorname . "\nGebursdatum : " . $dat1 . "\nstraße : " . $straße . "\nhausnummer : " . $hausnummer . "\npostleitzahl : " . $postleitzahl . "\nstadt : " . $stadt . "\ntel : " . $tel . "\nemail : " . $email . "\nversicherung : " . $versicherung . "\nberuf : " . $beruf . "\ngröße : " . $größe . "\ngewicht : " . $gewicht . "\ngeschlecht : " . $geschlecht . "\nbeschwerde : " . $krank . "\nanfangsdatum : " . $anfangsdatum . "\nstark : " . $stark . "\nveränderung : " . $veränderung . "\nvorschreibung : " . $vorschreibung . "\nperiode : " . $periode . "\nrauchen : " . $rauchen . "\nalkohol : " . $alkohol . "\ndrogen : " . $drogen . "\nmedikamente : " . $medikamente . "\nname_medikament : " . $name_medikament . "\nstärke : " . $stärke . "\ngestalt : " . $gestalt . "\nmorgens : " . $morgens . "\nmittags : " . $mittags . "\nabends : " . $abends . "\nnachts : " . $nachts . "\neinheit : " . $einheit . "\nhinweis : " . $hinweis . "\ngrund : " . $grund . "\noperation : " . $operation . "\nallergien : " . $aller . "\nbluthochdruck : " . $bluthochdruck . "\herzerkrankung : " . $herzerkrankung . "\ndiabetes : " . $diabetes . "\nschilddrüse : " . $schilddrüse . "\nblutfette : " . $blutfette . "\nlunge : " . $lunge . "\ndigestion : " . $digestion . "\nnervensystem : " . $nervensystem . "\nkrebs : " . $krebs . "\nschlaganfall : " . $schlaganfall . "\nherzinfarkt : " . $herzinfarkt . "\nrheumatische : " . $rheumatische . "\nchronische : " . $chronische . "\ninfektion : " . $infektion . "\nbluthochdruck1 : " . $bluthochdruck1 . "\nkoronare : " . $koronare . "\ndiabetes1 : " . $diabetes1 . "\nblutfette1 : " . $blutfette1 . "\nnervensystem1 : " . $nervensystem1 . "\nkrebs1 : " . $krebs1 . "\nschlaganfall1 : " . $schlaganfall1 ."\nherzinfarkt1 : " . $herzinfarkt1; 

  // Schließen der Verbindung zur Datenbank
  $pdo = null;
  $informations = array('Name'=> $name,
  'Vorname'=> $vorname,
   'Geburtsdatum'=> $dat1,
    'Straße' => $straße,
  'Hausnummer'=> $hausnummer,
  'postleitzahl'=> $postleitzahl, 
  'Stadt' => $stadt, 
  'Handynummer' => $tel, 
  'E-Mailadresse'=>$email, 
  'Versicherungsnummer' => $versicherung, 
  'Beruf'=> $beruf, 
  'Größe'=> $größe,
  'Gewicht'=> $gewicht, 
  'Geschlecht'=> $geschlecht,
  'Welche Beschwerden haben Sie jetzt?'=> $beschwerde,
  'seit wann treten sie auf?'=> $anfangsdatum, 
  'Wie stark ist die Beschwerde?'=> $stark,
  'Waren Sie schon wegen Ihre Beschwerden beim Arzt oder zur Apotheke?'=> $veränderung,
  'Wenn ja, welche Medicamenten wurden Vorgeschrieben (genaue Name schreiben):'=> $vorschreibung, 
  'Wann hatten Sie Ihre letzte Periode (für Frauen)?'=> $periode, 
  'Rauchen Sie'=> $rauchen, 
  'Trinken Sie regelmäßig Alkohol?' => $alkohol, 
  'Nehmen Sie Drogen?'=> $drogen, 
  'Nehmen Sie regelmäßig Medikamente?'=> $medikamente, 
  'name der medikament'=> $name_medikament, 
  'Stärke'=> $stärke, 
  'Gestalt'=> $gestalt, 
  'morgens'=>$morgens, 
  'mittags'=> $mittags, 
  'abends'=> $abends, 
  'nachts'=> $nachts, 
  'Einheit'=> $einheit,
  'Hinweis'=> $hinweis, 
  'grund'=> $grund, 
  'Sind sie schon operiert worden?'=>$operation,
  'Haben Sie Allergien?'=> $allergien, 
  'Haben Sie Bluthochdruck'=> $bluthochdruck, 
  'Haben Sie Herzerkrankung'=> $herzerkrankung, 
  'Diabetes mellitus'=> $diabetes, 
  'Schilddrüsenunter- / überfunktion'=>$schilddrüse,
  'Erhöhte Blutfette'=>$blutfette, 
  'Erkrankungen der Lunge'=> $lunge, 
  'Erkrankungen von Magen/Darm/Leber'=> $digestion, 
  'Erkrankugen des Nervensystems oder der Psyche'=> $nervensystem,
  'haben/hatten Sie Krebserkrankung'=> $krebs, 
  'Hatten Sie schon Schlaganfall'=> $schlaganfall, 
  'Hatten Sie schon Herzinfarkt'=> $herzinfarkt,
  'Rheumatische Erkrankungen'=> $rheumatische, 
  'Chronischen Erkrankungen'=> $chronische,
  'Infektionskrankheiten'=> $infektion, 
  'Bluthochdruck?'=> $bluthochdruck1, 
  'Koronare Herzerkrankung?'=> $koronare, 
  'Diabetes mellitus?'=> $diabetes1, 
  'Erhöhte Blutfette?'=> $blutfette1, 
  'Erkrankugen des Nervensystems oder der Psyche?'=> $nervensystem1, 
  'Krebserkrankung?'=> $krebs1, 
  'Schlaganfall?'=> $schlaganfall1, 
  'Herzinfarkt?'=>$herzinfarkt1);

  $json_data = json_encode($informations,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE );

  // Enregistrer les données JSON dans un fichier
file_put_contents('anamnese.json', $json_data);

// Générer le QR code pour le fichier JSON
$url = 'http://localhost:3000/anamnese.json'; // URL du fichier JSON généré
QRcode::png($url, 'qrcode.png', QR_ECLEVEL_L, 6, 20);
// QR-code generieren
//$qr_code = QRcode::png($informations);
// echo '<img src="data:image/png;base64,' . base64_encode("QRcode::png($informations)") . '">';

// QR-code in einer Datei speichern
//QRcode::png($informations, 'path/to/qrcode.png');

 // Affichage du QR-Code dans un paragraphe HTML
//  echo '<p><img src="' . "QRcode::png($informations)" . '"></p>';

// Generate QR code
// ob_start();
// QRcode::png($json_data, 'qrcode.png', QR_ECLEVEL_L, 6, 20);
// $qr_code = ob_get_contents();
// ob_end_clean();
// Display QR code
// echo '<p><img src="data:image/png;base64,' . base64_encode($qr_code) . '"></p>';




/*function informationsFromDatabase()
{
    // verbindung mit Datenbank
    $database = 'db.sqlite';
$dsn = 'sqlite:' . $database;
$username = null;
$password = null;

// verbindung mit Datenbank
try {
    $pdo = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    echo 'Verbindung fehlgeschlagen : ' . $e->getMessage();
}
if (isset($_GET['id'])) {
  $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

  $sql1 = "SELECT * FROM fiche WHERE id=$id";
  $stat = $pdo->query($sql1);
        // $query = "SELECT * FROM fiche WHERE id=$id";
          // Abfrage zum Abrufen von Informationen aus der Tabelle "fiche".
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
  $name_medikament = $row['name_medikament']; 
  $stärke = $row['stärke'];
  $gestalt = $row['gestalt'];
  $morgens = $row['morgens'];
  $mittags = $row['mittags'];
  $abends = $row['abends'];
  $nachts = $row['nachts'];
  $einheit = $row['einheit'];
  $hinweis = $row['hinweis'];
  $grund = $row['grund'];
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


    // Schließen der Verbindung zur Datenbank
    $pdo = null;

    // Informationen als Zeichenkette zurückgeben
   //return "Name:" . $name . "<br/>  größe:". $größe." <br/>  Gewicht:" . $gewicht. "<br/> Sexe:" . $sexe . "<br/> Datum:" . $date;
   //return "Name:" . $name . PHP_EOL . "Größe:". $größe. PHP_EOL . "Gewicht:" . $gewicht. PHP_EOL . "Sexe:" . $sexe . PHP_EOL . "Datum:" . $date;
return "name: " .$name .PHP_EOL. "vorname : " . $vorname .PHP_EOL."dat1 : " . $dat1 .PHP_EOL. "straße : " . $straße .PHP_EOL."hausnummer : " . $hausnummer .PHP_EOL. "postleitzahl : " . $postleitzahl .PHP_EOL. "stadt : " . $stadt . PHP_EOL."tel : " . $tel .PHP_EOL. "email : " . $email .PHP_EOL. "versicherung : " . $versicherung .PHP_EOL . "beruf : " . $beruf .PHP_EOL . "größe : " . $größe .PHP_EOL . "gewicht : " . $gewicht . PHP_EOL ."geschlecht : " . $geschlecht .PHP_EOL. "beschwerde : " . $beschwerde .PHP_EOL. "anfangsdatum : " . $anfangsdatum .PHP_EOL. "stark : " . $stark .PHP_EOL."veränderung : " . $veränderung .PHP_EOL."vorschreibung : " . $vorschreibung .PHP_EOL."periode : " . $periode .PHP_EOL."rauchen : " . $rauchen .PHP_EOL."alkohol : " . $alkohol .PHP_EOL."drogen : " . $drogen .PHP_EOL."medikamente : " . $medikamente .PHP_EOL."name_medikament : " . $name_medikament .PHP_EOL."stärke : " . $stärke .PHP_EOL ."gestalt : " . $gestalt .PHP_EOL ."morgens : " . $morgens .PHP_EOL ."mittags : " . $mittags .PHP_EOL ."abends : " . $abends .PHP_EOL ."nachts : " . $nachts .PHP_EOL ."einheit : " . $einheit .PHP_EOL ."hinweis : " . $hinweis . "\ngrund : " . $grund .PHP_EOL ."operation : " . $operation .PHP_EOL ."allergien : " . $allergien .PHP_EOL ."bluthochdruck : " . $bluthochdruck .PHP_EOL ."herzerkrankung : " . $herzerkrankung .PHP_EOL ."diabetes : " . $diabetes .PHP_EOL ."schilddrüse : " . $schilddrüse .PHP_EOL ."blutfette : " . $blutfette .PHP_EOL ."lunge : " . $lunge .PHP_EOL ."digestion : " . $digestion .PHP_EOL ."nervensystem : " . $nervensystem .PHP_EOL ."krebs : " . $krebs .PHP_EOL ."schlaganfall : " . $schlaganfall .PHP_EOL ."herzinfarkt : " . $herzinfarkt .PHP_EOL ."rheumatische : " . $rheumatische .PHP_EOL ."chronische : " . $chronische .PHP_EOL ."infektion : " . $infektion .PHP_EOL ."bluthochdruck1 : " . $bluthochdruck1 .PHP_EOL ."koronare : " . $koronare .PHP_EOL ."diabetes1 : " . $diabetes1 .PHP_EOL ."blutfette1 : " . $blutfette1 .PHP_EOL ."nervensystem1 : " . $nervensystem1 .PHP_EOL ."krebs1 : " . $krebs1 .PHP_EOL ."schlaganfall1 : " . $schlaganfall1 .PHP_EOL ."herzinfarkt1 : " . $herzinfarkt1; 

}
*/
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
        <?php while($row = $stat->fetch()): ?>

      <a href="hauptmenu.php?id=<?= $row['id'] ?>"><i class='bx bx-chevron-left' id="menu-icon"></i> </a>	
      <?php endwhile ?>

            <a href="konto.html" class="logo" >Digitale<span>Anamnesebogen</span></a>
            <a href="#">  </a>	
           
        </div>
    </header>
    <body>
    <!-- echo '<p><img src="data:image/png;base64,' . base64_encode($qr_code) . '"></p>'; -->
    <div class="image-container">
    <!-- <div class="text">Your information has been saved</div> -->
    <img src="qrcode.png" alt="Mon image" >
    <div class="text">Your information has been saved</div>
    </div>


</body>
</html>