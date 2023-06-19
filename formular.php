<?
// include ('generer.php')

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


  $sql1 = "SELECT * FROM fiche WHERE id=$id";
  $stat = $pdo->query($sql1);


  $stmt1 = $pdo->prepare("SELECT * FROM fiche WHERE id = $id");
  //  $stmt->bindParam(':id', $id);
  // $id = 1;
  $stmt1->execute();

  // Fetch the data from the database
  $row = $stmt1->fetch(PDO::FETCH_ASSOC);
  $tableName = $row['konto'];
  $tableName = str_replace(' ', '', $tableName);
  // Check if the table exists in the database
  $query = "SELECT name FROM sqlite_master WHERE type='table' AND name='$tableName'";
  $result = $pdo->query($query);

  if ($result->fetch(PDO::FETCH_ASSOC)) {
    // Table exists
    // Proceed with further operations
  } else {
    // Table does not exist
    // Handle the situation accordingly
    $table = "CREATE TABLE `$tableName` (
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
        grund text
        )";
    $pdo->exec($table);
  }


  // Check if the table exists
  $sql = "SELECT COUNT(*) as count FROM $tableName";
  $stmt = $pdo->query($sql);

  // Check if the table exists
  $sqlMed = "SELECT * FROM $tableName";
  $stmtMed = $pdo->query($sqlMed);
}
?>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="js/sweetalert.js"></script>
<script src="js/sweetalert.min.js"></script>
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
<link href="css/style.css" rel="stylesheet">
<meta charset="utf-8">

