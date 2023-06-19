<?php
 
// Inclure la bibliothèque QRcode
include 'C:\Users\saturn\Desktop\cordova\projet\phpqrcode-2010100721_1.1.4\phpqrcode/qrlib.php';


//  Abrufen von Formulardaten
if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $vorname = $_POST['vorname'];
  $dat1 = $_POST['dat1'];
  $straße = $_POST['straße'];
  $hausnummer = $_POST['hausnummer'];
  $postleitzahl = $_POST['postleitzahl'];
  $stadt= $_POST['stadt'];
  $tel = $_POST['tel'];  
  $email = $_POST['email'];   
  $versicherung = $_POST['versicherung'];
  $beruf = $_POST['beruf'];
  $größe = $_POST['größe'];
  $gewicht = $_POST['gewicht'];  
  $geschlecht = $_POST['geschlecht'];
  if(isset($_POST['beschwerde'])){
    $beschwerde = $_POST['beschwerde'];
    $krank = implode(',' , $beschwerde);
    } else{
      $krank = "";

    }
  $anfangsdatum = $_POST['anfangsdatum'];
  $stark = $_POST['stark'];
  $veränderung = $_POST['veränderung'];
  $vorschreibung = $_POST['vorschreibung'];
  $periode = $_POST['periode'];
  $rauchen = $_POST['rauchen'];
  $alkohol = $_POST['alkohol'];
  $drogen = $_POST['drogen'];
  $medikamente = $_POST['medikamente'];
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

  for ($i=0; $i< sizeof($name_medikament); $i++ ) {
   $name_medikament1 = $_POST['name_medikament']; 
   $stärke1 = $_POST['stärke'];
  $gestalt1 = $_POST['gestalt'];
  $morgens1 = $_POST['morgens'];
  $mittags1 = $_POST['mittags'];
  $abends1 = $_POST['abends'];
  $nachts1 = $_POST['nachts'];
  $einheit1 = $_POST['einheit'];
  $hinweis1 = $_POST['hinweis'];
  $grund1 = $_POST['grund'];
  }
  $operation = $_POST['operation'];
  $operation = $_POST['operation'];
  if(isset($_POST['allergien'])){
  $allergien = $_POST['allergien'];
  $aller = implode(',' , $allergien);
  }else{
    $aller="";
  }
  $bluthochdruck = $_POST['bluthochdruck'];
  $herzerkrankung = $_POST['herzerkrankung'];
  $diabetes = $_POST['diabetes'];
  $schilddrüse = $_POST['schilddrüse'];
  $blutfette = $_POST['blutfette'];
  $lunge = $_POST['lunge'];
  $digestion = $_POST['digestion'];
  $nervensystem = $_POST['nervensystem'];
  $krebs = $_POST['krebs'];
  $schlaganfall = $_POST['schlaganfall'];
  $herzinfarkt = $_POST['herzinfarkt'];
  $rheumatische = $_POST['rheumatische'];
  $chronische = $_POST['chronische'];
  $infektion = $_POST['infektion'];
  $bluthochdruck1 = $_POST['bluthochdruck1'];
  $koronare = $_POST['koronare'];
  $diabetes1 = $_POST['diabetes1'];
  $blutfette1 = $_POST['blutfette1'];
  $nervensystem1 = $_POST['nervensystem1'];
  $krebs1 = $_POST['krebs1'];
  $schlaganfall1 = $_POST['schlaganfall1'];
  $herzinfarkt1 = $_POST['herzinfarkt1'];

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
            "\nbeschwerde : " . $krank . 
            "\nanfangsdatum : " . $anfangsdatum . 
            "\nstark : " . $stark .
            "\nveränderung : " . $veränderung . 
            "\nvorschreibung : " . $vorschreibung .
            "\nperiode : " . $periode .
            "\nrauchen : " . $rauchen .
            "\nalkohol : " . $alkohol . 
            "\ndrogen : " . $drogen . 
            "\nmedikamente : " . $medikamente ;
            for($i=0; $i<sizeof($name_medikament); $i++){
              $texte_d_entree .= "\nname_medikament : " . $name_medikament[$i] .
            "\nstärke : " . $stärke1[$i] . 
            "\ngestalt : " . $gestalt1 [$i].
            "\nmorgens : " . $morgens1[$i] . 
            "\nmittags : " . $mittags1[$i] . 
            "\nabends : " . $abends1[$i] . 
            "\nnachts : " . $nachts1[$i] .
            "\neinheit : " . $einheit1[$i] . 
            "\nhinweis : " . $hinweis1[$i] .
            "\ngrund : " . $grund1[$i] ; 
            if($i!= sizeof($name_medikament)){
              $texte_d_entree .="\n--------------------------------"; 
            }
        }
            $texte_d_entree .= "\noperation : " . $operation . 
            "\nallergien : " . $aller . 
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

//Nom du Fichier
     $filename = 'QR-Code'.'.png';

     if (!file_exists($filename)) {
      ob_start(); 
      QRcode::png($texte_d_entree, $filename, QR_ECLEVEL_L, 6, 20);
      $qr_code = ob_get_contents();
      ob_end_clean();

      
       $succes = "Fichier générer💪🎉✨⭐🎊🏆 ";
     }else{
       $errors = "Fichier déjà généré ! ❌ ";
     }

// if (isset($qr_code)) {

//    //echo '<p><img src="images/QR-code.png" alt="QR Code";base64' . base64_encode($qr_code) . '></p>';
//   echo '<img src="QR-Code.png" alt="Mon image" >';
// }
// echo '<a href="' . $filename . '" class="m-5 text-xl font-semibold text-center text-indigo-600 hover:text-purple-600" download> Télécharger </a>';

// // Delete the file after it has been downloaded
// if (file_exists($filename)) {
//     unlink($filename);
// }
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
        <a href="#"> </a>	
            <a href="konto.html" class="logo" >Digitale<span>Anamnesebogen</span></a>
            <a href="#">  </a>	

        </div>
    </header>
    
    <section class="home" id="hauptmenu">
    <div class="image-container">
    <!-- <div class="text">Your information has been saved</div> -->
    <img src="QR-Code.png" alt="Mon image" >
    <div class="text">Your information has been saved</div>
    </div> 
    <?
     echo '<a href="' . $filename . '" class="m-5 text-xl font-semibold text-center text-indigo-600 hover:text-purple-600" download onclick="deleteFile(\'' . $filename . '\')"> Télécharger </a>';

     // JavaScript function to delete the file after download
     echo '<script>
               function deleteFile(filename) {
                   fetch("delete_file.php?filename=" + filename)
                       .then(response => {
                           console.log("File deleted successfully");
                           window.location.href = "form_php.php"; 
                       })
                       .catch(error => {
                           console.error("Error deleting file:", error);
                       });
               }
           </script>';
   ?> 
    </section>
    <script src="js/script.js"></script>
    
</body>
</html>
