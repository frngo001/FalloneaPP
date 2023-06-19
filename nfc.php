<!DOCTYPE html>
<html>
<head>
	<script src="js/sweetalert.js"></script>
	<script src="js/sweetalert.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <meta charset="UTF-8">
	<title>Authentification NFC</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<h1>Authentification NFC</h1>
	<p>Bitte legen sie Ihre Gesundheitskarte hintern Ihre Handy</p>
	<button onclick="readNFC()">Lire la carte d'assurance NFC</button>
    <div id="message"></div>
	<script src="js/authentification.js"></script>

</body>
</html>