<?php
//include('navbar.php');
// echo 'hello';
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


if (isset($_GET['id'])) {
  $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);




  // if ($stmt !== false) {
  //     $row = $stmt->fetch(PDO::FETCH_ASSOC);
  //     $count = $row['count'];

  //     if ($count > 0) {
  //         echo "Table contains $count elements.";
  //     } else {
  //         echo "Table is empty.";
  //     }
  // } else {
  //     echo "Error occurred while checking the table.";
  // } 
  //ein Tabelle erstellen
  //   "ALTER TABLE <fiche> 
  //     ALTER COLUMN <bechwerde> <ARRAY>";
  //     "ALTER TABLE <fiche> 
  //     ALTER COLUMN <allergien> <ARRAY>;
  // ";

  /*
$table = "CREATE TABLE medikation (
  id INTEGER PRIMARY KEY,
  name_medikament text,
 stärke text,
 gestalt text,
 morgens text,
 mittags text,
 abends text,
 nachts text,
 einheit text,
 hinweis text,
 grund text,
 id-fiche Integer,
 FOREIGN key (id-fiche) REFERENCES fiche(id)
 )";
$pdo->exec($table);
  /*
  $table = "CREATE TABLE fiche (
  id INTEGER PRIMARY KEY,
  konto text,
name text,
vorname text,
dat1 text,
straße text,
hausnummer INTEGER,
postleitzahl INTEGER,
stadt text,
tel text,
email text,
versicherung text,
beruf text,
größe text,
gewicht text,
geschlecht text,
beschwerde text,
anfangsdatum date,
 stark INTEGER,
 veränderung text,
 vorschreibung text,
 periode text,
 rauchen text,
 alkohol text,
 drogen text,
 medikamente text,
 name_medikament text,
 stärke text,
 gestalt text,
 morgens text,
 mittags text,
 abends text,
 nachts text,
 einheit text,
 hinweis text,
 grund text,
 operation text,
 allergien text,
 bluthochdruck text,
 herzerkrankung text,
 diabetes text,
 schilddrüse text,
 blutfette text,
 lunge text,
 digestion text,
 nervensystem text,
 krebs text,
 schlaganfall text,
 herzinfarkt text,
 rheumatische text,
 chronische text,
 infektion text,
 bluthochdruck1 text,
 koronare text,
 diabetes1 text,
  blutfette1 text,
  nervensystem1 text,
  krebs1 text,
  schlaganfall1 text,
  herzinfarkt1 text
  )";
$pdo->exec($table);
  */



  //$table = "DROP TABLE fiche";
  //$pdo->exec($table);
  // Abrufen von Formulardaten
  if (isset($_POST['step']) && $_POST['step'] == "01") {
    $name = $_POST['name'];
    $vorname = $_POST['vorname'];
    $dat1 = $_POST['dat1'];
    $straße = $_POST['straße'];
    $hausnummer = $_POST['hausnummer'];
    $postleitzahl = $_POST['postleitzahl'];
    $stadt = $_POST['stadt'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $versicherung = $_POST['versicherung'];
    $beruf = $_POST['beruf'];
    $größe = $_POST['größe'];
    $gewicht = $_POST['gewicht'];
    $geschlecht = $_POST['geschlecht'];

    // Daten in die Tabelle einzufügen
    $sql = "UPDATE fiche SET  name='$name', vorname='$vorname', dat1='$dat1', straße='$straße', hausnummer='$hausnummer', postleitzahl='$postleitzahl', stadt='$stadt', tel='$tel',  email='$email', versicherung='$versicherung', beruf='$beruf', größe='$größe', gewicht='$gewicht', geschlecht='$geschlecht' WHERE id=$id";
    // --  rauchen='$rauchen', alkohol='$alkohol', drogen='$drogen', medikamente='$medikamente', operation='$operation', allergien='$aller', bluthochdruck='$bluthochdruck', herzerkrankung='$herzerkrankung', diabetes='$diabetes', schilddrüse='$schilddrüse', blutfette='$blutfette', lunge='$lunge', digestion='$digestion', nervensystem='$nervensystem', krebs='$krebs', schlaganfall='$schlaganfall', herzinfarkt='$herzinfarkt', rheumatische='$rheumatische', chronische='$chronische', infektion='$infektion', bluthochdruck1='$bluthochdruck1', koronare='$koronare', diabetes1='$diabetes1', blutfette1='$blutfette1', nervensystem1='$nervensystem1', krebs1='$krebs1', schlaganfall1='$schlaganfall1', herzinfarkt1='$herzinfarkt1' ;
    $pdo->exec($sql);
  }

  if (isset($_POST['step']) && $_POST['step'] == "02") {
    // echo 'okay';
    if (isset($_POST['beschwerde'])) {
      $beschwerde = $_POST['beschwerde'];
    }
    $anfangsdatum = $_POST['anfangsdatum'];
    $stark = $_POST['stark'];
    if (isset($_POST['veränderung'])) {
      $veränderung = $_POST['veränderung'];
    } else {
      $veränderung = "";
    }
    $vorschreibung = $_POST['vorschreibung'];
    $periode = $_POST['periode'];

    $sql = "UPDATE fiche SET beschwerde='$beschwerde', anfangsdatum='$anfangsdatum', stark='$stark', veränderung='$veränderung', vorschreibung='$vorschreibung', periode='$periode' WHERE id=$id";
    $pdo->exec($sql);
  }

  if (isset($_POST['submit'])) {
    // if(isset($_POST['step']) && $_POST['step']=="03"){
    // echo 'okay';
    if (isset($_POST['rauchen'])) {
      $rauchen = $_POST['rauchen'];
    } else {
      $rauchen = "";
    }
    if (isset($_POST['alkohol'])) {
      $alkohol = $_POST['alkohol'];
    } else {
      $alkohol = "";
    }
    if (isset($_POST['drogen'])) {
      $drogen = $_POST['drogen'];
    } else {
      $drogen = "";
    }
    if (isset($_POST['medikamente'])) {
      $medikamente = $_POST['medikamente'];
    } else {
      $medikamente = "";
    }

    if (isset($_POST['name_medikament'])) {

      $tableName = $row['konto'];
      $tableName = str_replace(' ', '', $tableName);
      // $medications = $_POST['medications'];
      $name_medikament = $_POST['name_medikament'];
      $stärke = $_POST['stärke'];
      $gestalt = $_POST['gestalt'];
      $morgens = $_POST['morgens'];
      $mittags = $_POST['mittags'];
      $abends = $_POST['abends'];
      $nachts = $_POST['nachts'];
      $einheit = $_POST['einheit'];
      $hinweis = $_POST['hinweis'];
      $grund = $_POST['grund'];

      // var_dump($name_medikament);
      // die();
      // Delete all records from the table
      $delete = "DELETE FROM $tableName";

      if ($pdo->exec($delete) !== false) {
        // echo "All records deleted successfully.";
      } else {
        // echo "Error occurred while deleting records.";
      }
      // $id_medication = count($medications);
      // echo "the number of medication is $id_medication";
      for ($i = 0; $i < sizeof($name_medikament); $i++) {
        // $name_medikament = $medication['name_medikament'];
        // $stärke = $medication['stärke'];
        // $gestalt = $medication['gestalt'];
        // $morgens = $medication['morgens'];
        // $mittags = $medication['mittags'];
        // $abends = $medication['abends'];
        // $nachts = $medication['nachts'];
        // $einheit = $medication['einheit'];
        // $hinweis = $medication['hinweis'];
        // $grund = $medication['grund'];

        // $sql1 = "UPDATE medikation SET name_medikament='$name_medikament', stärke='$stärke', gestalt='$gestalt', morgens='$morgens', mittags='$mittags', abends='$abends', nachts='$nachts', einheit='$einheit', hinweis='$hinweis', grund='$grund', `id-fiche`=$id WHERE id='$id_medication'";
        $sql = "INSERT INTO $tableName (name_medikament, stärke, gestalt, morgens, mittags, abends, nachts, einheit, hinweis, grund) 
        VALUES (:name_medikament, :stärke, :gestalt, :morgens, :mittags, :abends, :nachts, :einheit, :hinweis, :grund)";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':name_medikament', $name_medikament[$i]);
        $stmt->bindParam(':stärke', $stärke[$i]);
        $stmt->bindParam(':gestalt', $gestalt[$i]);
        $stmt->bindParam(':morgens', $morgens[$i]);
        $stmt->bindParam(':mittags', $mittags[$i]);
        $stmt->bindParam(':abends', $abends[$i]);
        $stmt->bindParam(':nachts', $nachts[$i]);
        $stmt->bindParam(':einheit', $einheit[$i]);
        $stmt->bindParam(':hinweis', $hinweis[$i]);
        $stmt->bindParam(':grund', $grund[$i]);

        if ($stmt->execute()) {
          // '    echo "Insertion successful!";
        } else {
          // echo "Insertion failed: " . $stmt->errorInfo()[2];
        }
      }
    }

    if (isset($_POST['operation'])) {
      $operation = $_POST['operation'];
    } else {
      $operation = "";
    }
    if (isset($_POST['allergien'])) {
      $allergien = $_POST['allergien'];
      $aller = implode(',', $allergien);
    } else {
      $aller = "";
    }

    //   $sql = "UPDATE fiche SET rauchen='$rauchen', alkohol='$alkohol', drogen='$drogen', medikamente='$medikamente', operation='$operation', allergien= '$aller' WHERE id=$id";
    //   $pdo->exec($sql); 

    // }
    if (isset($_POST['bluthochdruck'])) {
      $bluthochdruck = $_POST['bluthochdruck'];
    } else {
      $bluthochdruck = "";
    }
    if (isset($_POST['herzerkrankung'])) {
      $herzerkrankung = $_POST['herzerkrankung'];
    } else {
      $herzerkrankung = "";
    }
    if (isset($_POST['diabetes'])) {
      $diabetes = $_POST['diabetes'];
    } else {
      $diabetes = "";
    }
    if (isset($_POST['schilddrüse'])) {
      $schilddrüse = $_POST['schilddrüse'];
    } else {
      $schilddrüse = "";
    }
    if (isset($_POST['blutfette'])) {
      $blutfette = $_POST['blutfette'];
    } else {
      $blutfette = "";
    }
    if (isset($_POST['lunge'])) {
      $lunge = $_POST['lunge'];
    } else {
      $lunge = "";
    }
    if (isset($_POST['digestion'])) {
      $digestion = $_POST['digestion'];
    } else {
      $digestion = "";
    }
    if (isset($_POST['nervensystem'])) {
      $nervensystem = $_POST['nervensystem'];
    } else {
      $nervensystem = "";
    }
    if (isset($_POST['krebs'])) {
      $krebs = $_POST['krebs'];
    } else {
      $krebs = "";
    }
    if (isset($_POST['schlaganfall'])) {
      $schlaganfall = $_POST['schlaganfall'];
    } else {
      $schlaganfall = "";
    }
    if (isset($_POST['herzinfarkt'])) {
      $herzinfarkt = $_POST['herzinfarkt'];
    } else {
      $herzinfarkt = "";
    }
    if (isset($_POST['rheumatische'])) {
      $rheumatische = $_POST['rheumatische'];
    } else {
      $rheumatische = "";
    }
    if (isset($_POST['chronische'])) {
      $chronische = $_POST['chronische'];
    } else {
      $chronische = "";
    }
    if (isset($_POST['infektion'])) {
      $infektion = $_POST['infektion'];
    } else {
      $infektion = "";
    }
    if (isset($_POST['bluthochdruck1'])) {
      $bluthochdruck1 = $_POST['bluthochdruck1'];
    } else {
      $bluthochdruck1 = "";
    }
    if (isset($_POST['koronare'])) {
      $koronare = $_POST['koronare'];
    } else {
      $koronare = "";
    }
    if (isset($_POST['diabetes1'])) {
      $diabetes1 = $_POST['diabetes1'];
    } else {
      $diabetes1 = "";
    }
    if (isset($_POST['blutfette1'])) {
      $blutfette1 = $_POST['blutfette1'];
    } else {
      $blutfette1 = "";
    }
    if (isset($_POST['nervensystem1'])) {
      $nervensystem1 = $_POST['nervensystem1'];
    } else {
      $nervensystem1 = "";
    }
    if (isset($_POST['krebs1'])) {
      $krebs1 = $_POST['krebs1'];
    } else {
      $krebs1 = "";
    }
    if (isset($_POST['schlaganfall1'])) {
      $schlaganfall1 = $_POST['schlaganfall1'];
    } else {
      $schlaganfall1 = "";
    }
    if (isset($_POST['herzinfarkt1'])) {
      $herzinfarkt1 = $_POST['herzinfarkt1'];
    } else {
      $herzinfarkt1 = "";
    }

    if (isset($beschwerde)) {
      $krank = implode(',', $beschwerde);
    } else {
      $krank = "";
    }
    if (isset($allergien)) {
      $aller = implode(',', $allergien);
    } else {
      $aller = "";
    }

    if (!$name) {
      $erreur = "Name bitte eingeben";
    } elseif (!$vorname) {
      $erreur = "Vorname bitte eingeben";
    } else {
    }
    // Daten in die Tabelle einzufügen
    $sql = "UPDATE fiche SET rauchen='$rauchen', alkohol='$alkohol', drogen='$drogen', medikamente='$medikamente', operation='$operation', allergien='$aller', bluthochdruck='$bluthochdruck', herzerkrankung='$herzerkrankung', diabetes='$diabetes', schilddrüse='$schilddrüse', blutfette='$blutfette', lunge='$lunge', digestion='$digestion', nervensystem='$nervensystem', krebs='$krebs', schlaganfall='$schlaganfall', herzinfarkt='$herzinfarkt', rheumatische='$rheumatische', chronische='$chronische', infektion='$infektion', bluthochdruck1='$bluthochdruck1', koronare='$koronare', diabetes1='$diabetes1', blutfette1='$blutfette1', nervensystem1='$nervensystem1', krebs1='$krebs1', schlaganfall1='$schlaganfall1', herzinfarkt1='$herzinfarkt1' WHERE id=$id";
    $pdo->exec($sql);




    if (!$sql) {
      $erreur = "ein Fehler ist aufgetreten";
    } else {
      $msg =  "Ihr Eintrag wurde erfolgreich gespeichert";
    }
  }
}