<body>
  <div class="container">
    <header>
      <div class="nav container">
        <?php while ($row = $stat->fetch()) : ?>
          <a href="hauptmenu.php?id=<?= $row['id'] ?>"><i class='bx bx-chevron-left' id="menu-icon"></i> </a>

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
        <p>Gewöhnheiten</p>
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
      <form id="regForm" method="POST" action="#">
        <!-- <form id="regForm" method="POST" action="#"> -->
        <!-- <h1>Digitale Anamnesebogen</h1> -->
        <div class="page slidepage">
          <!-- <div class="tab">Metadaten: -->
          <div class="title"> Metadaten:</div>

          <div class="field">
            <label for="name" class="label">Name:</label>
            <input type="text" value="<?= $row['name'] ?>" name="name" id="name" onchange="checkInputs()">
            <input type="hidden" value="<?= $row['id'] ?>" name="id_user" id="id_user">
          </div>

          <div class="field">
            <label for="vorname" class="label">Vorname</label>
            <input type="text" value="<?= $row['vorname'] ?>" name="vorname" id="vorname" placeholder="" onchange="checkInputs()">
          </div>

          <div class="field">
            <label for="dat1" class="label">Geburtsdatum</label>
            <input type="date" value="<?= $row['dat1'] ?>" name="dat1" id="dat1" placeholder="" onchange="checkInputs()">
          </div>

          <div class="field">
            <label for="straße" class="label">straße:</label>
            <input type="text" value="<?= $row['straße'] ?>" name="straße" id="straße" placeholder="">
          </div>


          <div class="field">
            <label for="hausnummer" class="label">Hausnummer</label>
            <input type="number" value="<?= $row['hausnummer'] ?>" name="hausnummer" id="hausnummer" placeholder="">
          </div>


          <div class="field">
            <label for="postleitzahl" class="label">Postleitzahl</label>
            <input type="number" value="<?= $row['postleitzahl'] ?>" name="postleitzahl" id="postleitzahl" placeholder="">
          </div>


          <div class="field">
            <label for="stadt" class="label">Stadt:</label>
            <input type="text" value="<?= $row['stadt'] ?>" name="stadt" id="stadt" placeholder="">
          </div>


          <div class="field">
            <label for="tel" class="label">Handynummer</label>
            <input type="number" value="<?= $row['tel'] ?>" name="tel" id="tel" placeholder="">
          </div>

          <div class="field">
            <label for="email" class="label">E-Mailadresse</label>
            <input type="email" value="<?= $row['email'] ?>" name="email" id="email" placeholder="">
          </div>


          <div class="field">
            <label for="versicherung" class="label">versicherung:</label>
            <input type="text" value="<?= $row['versicherung'] ?>" name="versicherung" id="versicherung" placeholder="" onchange="checkInputs()">
          </div>


          <div class="field">
            <label for="beruf" class="label">beruf:</label>
            <input type="text" value="<?= $row['beruf'] ?>" name="beruf" id="beruf" placeholder="">
          </div>

          <div class="field">
            <label for="größe" class="label">Größe</label>
            <select name="größe" id="größe" placeholder="">
              <option><?= $row['größe'] ?></option>
              <option value="">Größe auswählen</option>
            </select>

          </div>


          <div class="field">
            <label for="gewicht" class="label">Gewicht</label>
            <select name="gewicht" id="gewicht" placeholder="">
              <option><?= $row['gewicht'] ?></option>
              <option value="">--Select size--</option>
            </select>

          </div>


          <div class="field">
            <label for="geschlecht" class="label">Geschlecht</label>
            <select name="geschlecht" id="geschlecht" placeholder="">
              <option><?= $row['geschlecht'] ?></option>
              <option value="männlich">Männlich</option>
              <option value="weiblich">Weiblich</option>
              <option value="divers">Divers</option>
            </select>
          </div>
          <div>
            <label for="erro" name="error" style="color: red;"> Sie müssen alle Pflichtfelder ausfüllen</label>

          </div>
          <div class="field nextBtn">
            <button id="submitBtn" disabled>weiter</button>
          </div>
        </div>

        <div class="page">
          <div class="title">Beschwerde:</div>
          <label for="beschwerde" class="label"> Welche Beschwerden haben Sie jetzt? </label><br>
          <div class="field" style="display:flex; flex-direction: column; height:25rem; overflow-y: scroll; overflow-x: hidden; border: 1px solid black; padding: 1rem;">
            Kopfschmerzen/ Migräne <input type="checkbox" id="beschwerde" name="beschwerde[]" value="Kopfschmerzen/Migräne" <?php if (in_array('Kopfschmerzen/Migräne', explode(',', $row['beschwerde']))) echo 'checked'; ?>><br>
            Augenschmerzen <input type="checkbox" id="beschwerde" name="beschwerde[]" value="Augenschmerzen" <?php if (in_array('Augenschmerzen', explode(',', $row['beschwerde']))) echo 'checked'; ?>><br>
            Zahnschmerzen <input type="checkbox" id="beschwerde" name="beschwerde[]" value="Zahnschmerzen" <?php if (in_array('Zahnschmerzen', explode(',', $row['beschwerde']))) echo 'checked'; ?>><br>
            Ohrenschmerzen <input type="checkbox" id="beschwerde" name="beschwerde[]" value="Ohrenschmerzen" <?php if (in_array('Ohrenschmerzen', explode(',', $row['beschwerde']))) echo 'checked'; ?>><br>
            Rückenschmerzen <input type="checkbox" id="beschwerde" name="beschwerde[]" value="Rückenschmerzen" <?php if (in_array('Rückenschmerzen', explode(',', $row['beschwerde']))) echo 'checked'; ?>><br>
            magenschmerzen <input type="checkbox" id="beschwerde" name="beschwerde[]" value="magenschmerzen" <?php if (in_array('magenschmerzen', explode(',', $row['beschwerde']))) echo 'checked'; ?>><br>
            Brustschmerzen/Herzbeschwerde <input type="checkbox" id="beschwerde" name="beschwerde[]" value="Brustschmerzen/Herzbeschwerde" <?php if (in_array('Brustschmerzen/Herzbeschwerde', explode(',', $row['beschwerde']))) echo 'checked'; ?>><br>
            Fieber <input type="checkbox" id="beschwerde" name="beschwerde[]" value="fieber" <?php if (in_array('fieber', explode(',', $row['beschwerde']))) echo 'checked'; ?>><br>
            Durchfall <input type="checkbox" id="beschwerde" name="beschwerde[]" value="Durchfall" <?php if (in_array('Durchfall', explode(',', $row['beschwerde']))) echo 'checked'; ?>><br>
            Allergie <input type="checkbox" id="beschwerde" name="beschwerde[]" value="Allergie" <?php if (in_array('Allergie', explode(',', $row['beschwerde']))) echo 'checked'; ?>><br>
            Schwindel <input type="checkbox" id="beschwerde" name="beschwerde[]" value="Schwindel" <?php if (in_array('Schwindel', explode(',', $row['beschwerde']))) echo 'checked'; ?>><br>
            Depression <input type="checkbox" id="beschwerde" name="beschwerde[]" value="Depression" <?php if (in_array('Depression', explode(',', $row['beschwerde']))) echo 'checked'; ?>><br>
            Husten <input type="checkbox" id="beschwerde" name="beschwerde[]" value="Husten" <?php if (in_array('Husten', explode(',', $row['beschwerde']))) echo 'checked'; ?>><br>
            Erkältung <input type="checkbox" id="beschwerde" name="beschwerde[]" value="Erkältung" <?php if (in_array('Erkältung', explode(',', $row['beschwerde']))) echo 'checked'; ?>><br>
            Grippe/Influenza <input type="checkbox" id="beschwerde" name="beschwerde[]" value="Grippe/Influenza" <?php if (in_array('Grippe/Influenza', explode(',', $row['beschwerde']))) echo 'checked'; ?>><br>
            verletzung/wunde <input type="checkbox" id="beschwerde" name="beschwerde[]" value="Verletzung/wunde" <?php if (in_array('Verletzung/wunde', explode(',', $row['beschwerde']))) echo 'checked'; ?>><br>
            Schlafstörung <input type="checkbox" id="beschwerde" name="beschwerde[]" value="Schlafstörung" <?php if (in_array('Schlafstörung', explode(',', $row['beschwerde']))) echo 'checked'; ?>><br>
            Veränderung der Stühlgang <input type="checkbox" id="beschwerde" name="beschwerde[]" value="Veränderung der Stühlgang" <?php if (in_array('Veränderung der Stühlgang', explode(',', $row['beschwerde']))) echo 'checked'; ?>><br>
            Erbrechen / Übelkeit <input type="checkbox" id="beschwerde" name="beschwerde[]" value="Erbrechen/Übelkeit" <?php if (in_array('Erbrechen/Übelkeit', explode(',', $row['beschwerde']))) echo 'checked'; ?>><br>
            Bauch/Beckenschmerzen <input type="checkbox" id="beschwerde" name="beschwerde[]" value="Bauch/Beckenschmerzen" <?php if (in_array('Bauch/Beckenschmerzen', explode(',', $row['beschwerde']))) echo 'checked'; ?>><br>
            Blutung<input type="checkbox" id="beschwerde" name="beschwerde[]" value="Blutung" <?php if (in_array('Blutung', explode(',', $row['beschwerde']))) echo 'checked'; ?>><br>
            Bradykardie/Tachykardie/Arrhythmie <input type="checkbox" id="beschwerde" name="beschwerde[]" value="Bradykardie/Tachykardie/Arrhythmie" <?php if (in_array('Bradykardie/Tachykardie/Arrhythmie', explode(',', $row['beschwerde']))) echo 'checked'; ?>><br>
            Auswurf/ Atemnot <input type="checkbox" id="beschwerde" name="beschwerde[]" value="Auswurf/ Atemnot" <?php if (in_array('Auswurf/ Atemnot', explode(',', $row['beschwerde']))) echo 'checked'; ?>><br>
            Adipositas <input type="checkbox" id="beschwerde" name="beschwerde[]" value="Adipositas" <?php if (in_array('Adipositas', explode(',', $row['beschwerde']))) echo 'checked'; ?>><br>
            Schluckbeschwerde <input type="checkbox" id="beschwerde" name="beschwerde[]" value="Schluckbeschwerde" <?php if (in_array('Schluckbeschwerde', explode(',', $row['beschwerde']))) echo 'checked'; ?>><br>
            Fettstoffwechsel/ Cholesterin <input type="checkbox" id="beschwerde" name="beschwerde[]" value="Fettstoffwechsel/ Cholesterin" <?php if (in_array('Fettstoffwechsel/ Cholesterin', explode(',', $row['beschwerde']))) echo 'checked'; ?>><br>
            Gewichtsverlust <input type="checkbox" id="beschwerde" name="beschwerde[]" value="Gewichtsverlust" <?php if (in_array('Gewichtsverlust', explode(',', $row['beschwerde']))) echo 'checked'; ?>><br>
            Bluthochdruck <input type="checkbox" id="beschwerde" name="beschwerde[]" value="Bluthochdruck" <?php if (in_array('Bluthochdruck', explode(',', $row['beschwerde']))) echo 'checked'; ?>><br>
            Sonstiges <input type="checkbox" id="beschwerde" name="beschwerde[]" value="Sonstiges" <?php if (in_array('Sonstiges', explode(',', $row['beschwerde']))) echo 'checked'; ?>><br> -->

          </div>

          <div class="field">
            <label for="anfangsdatum" class="label">seit wann treten sie auf?</label>
            <input type="date" value="<?= $row['anfangsdatum'] ?>" name="anfangsdatum" id="anfangsdatum" placeholder="">
            <span class="error" id="errordatum"></span>
          </div>

          <div class="field">
            <label for="stark" class="label">Wie stark ist die Beschwerde?</label>
            <input type="range" id="stark" name="stark" placeholder="" min="0" max="10" value="<?= $row['stark'] ?>">

          </div>

          <div class="field">
            <label for="veränderung" class="label">Waren Sie schon wegen Ihre Beschwerden beim Arzt?</label><br>
            <input id="veränderung" name="veränderung" type="radio" value="ja" <?php if ($row['veränderung'] == 'ja') echo 'checked'; ?>>
            <label for="how-friend" class="side-label">Ja</label>
            <input id="veränderung" name="veränderung" type="radio" value="nein" <?php if ($row['veränderung'] == 'nein') echo 'checked'; ?>>
            <label for="how-friend" class="side-label">Nein</label>
          </div>

          <div class="field">
            <label for="vorschreibung" class="label"> Wenn ja, welche Medicamenten wurden Vorgeschrieben (genaue Name schreiben) </label>
            <textarea name="vorschreibung" value="<?= $row['vorschreibung'] ?>" id="vorschreibung" placeholder=""></textarea>
          </div>

          <div class="field">
            <label for="periode" class="top-label label">Wann hatten Sie Ihre letzte Periode (für Frauen)?</label>
            <input type="date" value="<?= $row['periode'] ?>" name="periode" id="periode" placeholder="">
          </div>

          <div class="field btns">
            <button class="prev-1 prev">Zurück</button>
            <button class="next-1 next">Weiter</button>

          </div>
        </div>


        <div class="page" id="myForm">
          <div class="title">Gewöhnheiten:</div>

          <div class="field">
            <label for="rauchen" class="label">Rauchen Sie?</label>
            <input id="rauchen" name="rauchen" type="radio" value="ja" <?php if ($row['rauchen'] == 'ja') echo 'checked'; ?>>
            <label for="how-friend" class="side-label">Ja</label>
            <input id="rauchen" name="rauchen" type="radio" value="nein" <?php if ($row['rauchen'] == 'nein') echo 'checked'; ?>>
            <label for="how-friend" class="side-label">Nein</label>
          </div>

          <div class="field">
            <label for="alkohol" class="label">Trinken Sie regelmäßig Alkohol? </label>
            <input id="alkohol" name="alkohol" type="radio" value="ja" <?php if ($row['alkohol'] == 'ja') echo 'checked'; ?>>
            <label for="how-friend" class="side-label">Ja</label>
            <input id="alkohol" name="alkohol" type="radio" value="nein" <?php if ($row['alkohol'] == 'nein') echo 'checked'; ?>>
            <label for="how-friend" class="side-label">Nein</label>
          </div>

          <div class="field">
            <label for="drogen" class="label">Nehmen Sie Drogen? </label>
            <input id="drogen" name="drogen" type="radio" value="ja" <?php if ($row['drogen'] == 'ja') echo 'checked'; ?>>
            <label for="how-friend" class="side-label">Ja</label>
            <input id="drogen" name="drogen" type="radio" value="nein" <?php if ($row['drogen'] == 'nein') echo 'checked'; ?>>
            <label for="how-friend" class="side-label">Nein</label>
          </div>

          <div class="field">
            <label for="medikamente" class="label">Nehmen Sie regelmäßig Medikamente? </label>
            <input id="medikamente" name="medikamente" type="radio" value="ja" <?php if ($row['medikamente'] == 'ja') echo 'checked'; ?>>
            <label for="how-friend" class="side-label">Ja</label>
            <input id="medikamente" name="medikamente" type="radio" value="nein" <?php if ($row['medikamente'] == 'nein') echo 'checked'; ?>>
            <label for="how-friend" class="side-label">Nein</labe>
          </div>


          <div class="field" style='height:auto'>

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
                <?
                if ($stmt !== false) {
                  $temp = $stmt->fetchColumn();
                  if ($temp > 0) {
                    // Check if there are any records
                    while ($med = $stmtMed->fetch(PDO::FETCH_ASSOC)) {
                      $id = $med['id'] - 1;
                      echo '    <tr class="medication"> ';
                      echo '<td><input type="text" value="' . $med['name_medikament'] . '" name="medications[' . $id . '][name_medikament]" placeholder="" class="styled-input"></td>';
                      echo '<td><input type="text" value="' . $med['stärke'] . '" name="medications[' . $id . '][stärke]" placeholder="" style="background-color: yellow;"></td>';
                      echo '<td><input type="text" value="' . $med['gestalt'] . '" name="medications[' . $id . '][gestalt]" placeholder=""></td>';
                      echo '<td><input type="text" value="' . $med['morgens'] . '" name="medications[' . $id . '][morgens]" placeholder=""></td>';
                      echo '<td><input type="text" value="' . $med['mittags'] . '" name="medications[' . $id . '][mittags]" placeholder="" class="styled-input"></td>';
                      echo '<td><input type="text" value="' . $med['abends'] . '" name="medications[' . $id . '][abends]" placeholder=""></td>';
                      echo '<td><input type="text" value="' . $med['nachts'] . '" name="medications[' . $id . '][nachts]" placeholder="" style="font-weight: bold;"></td>';
                      echo '<td><input type="text" value="' . $med['einheit'] . '" name="medications[' . $id . '][einheit]" placeholder=""></td>';
                      echo '<td><input type="text" value="' . $med['hinweis'] . '" name="medications[' . $id . '][hinweis]" placeholder=""></td>';
                      echo '<td><input type="text" value="' . $med['grund'] . '" name="medications[' . $id . '][grund]" placeholder="" class="styled-input"></td>';


                      if ($id == 0) {
                        echo '<td><button onclick="addRow()" class="styled-button">+</button></td>';
                      } else {
                        echo '<td><button onclick="removeRow(this)">-</button></td>';
                      }
                      echo '</tr>';
                    }
                  } else {

                    echo '<td><input type="text" name="name_medikament[]" placeholder=""></td>';
                    echo '<td><input type="text" name="stärke[]" placeholder=""></td>';
                    echo '<td><input type="text" name="gestalt[]" placeholder=""></td>';
                    echo '<td><input type="text" name="morgens[]" placeholder=""></td>';
                    echo '<td><input type="text" name="mittags[]" placeholder=""></td>';
                    echo '<td><input type="text" name="abends[]" placeholder=""></td>';
                    echo '<td><input type="text" name="nachts[]" placeholder=""></td>';
                    echo '<td><input type="text" name="einheit[]" placeholder=""></td>';
                    echo '<td><input type="text" name="hinweis[]" placeholder=""></td>';
                    echo '<td><input type="text" name="grund[]" placeholder=""></td>';
                    echo '<td><button onclick="addRow()">+</button></td>';
                    echo '</tr>';
                  }
                }

                ?>
              </tbody>
            </table>

          </div>
          <br>
          <br>
          <div class="field">
            <label for="operation" class="label">Sind sie schon operiert worden? </label>
            <input id="operation" name="operation" type="radio" value="ja" <?php if ($row['operation'] == 'ja') echo 'checked'; ?>>
            <label for="how-friend" class="side-label">Ja</label>
            <input id="operation" name="operation" type="radio" value="nein" <?php if ($row['operation'] == 'nein') echo 'checked'; ?>>
            <label for="how-friend" class="side-label">Nein</label>
          </div>

          <label for="allergien" class="label">Haben Sie Allergien?</label><br>
          <div class="field" style="display:flex; flex-direction: column; height:25rem; overflow-y: scroll; overflow-x: hidden; border: 1px solid black; padding: 1rem;">
            keine <input type="checkbox" id="allergien" name="allergien[]" value="keine" <?php if (in_array('keine', explode(',', $row['allergien']))) echo 'checked'; ?>><br>
            Hausstaubmilbenallergie <input type="checkbox" id="allergien" name="allergien[]" value="Hausstaubmilbenallergie" <?php if (in_array('Hausstaubmilbenallergie', explode(',', $row['allergien']))) echo 'checked'; ?>><br>
            Tierallergie <input type="checkbox" id="allergien" name="allergien[]" value="Tierallergie" <?php if (in_array('Tierallergie', explode(',', $row['allergien']))) echo 'checked'; ?>><br>
            Polenallergie <input type="checkbox" id="allergien" name="allergien[]" value="Polenallergie" <?php if (in_array('Polenallergie', explode(',', $row['allergien']))) echo 'checked'; ?>><br>
            Nesselsucht <input type="checkbox" id="allergien" name="allergien[]" value="Nesselsucht" <?php if (in_array('Nesselsucht', explode(',', $row['allergien']))) echo 'checked'; ?>><br>
            Sonnenallergie <input type="checkbox" id="allergien" name="allergien[]" value="Sonnenallergie" <?php if (in_array('Sonnenallergie', explode(',', $row['allergien']))) echo 'checked'; ?>><br>
            Kontaktallergie <input type="checkbox" id="allergien" name="allergien[]" value="Kontaktallergie" <?php if (in_array('Kontaktallergie', explode(',', $row['allergien']))) echo 'checked'; ?>><br>
            schimmelpilzallergie <input type="checkbox" id="allergien" name="allergien[]" value="schimmelpilzallergie" <?php if (in_array('schimmelpilzallergie', explode(',', $row['allergien']))) echo 'checked'; ?>><br>
            Insektengiftallergie <input type="checkbox" id="allergien" name="allergien[]" value="Insektengiftallergie" <?php if (in_array('Insektengiftallergie', explode(',', $row['allergien']))) echo 'checked'; ?>><br>
            Nahrungsmittelallergie <input type="checkbox" id="allergien" name="allergien[]" value="Nahrungsmittelallergie" <?php if (in_array('Nahrungsmittelallergie', explode(',', $row['allergien']))) echo 'checked'; ?>><br>
            Histaminunverträglichkeit <input type="checkbox" id="allergien" name="allergien[]" value="Histaminunverträglichkeit" <?php if (in_array('Histaminunverträglichkeit', explode(',', $row['allergien']))) echo 'checked'; ?>><br>
            Sonstigen <input type="checkbox" id="allergien" name="allergien[]" value="Sonstigen" <?php if (in_array('Sonstigen', explode(',', $row['allergien']))) echo 'checked'; ?>><br>
          </div>

          <div class="field btns">
            <button class="prev-2 prev">Zurück</button>
            <button class="next-2 next">Weiter</button>

          </div>
        </div>

        <div class="page">
          <div class="title">Familienanamnese</div>

          <div class="field" style="display: table;">
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
                  <td><input id="how-friend" name="bluthochdruck" type="radio" value="ja" <?php if ($row['bluthochdruck'] == 'ja') echo 'checked'; ?>>
                    <label for="how-friend" class="side-label ">ja </label>
                  </td>
                  <td><input id="how-friend" name="bluthochdruck" type="radio" value="nein" <?php if ($row['bluthochdruck'] == 'nein') echo 'checked'; ?>>
                    <label for="how-friend" class="side-label">nein</label>
                  </td>

                </tr>
                <tr>
                  <td>Koronare Herzerkrankung</td>
                  <td><input id="how-friend" name="herzerkrankung" type="radio" value="ja" <?php if ($row['herzerkrankung'] == 'ja') echo 'checked'; ?>>
                    <label for="how-friend" class="side-label ">Ja</label>
                  </td>
                  <td><input id="how-friend" name="herzerkrankung" type="radio" value="nein" <?php if ($row['herzerkrankung'] == 'nein') echo 'checked'; ?>>
                    <label for="how-friend" class="side-label ">Nein</label>
                  </td>
                </tr>
                <tr>
                  <td>Diabetes mellitus</td>
                  <td><input id="how-friend" name="diabetes" type="radio" value="ja" <?php if ($row['diabetes'] == 'ja') echo 'checked'; ?>>
                    <label for="how-friend" class="side-label">Ja</label>
                  </td>
                  <td><input id="how-friend" name="diabetes" type="radio" value="nein" <?php if ($row['diabetes'] == 'nein') echo 'checked'; ?>>
                    <label for="how-friend" class="side-label">Nein</label>
                  </td>
                </tr>
                <tr>
                  <td>Schilddrüsenunter- / überfunktion</td>
                  <td><input id="how-friend" name="schilddrüse" type="radio" value="ja" <?php if ($row['schilddrüse'] == 'ja') echo 'checked'; ?>>
                    <label for="how-friend" class="side-label">Ja</label>
                  </td>
                  <td><input id="how-friend" name="schilddrüse" type="radio" value="nein" <?php if ($row['schilddrüse'] == 'nein') echo 'checked'; ?>>
                    <label for="how-friend" class="side-label">Nein</label>
                  </td>
                </tr>
                <tr>
                  <td>Erhöhte Blutfette</td>
                  <td><input id="how-friend" name="blutfette" type="radio" value="ja" <?php if ($row['blutfette'] == 'ja') echo 'checked'; ?>>
                    <label for="how-friend" class="side-label">Ja</label>
                  </td>
                  <td><input id="how-friend" name="blutfette" type="radio" value="nein" <?php if ($row['blutfette'] == 'nein') echo 'checked'; ?>>
                    <label for="how-friend" class="side-label">Nein</label>
                  </td>
                </tr>
                <tr>
                  <td>Erkrankungen der Lunge</td>
                  <td><input id="how-friend" name="lunge" type="radio" value="ja" <?php if ($row['lunge'] == 'ja') echo 'checked'; ?>>
                    <label for="how-friend" class="side-label">Ja</label>
                  </td>
                  <td><input id="how-friend" name="lunge" type="radio" value="nein" <?php if ($row['lunge'] == 'nein') echo 'checked'; ?>>
                    <label for="how-friend" class="side-label">Nein</label>
                  </td>
                </tr>
                <tr>
                  <td>Erkrankungen von Magen/Darm/Leber</td>
                  <td><input id="how-friend" name="digestion" type="radio" value="ja" <?php if ($row['digestion'] == 'ja') echo 'checked'; ?>>
                    <label for="how-friend" class="side-label">Ja</label>
                  </td>
                  <td><input id="how-friend" name="digestion" type="radio" value="nein" <?php if ($row['digestion'] == 'nein') echo 'checked'; ?>>
                    <label for="how-friend" class="side-label">Nein</label>
                  </td>
                </tr>
                <tr>
                  <td>Erkrankugen des Nervensystems oder der Psyche</td>
                  <td><input id="how-friend" name="nervensystem" type="radio" value="ja" <?php if ($row['nervensystem'] == 'ja') echo 'checked'; ?>>
                    <label for="how-friend" class="side-label">Ja</label>
                  </td>
                  <td><input id="how-friend" name="nervensystem" type="radio" value="nein" <?php if ($row['nervensystem'] == 'nein') echo 'checked'; ?>>
                    <label for="how-friend" class="side-label">Nein</label>
                  </td>
                </tr>
                <tr>
                  <td>haben/hatten Sie Krebserkrankung</td>
                  <td><input id="how-friend" name="krebs" type="radio" value="ja" <?php if ($row['krebs'] == 'ja') echo 'checked'; ?>>
                    <label for="how-friend" class="side-label">Ja</label>
                  </td>
                  <td><input id="how-friend" name="krebs" type="radio" value="nein" <?php if ($row['krebs'] == 'nein') echo 'checked'; ?>>
                    <label for="how-friend" class="side-label">Nein</label>
                  </td>
                </tr>
                <tr>
                  <td>Hatten Sie schon Schlaganfall</td>
                  <td><input id="how-friend" name="schlaganfall" type="radio" value="ja" <?php if ($row['schlaganfall'] == 'ja') echo 'checked'; ?>>
                    <label for="how-friend" class="side-label">Ja</label>
                  </td>
                  <td><input id="how-friend" name="schlaganfall" type="radio" value="nein" <?php if ($row['schlaganfall'] == 'nein') echo 'checked'; ?>>
                    <label for="how-friend" class="side-label">Nein</label>
                  </td>
                </tr>
                <tr>
                  <td>Hatten Sie schon Herzinfarkt</td>
                  <td><input id="how-friend" name="herzinfarkt" type="radio" value="ja" <?php if ($row['herzinfarkt'] == 'ja') echo 'checked'; ?>>
                    <label for="how-friend" class="side-label">Ja</label>
                  </td>
                  <td><input id="how-friend" name="herzinfarkt" type="radio" value="nein" <?php if ($row['herzinfarkt'] == 'nein') echo 'checked'; ?>>
                    <label for="how-friend" class="side-label">Nein</label>
                  </td>
                </tr>
                <tr>
                  <td>Rheumatische Erkrankungen</td>
                  <td><input id="how-friend" name="rheumatische" type="radio" value="ja" <?php if ($row['rheumatische'] == 'ja') echo 'checked'; ?>>
                    <label for="how-friend" class="side-label">Ja</label>
                  </td>
                  <td><input id="how-friend" name="rheumatische" type="radio" value="nein" <?php if ($row['rheumatische'] == 'nein') echo 'checked'; ?>>
                    <label for="how-friend" class="side-label">Nein</label>
                  </td>
                </tr>
                <tr>
                  <td>Chronischen Erkrankungen</td>
                  <td><input id="how-friend" name="chronische" type="radio" value="ja" <?php if ($row['chronische'] == 'ja') echo 'checked'; ?>>
                    <label for="how-friend" class="side-label">Ja</label>
                  </td>
                  <td><input id="how-friend" name="chronische" type="radio" value="nein" <?php if ($row['chronische'] == 'nein') echo 'checked'; ?>>
                    <label for="how-friend" class="side-label">Nein</label>
                  </td>
                </tr>
                <tr>
                  <td>Infektionskrankheiten</td>
                  <td><input id="how-friend" name="infektion" type="radio" value="ja" <?php if ($row['infektion'] == 'ja') echo 'checked'; ?>>
                    <label for="how-friend" class="side-label">Ja</label>
                  </td>
                  <td><input id="how-friend" name="infektion" type="radio" value="nein" <?php if ($row['infektion'] == 'nein') echo 'checked'; ?>>
                    <label for="how-friend" class="side-label">Nein</label>
                  </td>
                </tr>

              </tbody>
            </table>
          </div>

          <div class="field">
            <label for="familie" class="label"> Gibt es folgende Erkrankungen in Ihrer Familie? </label>
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
                  <td>Bluthochdruck?</td>
                  <td><input id="how-friend" name="bluthochdruck1" type="radio" value="ja" <?php if ($row['bluthochdruck1'] == 'ja') echo 'checked'; ?>>
                    <label for="how-friend" class="side-label">Ja</label>
                  </td>
                  <td><input id="how-friend" name="bluthochdruck1" type="radio" value="nein" <?php if ($row['bluthochdruck1'] == 'nein') echo 'checked'; ?>>
                    <label for="how-friend" class="side-label">Nein</label>
                  </td>
                </tr>
                <tr>
                  <td>Koronare Herzerkrankung?</td>
                  <td><input id="how-friend" name="koronare" type="radio" value="ja" <?php if ($row['koronare'] == 'ja') echo 'checked'; ?>>
                    <label for="how-friend" class="side-label ">Ja</label>
                  </td>
                  <td><input id="how-friend" name="koronare" type="radio" value="nein" <?php if ($row['koronare'] == 'nein') echo 'checked'; ?>>
                    <label for="how-friend" class="side-label ">Nein</label>
                  </td>
                </tr>
                <tr>
                  <td>Diabetes mellitus?</td>
                  <td><input id="how-friend" name="diabetes1" type="radio" value="ja" <?php if ($row['diabetes1'] == 'ja') echo 'checked'; ?>>
                    <label for="how-friend" class="side-label">Ja</label>
                  </td>
                  <td><input id="how-friend" name="diabetes1" type="radio" value="nein" <?php if ($row['diabetes1'] == 'nein') echo 'checked'; ?>>
                    <label for="how-friend" class="side-label">Nein</label>
                  </td>
                </tr>
                <tr>
                  <td>Erhöhte Blutfette?</td>
                  <td><input id="how-friend" name="blutfette1" type="radio" value="ja" <?php if ($row['blutfette1'] == 'ja') echo 'checked'; ?>>
                    <label for="how-friend" class="side-label">Ja</label>
                  </td>
                  <td><input id="how-friend" name="blutfette1" type="radio" value="nein" <?php if ($row['blutfette1'] == 'nein') echo 'checked'; ?>>
                    <label for="how-friend" class="side-label ">Nein</label>
                  </td>
                </tr>
                <tr>
                  <td>Erkrankugen des Nervensystems oder der Psyche?</td>
                  <td><input id="how-friend" name="nervensystem1" type="radio" value="ja" <?php if ($row['nervensystem1'] == 'ja') echo 'checked'; ?>>
                    <label for="how-friend" class="side-label">Ja</label>
                  </td>
                  <td><input id="how-friend" name="nervensystem1" type="radio" value="nein" <?php if ($row['nervensystem1'] == 'nein') echo 'checked'; ?>>
                    <label for="how-friend" class="side-label">Nein</label>
                  </td>
                </tr>
                <tr>
                  <td>Krebserkrankung?</td>
                  <td><input id="how-friend" name="krebs1" type="radio" value="ja" <?php if ($row['krebs1'] == 'ja') echo 'checked'; ?>>
                    <label for="how-friend" class="side-label">Ja</label>
                  </td>
                  <td><input id="how-friend" name="krebs1" type="radio" value="nein" <?php if ($row['krebs1'] == 'nein') echo 'checked'; ?>>
                    <label for="how-friend" class="side-label">Nein</label>
                  </td>
                </tr>
                <tr>
                  <td> Schlaganfall?</td>
                  <td><input id="how-friend" name="schlaganfall1" type="radio" value="ja" <?php if ($row['schlaganfall1'] == 'ja') echo 'checked'; ?>>
                    <label for="how-friend" class="side-label">Ja</label>
                  </td>
                  <td><input id="how-friend" name="schlaganfall1" type="radio" value="nein" <?php if ($row['schlaganfall1'] == 'nein') echo 'checked'; ?>>
                    <label for="how-friend" class="side-label">Nein</label>
                  </td>
                </tr>
                <tr>
                  <td> Herzinfarkt?</td>
                  <td><input id="how-friend" name="herzinfarkt1" type="radio" value="ja" <?php if ($row['herzinfarkt1'] == 'ja') echo 'checked'; ?>>
                    <label for="how-friend" class="side-label">Ja</label>
                  </td>
                  <td><input id="how-friend" name="herzinfarkt1" type="radio" value="nein" <?php if ($row['herzinfarkt1'] == 'nein') echo 'checked'; ?>>
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
          </div>
          <div class="btnc">
            <button type="submit" name="reset" class="reset">zurücksetzen</button>
          </div>

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
        <?php endwhile ?>
        </div>
      </form>
    </div>
  </div>

  <script src="js/sprache.js"></script>
  <script src="js/main.js"></script>
  <script src="js/script.js"></script>
  <script src="js/formular.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>

</body>


</html>