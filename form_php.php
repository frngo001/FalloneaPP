<?php


//  $taille_d_image = 3; 
//  $erreur_correction = QR_ECLEVEL_L; 
//$code_qr = QRcode::png($texte_d_entree, null,QR_ECLEVEL_L, 6 );

//      // Nom du Fichier
//      $filename = 'QR-Code'.'.png';

//      if (!file_exists($filename)) {
//       ob_start(); 
//       QRcode::png($texte_d_entree, $filename, QR_ECLEVEL_L, 6, 20);
//       $qr_code = ob_get_contents();
//       ob_end_clean();


//        $succes = "Fichier générer💪🎉✨⭐🎊🏆 ";
//      }else{
//        $errors = "Fichier déjà généré ! ❌ ";
//      }

// }



?>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="js/sweetalert.js"></script>
<script src="js/sweetalert.min.js"></script>
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
<script src="js/responsive.js"></script>
<link href="css/style.css" rel="stylesheet">
<link rel="stylesheet" href="css/responsive.css">
<meta charset="utf-8">
<style>

</style>

<body>
  <div class="container">
    <header>
      <div class="nav container">
        <a href="index.html"><i class='bx bx-chevron-left' id="menu-icon"></i> </a>
        <a href="index.html" class="logo">Digitale<span>Anamnesebogen</span></a>

        <a href="">
          <select id="lang-select">
            <option value="de">Deutsch</option>
            <option value="fr">Français</option>
            <option value="en">Englisch</option>
          </select>
        </a>

      </div>
    </header>
    <div class="progress-bar">
      <div class="step">
        <p>Metadaten</p>
        <div class="bullet"><span>1</span></div>
        <div class="check"><i class='bx bx-check'></i></div>
      </div>

      <div class="step">
        <p>Beschwerde</p>
        <div class="bullet"><span>2</span></div>
        <div class="check"><i class='bx bx-check'></i></div>
      </div>

      <div class="step">
        <p> Gewöhnheiten</p>
        <div class="bullet"><span>3</span></div>
        <div class="check"><i class='bx bx-check'></i></div>
      </div>

      <div class="step">
        <p>Familienanamnese</p>
        <div class="bullet"><span>4</span></div>
        <div class="check"><i class='bx bx-check'></i></div>
      </div>

    </div>
    <div class="form-outer">
      <form action="test.php" method="POST">
        <!-- <form id="regForm" method="POST" action="#"> -->
        <!-- <h1>Digitale Anamnesebogen</h1> -->
        <div class="page slidepage">
          <!-- <div class="tab">Metadaten: -->
          <div class="title"> Metadaten:</div>

          <div class="field">
            <label for="name" class="label">Name:</label>
            <input type="text" name="name" id="name">
          </div>

          <div class="field">
            <label for="vorname" class="label">Vorname</label>
            <input type="text" name="vorname" id="vorname">
          </div>

          <div class="field">
            <label for="dat1" class="label">Geburtsdatum</label>
            <input type="date" name="dat1" id="dat1">
          </div>

          <div class="field">
            <label for="straße" class="label">straße:</label>
            <input type="text" name="straße" id="straße">
          </div>


          <div class="field">
            <label for="hausnummer" class="label">Hausnummer</label>
            <input type="number" name="hausnummer" id="hausnummer">
          </div>


          <div class="field">
            <label for="postleitzahl" class="label">postleitzahl</label>
            <input type="text" name="postleitzahl" id="postleitzahl">
          </div>


          <div class="field">
            <label for="stadt" class="label">stadt:</label>
            <input type="text" name="stadt" id="stadt">
          </div>


          <div class="field">
            <label for="tel" class="label">Handynummer</label>
            <input type="text" name="tel" id="tel">
          </div>

          <div class="field">
            <label for="email" class="label">E-Mailadresse</label>
            <input type="email" name="email" id="email">
          </div>


          <div class="field">
            <label for="versicherung" class="label">versicherung:</label>
            <input type="text" name="versicherung" id="versicherung">
          </div>


          <div class="field">
            <label for="beruf" class="label">beruf:</label>
            <input type="text" name="beruf" id="beruf">
          </div>

          <div class="field">
            <label for="größe" class="label">Größe</label>
            <select name="größe" id="größe">
              <option value="">Größe auswählen</option>
            </select>

          </div>


          <div class="field">
            <label for="gewicht" class="label">Gewicht</label>
            <select name="gewicht" id="gewicht">
              <option value="">--Select size--</option>
            </select>

          </div>


          <div class="field">
            <label for="geschlecht" class="label">Geschlecht</label>
            <select name="geschlecht" id="geschlecht">
              <option value="männlich">Männlich</option>
              <option value="weiblich">Weiblich</option>
              <option value="divers">Divers</option>
            </select>
          </div>
          <div class="field nextBtn">
            <button>Weiter</button>
          </div>
        </div>

        <div class="page">
          <div class="title">Beschwerde:</div>

          <label for="beschwerde" class="label"> Welche Beschwerden haben Sie jetzt? </label><br>
          <div class="fieldResponsible" style="width: 95%; height:25rem; overflow-y: scroll; overflow-x: hidden; border: 1px solid black; padding: 1rem;">

            <div class="enter-Value">
              <span>Kopfschmerzen/Migräne</span>
              <input type="checkbox" id="beschwerde1" name="beschwerde[]" value="Kopfschmerzen/Migräne">
            </div>
            <div class="enter-Value">
              <span>Augenschmerzen</span>
              <input type="checkbox" id="beschwerde2" name="beschwerde[]" value="Augenschmerzen">
            </div>
            <div class="enter-Value">
              <span>Zahnschmerzen</span>
              <input type="checkbox" id="beschwerde3" name="beschwerde[]" value="Zahnschmerzen">
            </div>
            <div class="enter-Value">
              <span>Ohrenschmerzen</span>
              <input type="checkbox" id="beschwerde4" name="beschwerde[]" value="Ohrenschmerzen">
            </div>
            <div class="enter-Value">
              <span>Rückenschmerzen</span>
              <input type="checkbox" id="beschwerde5" name="beschwerde[]" value="Rückenschmerzen">
            </div>
            <div class="enter-Value">
              <span>Magenschmerzen</span>
              <input type="checkbox" id="beschwerde6" name="beschwerde[]" value="Magenschmerzen">
            </div>
            <div class="enter-Value">
              <span>Brustschmerzen/Herzbeschwerde</span>
              <input type="checkbox" id="beschwerde7" name="beschwerde[]" value="Brustschmerzen/Herzbeschwerde">
            </div>
            <div class="enter-Value">
              <span>Fieber</span>
              <input type="checkbox" id="beschwerde8" name="beschwerde[]" value="Fieber">
            </div>
            <div class="enter-Value">
              <span>Durchfall</span>
              <input type="checkbox" id="beschwerde9" name="beschwerde[]" value="Durchfall">
            </div>
            <div class="enter-Value">
              <span>Allergie</span>
              <input type="checkbox" id="beschwerde10" name="beschwerde[]" value="Allergie">
            </div>
            <div class="enter-Value">
              <span>Schwindel</span>
              <input type="checkbox" id="beschwerde11" name="beschwerde[]" value="Schwindel">
            </div>
            <div class="enter-Value">
              <span>Depression</span>
              <input type="checkbox" id="beschwerde12" name="beschwerde[]" value="Depression">
            </div>
            <div class="enter-Value">
              <span>Husten</span>
              <input type="checkbox" id="beschwerde13" name="beschwerde[]" value="Husten">
            </div>
            <div class="enter-Value">
              <span>Erkältung</span>
              <input type="checkbox" id="beschwerde14" name="beschwerde[]" value="Erkältung">
            </div>
            <div class="enter-Value">
              <span>Grippe/Influenza</span>
              <input type="checkbox" id="beschwerde15" name="beschwerde[]" value="Grippe/Influenza">
            </div>
            <div class="enter-Value">
              <span>Verletzung/Wunde</span>
              <input type="checkbox" id="beschwerde16" name="beschwerde[]" value="Verletzung/Wunde">
            </div>
            <div class="enter-Value">
              <span>Schlafstörung</span>
              <input type="checkbox" id="beschwerde17" name="beschwerde[]" value="Schlafstörung">
            </div>
            <div class="enter-Value">
              <span>Veränderung der Stühlgang</span>
              <input type="checkbox" id="beschwerde18" name="beschwerde[]" value="Veränderung der Stühlgang">
            </div>
            <div class="enter-Value">
              <span>Erbrechen/Übelkeit</span>
              <input type="checkbox" id="beschwerde19" name="beschwerde[]" value="Erbrechen/Übelkeit">
            </div>
            <div class="enter-Value">
              <span>Bauch/Beckenschmerzen</span>
              <input type="checkbox" id="beschwerde20" name="beschwerde[]" value="Bauch/Beckenschmerzen">
            </div>
            <div class="enter-Value">
              <span>Blutung</span>
              <input type="checkbox" id="beschwerde21" name="beschwerde[]" value="Blutung">
            </div>
            <div class="enter-Value">
              <span>Bradykardie/Tachykardie/Arrhythmie</span>
              <input type="checkbox" id="beschwerde22" name="beschwerde[]" value="Bradykardie/Tachykardie/Arrhythmie">
            </div>
            <div class="enter-Value">
              <span>Auswurf/Atemnot</span>
              <input type="checkbox" id="beschwerde23" name="beschwerde[]" value="Auswurf/Atemnot">
            </div>
            <div class="enter-Value">
              <span>Adipositas</span>
              <input type="checkbox" id="beschwerde24" name="beschwerde[]" value="Adipositas">
            </div>
            <div class="enter-Value">
              <span>Schluckbeschwerde</span>
              <input type="checkbox" id="beschwerde25" name="beschwerde[]" value="Schluckbeschwerde">
            </div>
            <div class="enter-Value">
              <span>Fettstoffwechsel/Cholesterin</span>
              <input type="checkbox" id="beschwerde26" name="beschwerde[]" value="Fettstoffwechsel/Cholesterin">
            </div>
            <div class="enter-Value">
              <span>Gewichtsverlust</span>
              <input type="checkbox" id="beschwerde27" name="beschwerde[]" value="Gewichtsverlust">
            </div>
            <div class="enter-Value">
              <span>Bluthochdruck</span>
              <input type="checkbox" id="beschwerde28" name="beschwerde[]" value="Bluthochdruck">
            </div>
            <div class="enter-Value">
              <span>Sonstiges</span>
              <input type="checkbox" id="beschwerde29" name="beschwerde[]" value="Sonstiges">
            </div>
          </div>


          <div class="field">
            <label for="anfangsdatum" class="label frage">seit wann treten sie auf?</label>
            <input type="date" name="anfangsdatum" id="anfangsdatum" required>
          </div>

          <div class="field">
            <label for="stark" class="label">Wie stark ist die Beschwerde?</label>
            <input type="range" id="stark" name="stark" min="0" max="10" value="50">

          </div>


          <label for="veränderung" class="label frage" style="height:auto; padding-bottom:5rem;">Waren Sie schon wegen Ihre Beschwerden beim Arzt oder zur Apotheke? </label>
          <div class="fieldResponsible vertikal">
            <div class="enter-Value">

              <label for="how-friend" class="side-label">Ja</label>
              <input id="how-friend" name="veränderung" type="radio" checked value="Ja" id="veränderung">
            </div>

            <div class="enter-Value">
              <label for="how-friend" class="side-label">Nein</label>
              <input id="how-friend" name="veränderung" type="radio" checked value="Nein" id="veränderung">

            </div>


          </div>



          <label for="drogen" class="label frage">Nehmen Sie Drogen? </label>
          <div class="fieldResponsible vertikal">
            <div class="enter-Value">
              <label for="how-friend" class="side-label">Ja</label>
              <input id="how-friend" name="drogen" type="radio" checked value="Ja" id="drogen">

            </div>

            <div class="enter-Value">
              <label for="how-friend" class="side-label">Nein</label>
              <input id="how-friend" name="drogen" type="radio" checked value="Nein" id="drogen">



            </div>


          </div>





          <div class="field">
            <label for="vorschreibung" class="label" style="height:auto;"> Wenn ja, welche Medicamenten wurden Vorgeschrieben (genaue Name schreiben) </label>
            <textarea name="vorschreibung" id="vorschreibung"></textarea>
          </div>

          <div class="field">
            <label for="periode" class="top-label label">Wann hatten Sie Ihre letzte Periode (für Frauen)?</label>
            <input type="date" name="periode" id="periode">
          </div>

          <div class="field btns">
            <button class="prev-1 prev">Zurück</button>
            <button class="next-1 next">Weiter</button>

          </div>
        </div>


        <div class="page" id="myForm">
          <div class="title">Gewöhnheiten</div>

          <label for="rauchen" class="label frage"> Rauchen Sie? </label>
          <div class="fieldResponsible vertikal">
            <div class="enter-Value">

              <label for="how-friend" class="side-label">Ja</label>
              <input id="how-friend" name="veränderung" type="radio" value="Ja" id="veränderung">
            </div>

            <div class="enter-Value">
              <label for="how-friend" class="side-label ">Nein</label>
              <input id="how-friend" name="rauchen" type="radio" value="Nein" id="rauchen">

            </div>


          </div>




          <label for="alkohol" class="label frage"> Trinken Sie regelmäßig Alkohol? </label>
          <div class="fieldResponsible vertikal">
            <div class="enter-Value">

              <label for="alkohol" class="label">Ja</label>
              <input id="how-friend" name="alkohol" type="radio" checked value="Ja" id="alkohol">
            </div>

            <div class="enter-Value">
              <label for="how-friend" class="side-label">Nein</label>
              <input id="how-friend" name="alkohol" type="radio" checked value="Nein" id="alkohol">


            </div>


          </div>


          <label for="drogen" class="label frage">Nehmen Sie Drogen? </label>
          <div class="fieldResponsible vertikal">
            <div class="enter-Value">
              <label for="how-friend" class="side-label">Ja</label>
              <input id="how-friend" name="drogen" type="radio" checked value="Ja" id="drogen">

            </div>

            <div class="enter-Value">
              <label for="how-friend" class="side-label">Nein</label>
              <input id="how-friend" name="drogen" type="radio" checked value="Nein" id="drogen">



            </div>


          </div>

          <label for="medikamente" class="label frage">Nehmen Sie regelmäßig Medikamente? </label>
          <div class="fieldResponsible vertikal">
            <div class="enter-Value">
              <label for="how-friend" class="side-label">Ja</label>
              <input id="how-friend" name="medikamente" type="radio" checked value="Ja" id="medikamente">


            </div>

            <div class="enter-Value">
              <label for="how-friend" class="side-label">Nein</labe>
                <input id="how-friend" name="medikamente" type="radio" checked value="Nein" id="medikamente">
            </div>


          </div>

          <div class="field" style='height:auto; overflow-y: scroll; overflow-x: scroll; width:100%'>
            <table id="myTable" style="display: table; overflow-y: scroll; overflow-x: scroll;">
              <thead>
                <tr>
                  <th>Name der Medikament</th>
                  <th>Stärke</th>
                  <th>Gestalt</th>
                  <th>Morgens</th>
                  <th>Mittags</th>
                  <th>Abends</th>
                  <th>Nachts</th>
                  <th>Einheit</th>
                  <th>Hinweis</th>
                  <th>Grund</th>
                </tr>
              </thead>
              <tbody class="all-medications">
                <tr class="medication">
                  <td><input type="text" name="name_medikament[]"></td>
                  <td><input type="text" name="stärke[]"></td>
                  <td><input type="text" name="gestalt[]"></td>
                  <td><input type="number" name="morgens[]"></td>
                  <td><input type="number" name="mittags[]"></td>
                  <td><input type="number" name="abends[]"></td>
                  <td><input type="number" name="nachts[]"></td>
                  <td><input type="text" name="einheit[]"></td>
                  <td><input type="text" name="hinweis[]"></td>
                  <td><input type="text" name="grund[]"></td>
                  <td><button onclick="addRow()">+</button></td>
                </tr>
              </tbody>
            </table>

          </div>

          <label for="operation" class="label titel">Sind sie schon operiert worden? </label>
          <div class="fieldResponsible vertikal">
            <div class="enter-Value">

              <label for="how-friend" class="side-label">Ja</label>
              <input id="how-friend" name="operation" type="radio" checked value="Ja" id="operation">

            </div>

            <div class="enter-Value">

              <label for="how-friend" class="side-label">Nein</label>
              <input id="how-friend" name="operation" type="radio" checked value="Nein" id="operation">

            </div>
          </div>




          <label for="allergien" class="label titel">Haben Sie Allergien?</label>
          <div class="fieldResponsible" style="width: 95%; height:25rem; overflow-y: scroll; overflow-x: hidden; border: 1px solid black; padding: 1rem;">

            <div class="enter-Value">
              <span>keine</span>
              <input type="checkbox" id="allergien1" name="allergien[]" value="keine">
            </div>
            <div class="enter-Value">
              <span>Hausstaubmilbenallergie</span>
              <input type="checkbox" id="allergien2" name="allergien[]" value="">
            </div>
            <div class="enter-Value">
              <span>Tierallergie</span>
              <input type="checkbox" id="allergien3" name="allergien[]" value="">
            </div>
            <div class="enter-Value">
              <span>Polenallergie</span>
              <input type="checkbox" id="allergien4" name="allergien[]" value="">
            </div>
            <div class="enter-Value">
              <span>Nesselsucht</span>
              <input type="checkbox" id="allergien5" name="allergien[]" value="">
            </div>
            <div class="enter-Value">
              <span>Sonnenallergie</span>
              <input type="checkbox" id="allergien6" name="allergien[]" value="">
            </div>
            <div class="enter-Value">
              <span>Kontaktallergie</span>
              <input type="checkbox" id="allergien7" name="allergien[]" value="">
            </div>
            <div class="enter-Value">
              <span>schimmelpilzallergie</span>
              <input type="checkbox" id="allergien8" name="allergien[]" value="">
            </div>
            <div class="enter-Value">
              <span>Insektengiftallergie</span>
              <input type="checkbox" id="allergien9" name="allergien[]" value="">
            </div>
            <div class="enter-Value">
              <span>Nahrungsmittelallergie</span>
              <input type="checkbox" id="allergien10" name="allergien[]" value="">
            </div>
            <div class="enter-Value">
              <span>Histaminunverträglichkeit</span>
              <input type="checkbox" id="allergien11" name="allergien[]" value="">
            </div>
            <div class="enter-Value">
              <span>Sonstigen</span>
              <input type="checkbox" id="allergien12" name="allergien[]" value="">
            </div>
          </div>



          <div class="field btns">
            <button class="prev-2 prev">Zurück</button>
            <button class="next-2 next">Weiter</button>

          </div>
        </div>

        <div class="page">
          <div class="title">Familienanamnese</div>

          <div class="field" style="display: table; padding-top: 2rem;">
            <label for="krankheit" class="label" style="display:block">Leiden Sie an einer oder mehreren der folgenden Beschwerde ? </label>
            <table border="1px">
              <thead>
                <tr>
                  <th>Fragen</th>
                  <th>Ja</th>
                  <th>Nein</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Bluthochdruck</td>
                  <td><input id="how-friend" name="bluthochdruck" type="radio" checked value="Ja" id="bluthochdruck" placeholder="">
                    <label for="how-friend" class="side-label ">ja </label>
                  </td>
                  <td><input id="how-friend" name="bluthochdruck" type="radio" checked value="Nein" id="bluthochdruck" placeholder="">
                    <label for="how-friend" class="side-label">nein</label>
                  </td>

                </tr>
                <tr>
                  <td>Koronare Herzerkrankung</td>
                  <td><input id="how-friend" name="herzerkrankung" type="radio" checked value="Ja" id="herzerkrankung" placeholder="">
                    <label for="how-friend" class="side-label ">Ja</label>
                  </td>
                  <td><input id="how-friend" name="herzerkrankung" type="radio" checked value="Nein" id="herzerkrankung" placeholder="">
                    <label for="how-friend" class="side-label ">Nein</label>
                  </td>
                </tr>
                <tr>
                  <td>Diabetes mellitus</td>
                  <td><input id="how-friend" name="diabetes" type="radio" checked value="Ja" id="diabetes" placeholder="">
                    <label for="how-friend" class="side-label">Ja</label>
                  </td>
                  <td><input id="how-friend" name="diabetes" type="radio" checked value="Nein" id="diabetes" placeholder="">
                    <label for="how-friend" class="side-label">Nein</label>
                  </td>
                </tr>
                <tr>
                  <td>Schilddrüsenunter- / überfunktion</td>
                  <td><input id="how-friend" name="schilddrüse" type="radio" checked value="Ja" id="schilddrüse" placeholder="">
                    <label for="how-friend" class="side-label">Ja</label>
                  </td>
                  <td><input id="how-friend" name="schilddrüse" type="radio" checked value="Nein" id="schilddrüse" placeholder="">
                    <label for="how-friend" class="side-label">Nein</label>
                  </td>
                </tr>
                <tr>
                  <td>Erhöhte Blutfette</td>
                  <td><input id="how-friend" name="blutfette" type="radio" checked value="Ja" id="blutfette" placeholder="">
                    <label for="how-friend" class="side-label">Ja</label>
                  </td>
                  <td><input id="how-friend" name="blutfette" type="radio" checked value="Nein" id="blutfette" placeholder="">
                    <label for="how-friend" class="side-label">Nein</label>
                  </td>
                </tr>
                <tr>
                  <td>Erkrankungen der Lunge</td>
                  <td><input id="how-friend" name="lunge" type="radio" checked value="Ja" id="lunge" placeholder="">
                    <label for="how-friend" class="side-label">Ja</label>
                  </td>
                  <td><input id="how-friend" name="lunge" type="radio" checked value="Nein" id="lunge" placeholder="">
                    <label for="how-friend" class="side-label">Nein</label>
                  </td>
                </tr>
                <tr>
                  <td>Erkrankungen von Magen/Darm/Leber</td>
                  <td><input id="how-friend" name="digestion" type="radio" checked value="Ja" id="digestion" placeholder="">
                    <label for="how-friend" class="side-label">Ja</label>
                  </td>
                  <td><input id="how-friend" name="digestion" type="radio" checked value="Nein" id="digestion" placeholder="">
                    <label for="how-friend" class="side-label">Nein</label>
                  </td>
                </tr>
                <tr>
                  <td>Erkrankugen des Nervensystems oder der Psyche</td>
                  <td><input id="how-friend" name="nervensystem" type="radio" checked value="Ja" id="nervensystem" placeholder="">
                    <label for="how-friend" class="side-label">Ja</label>
                  </td>
                  <td><input id="how-friend" name="nervensystem" type="radio" checked value="Nein" id="nervensystem" placeholder="">
                    <label for="how-friend" class="side-label">Nein</label>
                  </td>
                </tr>
                <tr>
                  <td>haben/hatten Sie Krebserkrankung</td>
                  <td><input id="how-friend" name="krebs" type="radio" checked value="Ja" id="krebs" placeholder="">
                    <label for="how-friend" class="side-label">Ja</label>
                  </td>
                  <td><input id="how-friend" name="krebs" type="radio" checked value="Nein" id="krebs" placeholder="">
                    <label for="how-friend" class="side-label">Nein</label>
                  </td>
                </tr>
                <tr>
                  <td>Hatten Sie schon Schlaganfall</td>
                  <td><input id="how-friend" name="schlaganfall" type="radio" checked value="Ja" id="schlaganfall" placeholder="">
                    <label for="how-friend" class="side-label">Ja</label>
                  </td>
                  <td><input id="how-friend" name="schlaganfall" type="radio" checked value="Nein" id="schlaganfall" placeholder="">
                    <label for="how-friend" class="side-label">Nein</label>
                  </td>
                </tr>
                <tr>
                  <td>Hatten Sie schon Herzinfarkt</td>
                  <td><input id="how-friend" name="herzinfarkt" type="radio" checked value="Ja" id="herzinfarkt" placeholder="">
                    <label for="how-friend" class="side-label">Ja</label>
                  </td>
                  <td><input id="how-friend" name="herzinfarkt" type="radio" checked value="Nein" id="herzinfarkt" placeholder="">
                    <label for="how-friend" class="side-label">Nein</label>
                  </td>
                </tr>
                <tr>
                  <td>Rheumatische Erkrankungen</td>
                  <td><input id="how-friend" name="rheumatische" type="radio" checked value="Ja" id="rheumatische" placeholder="">
                    <label for="how-friend" class="side-label">Ja</label>
                  </td>
                  <td><input id="how-friend" name="rheumatische" type="radio" checked value="Nein" id="rheumatische" placeholder="">
                    <label for="how-friend" class="side-label">Nein</label>
                  </td>
                </tr>
                <tr>
                  <td>Chronischen Erkrankungen</td>
                  <td><input id="how-friend" name="chronische" type="radio" checked value="Ja" id="chronische" placeholder="">
                    <label for="how-friend" class="side-label">Ja</label>
                  </td>
                  <td><input id="how-friend" name="chronische" type="radio" checked value="Nein" id="chronische" placeholder="">
                    <label for="how-friend" class="side-label">Nein</label>
                  </td>
                </tr>
                <tr>
                  <td>Infektionskrankheiten</td>
                  <td><input id="how-friend" name="infektion" type="radio" checked value="Ja" id="infektion" placeholder="">
                    <label for="how-friend" class="side-label">Ja</label>
                  </td>
                  <td><input id="how-friend" name="infektion" type="radio" checked value="Nein" id="infektion" placeholder="">
                    <label for="how-friend" class="side-label">Nein</label>
                  </td>
                </tr>

              </tbody>
            </table>
          </div>

          <div class="field">
            <label for="familie" class="label"> Gibt es folgende Erkrankungen in Ihrer Familie? </label>
            <table border="1px" style="padding-top: 4rem;">
              <thead>
                <tr>
                  <th>Fragen</th>
                  <th>Ja</th>
                  <th>Nein</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Bluthochdruck?</td>
                  <td><input id="how-friend" name="bluthochdruck1" type="radio" checked value="Ja" id="bluthochdruck1" placeholder="">
                    <label for="how-friend" class="side-label">Ja</label>
                  </td>
                  <td><input id="how-friend" name="bluthochdruck1" type="radio" checked value="Nein" id="bluthochdruck1" placeholder="">
                    <label for="how-friend" class="side-label">Nein</label>
                  </td>
                </tr>
                <tr>
                  <td>Koronare Herzerkrankung?</td>
                  <td><input id="how-friend" name="koronare" type="radio" checked value="Ja" id="koronare" placeholder="">
                    <label for="how-friend" class="side-label ">Ja</label>
                  </td>
                  <td><input id="how-friend" name="koronare" type="radio" checked value="Nein" id="koronare" placeholder="">
                    <label for="how-friend" class="side-label ">Nein</label>
                  </td>
                </tr>
                <tr>
                  <td>Diabetes mellitus?</td>
                  <td><input id="how-friend" name="diabetes1" type="radio" checked value="Ja" id="diabetes1" placeholder="">
                    <label for="how-friend" class="side-label">Ja</label>
                  </td>
                  <td><input id="how-friend" name="diabetes1" type="radio" checked value="Nein" id="diabetes1" placeholder="">
                    <label for="how-friend" class="side-label">Nein</label>
                  </td>
                </tr>
                <tr>
                  <td>Erhöhte Blutfette?</td>
                  <td><input id="how-friend" name="blutfette1" type="radio" checked value="Ja" id="blutfette1" placeholder="">
                    <label for="how-friend" class="side-label">Ja</label>
                  </td>
                  <td><input id="how-friend" name="blutfette1" type="radio" checked value="Nein" id="blutfette1" placeholder="">
                    <label for="how-friend" class="side-label ">Nein</label>
                  </td>
                </tr>
                <tr>
                  <td>Erkrankugen des Nervensystems oder der Psyche?</td>
                  <td><input id="how-friend" name="nervensystem1" type="radio" checked value="Ja" id="nervensystem1" placeholder="">
                    <label for="how-friend" class="side-label">Ja</label>
                  </td>
                  <td><input id="how-friend" name="nervensystem1" type="radio" checked value="Nein" id="nervensystem1" placeholder="">
                    <label for="how-friend" class="side-label">Nein</label>
                  </td>
                </tr>
                <tr>
                  <td>Krebserkrankung?</td>
                  <td><input id="how-friend" name="krebs1" type="radio" checked value="Ja" id="krebs1" placeholder="">
                    <label for="how-friend" class="side-label">Ja</label>
                  </td>
                  <td><input id="how-friend" name="krebs1" type="radio" checked value="Nein" id="krebs1" placeholder="">
                    <label for="how-friend" class="side-label">Nein</label>
                  </td>
                </tr>
                <tr>
                  <td> Schlaganfall?</td>
                  <td><input id="how-friend" name="schlaganfall1" type="radio" checked value="Ja" id="schlaganfall1" placeholder="">
                    <label for="how-friend" class="side-label">Ja</label>
                  </td>
                  <td><input id="how-friend" name="schlaganfall1" type="radio" checked value="Nein" id="schlaganfall1" placeholder="">
                    <label for="how-friend" class="side-label">Nein</label>
                  </td>
                </tr>
                <tr>
                  <td> Herzinfarkt?</td>
                  <td><input id="how-friend" name="herzinfarkt1" type="radio" checked value="Ja" id="herzinfarkt1" placeholder="">
                    <label for="how-friend" class="side-label">Ja</label>
                  </td>
                  <td><input id="how-friend" name="herzinfarkt1" type="radio" checked value="Nein" id="herzinfarkt1" placeholder="">
                    <label for="how-friend" class="side-label ">Nein</label>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <div class="field btns">
            <button class="prev-3 prev">Zurück</button>
            <button class="submit" type="submit" name="submit">Speichern</button>


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
          </div>
      </form>
    </div>
    <!-- <a href="<?= $filename; ?>" class="m-5 text-xl font-semibold text-center text-indigo-600 hover:text-purple-600" download> Télécharger </a> -->

  </div>
  <?php
// PHP code...

// Include the HTML file
include '../Digitale_Anamnese/footer.html';

// More PHP code...
?>

  <script src="js/sprache.js"></script>
  <script src="js/main.js"></script>
  <script src="js/formular.js"></script>
</body>


</html>
