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

$sqlpin = "SELECT * FROM pin";
$stat = $pdo->query($sqlpin);

if (isset($_POST['submit'])) {
  $pin = sha1($_POST['pin']);
  if (!$pin) {
    $erreur = "Geben Sie ein PIN ein";
  } else {
    $sqlpin = "SELECT * FROM pin";
    $stat = $pdo->query($sqlpin);
    //$row = $stat->fetch();
    if ($stat->rowCount() == 0) {
      $row = $stat->fetch();
      if ($row['pin'] === $pin) {
        header('location: konto.php');
      } else {
        $erreur = "falsche pin";
      }
    } else {
      $erreur = "Sie haben noch kein PIN erstellt";
    }
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
      <a href="index.html"> <i class='bx bx-chevron-left' id="menu-icon"></i> </a>

    </div>
  </header>
  <h2>Login</h2>
  <div id="regForm">
    <form method="POST">

      <label for="access-pin">Geben Sie Ihren Pin ein :</label>
      <input type="password" id="access-pin" maxlength="5" name="pin">
      <button type="submit" id="access-button" name="submit">Weiter</button>
      <?php if ($stat->rowCount() != 0) :  ?>

        <p><a href="pin_erstellen.php">Pin erstellen</a></p>
      <?php endif ?>
    </form>
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
</body>

</html>

<!--    
    <script>
      const PIN_FILE = 'pin.txt'; // Fichier de stockage du code PIN

// Création du code PIN
const createButton = document.getElementById('create-button');
createButton.addEventListener('click', () => {
const pin = document.getElementById('pin').value;
if (pin.length === 5 && !isNaN(parseInt(pin))) {
  // Stockage du code PIN dans un fichier sécurisé
  // (en pratique, il faudrait utiliser une méthode de stockage plus sécurisée)
  localStorage.setItem(PIN_FILE, pin);


  var data = "code pin : "+pin;



  var filename = "code_pin.txt";
  var file = new Blob([data], {type: 'text/plain'});
  var downloadLink = document.createElement("a");
  downloadLink.href = window.URL.createObjectURL(file);
  downloadLink.download = filename;
  document.body.appendChild(downloadLink);
  downloadLink.click();
  document.body.removeChild(downloadLink);



  // Affichage du formulaire d'accès au compte
  document.getElementById('create-pin').style.display = 'none';
  document.getElementById('access-account').style.display = 'block';
} else {
  error1();
}
});

// Accès au compte
const accessButton = document.getElementById('access-button');
accessButton.addEventListener('click', () => {
const pin = document.getElementById('access-pin').value;
const storedPin = localStorage.getItem(PIN_FILE);
if (pin === storedPin) {
  //alert('Accès autorisé.');
  location.href = 'formular.html';
} else {
  error2();
  }
});

function error1() {
		swal({
  title: "Ihre PIN soll fünf Zahl lang sein",
  text: "ein Fehler ist aufgetreten!!",
  icon: "error",
  button: "Ok!",
});
}

function error2() {
		swal({
  title: "Falsche PIN eingegeben",
  text: "ein Fehler ist aufgetreten!!",
  icon: "error",
  button: "erneu versuchen",
});
}



    </script>
-->