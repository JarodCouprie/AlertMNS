<?php

require_once("../tools/protect.php");

?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../assets/style/main.css" />
  <script type="module" src="../assets/scripts/navbar.js"></script>
  <link rel="icon" type="image/x-icon" href="../assets/icon/fav-icon.svg" />
  <title>Alert MNS</title>
</head>

<body>
  <?php
  include "../partials/navbar.php"
    ?>
  <main>
    <section id="section-1">
      <?php
      echo "<p>Bienvenue " . $_SESSION["userFirstName"] . " " . $userLastName = $_SESSION["userName"] . " !";
      ?>
    </section>
    <section id="section-2">Canal général</section>
    <section id="section-3">Canal groupe</section>
    <section id="section-4">Meteo</section>
    <section id="section-5">Mails</section>
  </main>
</body>

</html>