/*
$sql1 = "SELECT * FROM users";
$stat = $pdo->query($sql1);
  
while($row = $stat->fetch()){
    echo $row['nom'].'-'.$row['age'].'-'.$row['email'].'<br>';
}

*/

// if (isset($_POST['reset'])){
//   if (isset($_GET['id'])) {
//     $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
//     $sql = "UPDATE fiche SET  name= '' ,  vorname= '' , dat1 = '' , straße = '' ,  hausnummer= '' , postleitzahl = '' , stadt= '' , tel = '' ,  email= '' , versicherung = '' ,  beruf= '' , größe  = '' , gewicht = '' , geschlecht = '' , beschwerde = '' , anfangsdatum = '' , stark = '' , veränderung = '' , vorschreibung = '' , periode = '' , rauchen = '' , alkohol = '' , drogen = '' , medikamente = '' , name_medikament = '' , stärke = '' , gestalt = '' , morgens = '' , mittags = '' , abends = '' , nachts = '' , einheit = '' , Hinweis = '' , grund = '' , operation = '' , allergien = '' , bluthochdruck = '' , herzerkrankung = '' , diabetes = '' , schilddrüse = '' , blutfette = '' , lunge = '' , digestion = '' , nervensystem = '' , krebs = '' , schlaganfall = '' , herzinfarkt = '' , rheumatische = '' , chronische = '' , infektion = '' , bluthochdruck1 = '' , koronare = '' , diabetes1 = '' , blutfette1 = '' , nervensystem1 = '' , krebs1 = '' , schlaganfall1 = '' , herzinfarkt1 = ''  WHERE id=$id"; 
   
//     $pdo->exec($sql);
//     $tableName = $row['konto'];
//     $tableName = str_replace(' ', '', $tableName);
//     $medications = $_POST['medications'];
  
// // Delete all records from the table
// $delete = "DELETE FROM $tableName";

// if ($pdo->exec($delete) !== false) {
//     // echo "All records deleted successfully.";
// } else {
//     // echo "Error occurred while deleting records.";
// }
    
//     if(!$sql){
//       $erreur = "ein Fehler ist aufgetreten";
//     }else{
//       $msg =  " Formular wurde erfolgreich zurückgesetzt";
//     }
// }
// } 
