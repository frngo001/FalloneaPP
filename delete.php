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

// $table = "CREATE TABLE medikation (
//     id INTEGER PRIMARY KEY,
//     name_medikament TEXT,
//     \"stärke\" TEXT,
//     gestalt TEXT,
//     morgens TEXT,
//     mittags TEXT,
//     abends TEXT,
//     nachts TEXT,
//     einheit TEXT,
//     hinweis TEXT,
//     grund TEXT,
//     \"id-fiche\" INTEGER,
//     FOREIGN KEY (\"id-fiche\") REFERENCES fiche(id)
//   )";
//   $pdo->exec($table);
if (isset($_POST['delete'])){
    if (isset($_GET['id'])) {
      $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    //   $sql1 = "SELECT * FROM fiche WHERE id=$id";
    //   $stat = $pdo->query($sql1);

    //   $tableName = $row['konto'];
    //   $dele = "DROP TABLE `$tableName`";
    //   $pdo->exec($dele);

      $query = "DELETE FROM fiche WHERE id=$id";
  $stat = $pdo->query($query);
}
 }
?>