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

$sql1 = "SELECT * FROM fiche";
$stat = $pdo->query($sql1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
       /* Google Fonts - Poppins */

/* * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
body {
  min-height: 100%;
  background: #e3f2fd;
}
*/
nav {
  position: absolute;
  top: 0;
  left: 0;
  height: 70px;
  width: 100%;
  display: flex;
  align-items: center;
  /* background: #fff;
  box-shadow: 0 0 1px rgba(0, 0, 0, 0.1); */
}
/* nav .logo {
  display: flex;
  align-items: center;
  margin: 0 24px;
  position: absolute;
  top: 45px;
} */
 .logo .menu-icon {
  color: #333;
  font-size: 24px;
  margin-right: 14px;
  cursor: pointer;
  position: absolute;
  top: 35px;
  right: 300px;

} 
/* .logo .logo-name {
  color: #333;
  font-size: 22px;
  font-weight: 500;
}  */
nav .sidebar {
  position: fixed;
  top: 0;
  right: -100%;
  height: 100%;
  width: 260px;
  padding: 20px 0;
  background-color: #fff;
  box-shadow: 0 5px 1px rgba(0, 0, 0, 0.1);
  transition: all 0.4s ease;
}
nav.open .sidebar {
  right: 0;
}
.sidebar .sidebar-content {
  display: flex;
  height: 100%;
  flex-direction: column;
  justify-content: space-between;
  padding: 30px 16px;
}
.sidebar-content .list {
  list-style: none;
}
.list .nav-link {
  display: flex;
  align-items: center;
  margin: 8px 0;
  padding: 14px 12px;
  border-radius: 8px;
  text-decoration: none;
}
.lists .nav-link:hover {
  background-color: #4070f4;
}
.nav-link .icon {
  margin-right: 14px;
  font-size: 20px;
  color: #707070;
}
.nav-link .link {
  font-size: 16px;
  color: #707070;
  font-weight: 400;
}
.lists .nav-link:hover .icon,
.lists .nav-link:hover .link {
  color: #fff;
}
.overlay {
  position: fixed;
  top: 0;
  right: -100%;
  height: 1000vh;
  width: 200%;
  opacity: 0;
  pointer-events: none;
  transition: all 0.4s ease;
  background: rgba(0, 0, 0, 0.3);
}
nav.open ~ .overlay {
  opacity: 1;
  right: 260px;
  pointer-events: auto;
}  


    </style>
</head>
<body>
        <nav>
      <div class="logo">
        <i class="bx bx-menu menu-icon"></i>
      </div>
      <div class="sidebar">
        <div class="logo">
          <i class="bx bx-menu menu-icon"></i>
        </div>

        <div class="sidebar-content">
          <ul class="lists">
            <li class="list">
            <a href="konto.php" class="nav-link">
                <span class="link">Konto</span>
              </a>
            </li>
            <?php while($row = $stat->fetch()): ?>
            <li class="list">
            <a href="hauptmenu.php?id=<?= $row['id'] ?>" class="nav-link">
                <span class="link">Hauptmenu</span>
              </a>
            </li>
            <li class="list">
            <a href="formular.php?id=<?= $row['id'] ?>" class="nav-link">
                <span class="link">Formular bearbeiten</span>
              </a>
            </li>
            <?php endwhile ?>

            <li class="list">
            <a href="index.html" class="nav-link">
                <i class="bx bx-log-out icon"></i>
                <span class="link">Logout</span>
              </a>
            </li>
          </div>
        </div>
      </div>
    </nav>

    <section class="overlay"></section>

      
      
      
<script>
   const navBar = document.querySelector("nav"),
        menuBtns = document.querySelectorAll(".menu-icon"),
        overlay = document.querySelector(".overlay");

      menuBtns.forEach((menuBtn) => {
        menuBtn.addEventListener("click", () => {
          navBar.classList.toggle("open");
        });
      });

      overlay.addEventListener("click", () => {
        navBar.classList.remove("open");
      });


</script>      
</body>
</html>