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
    <section id="section-2">
      <?php
      require_once("../tools/connect.php");
      $sql = "SELECT * FROM message
      INNER JOIN user ON message.user_id = user.user_id
      INNER JOIN appartient ON message.msg_id = appartient.msg_id
      WHERE appartient.canal_id = 1
      ORDER BY msg_date_creation DESC";
      $recordset = $db->query($sql);
      foreach ($recordset as $row) { ?>
        <div class="gen-message">
          <p>
            <?= htmlspecialchars($row["msg_content"]); ?>
          </p>
          <p>
            <?= htmlspecialchars($row["user_name"]) . " " . htmlspecialchars($row["user_name"]) . " · " . htmlspecialchars($row["msg_date_creation"]); ?>
          </p>
        </div>
      <?php } ?>
    </section>
    <section id="section-3">
      <?php
      require_once("../tools/connect.php");
      $sql = "SELECT * FROM message
      INNER JOIN appartient ON message.msg_id = appartient.msg_id
      INNER JOIN canal ON appartient.canal_id = canal.canal_id
      INNER JOIN voir ON canal.canal_id = voir.canal_id
      INNER JOIN role ON voir.role_id = role.role_id
      INNER JOIN possede ON role.role_id = possede.role_id
      INNER JOIN user ON message.user_id = user.user_id
      WHERE possede.user_id = 101
      AND voir.main_canal = 1
      ORDER BY msg_date_creation DESC";
      $recordset = $db->query($sql);
      foreach ($recordset as $row) { ?>
        <div class="gen-message">
          <p>
            <?= htmlspecialchars($row["msg_content"]); ?>
          </p>
          <p>
            <?= htmlspecialchars($row["user_name"]) . " " . htmlspecialchars($row["user_name"]) . " · " . htmlspecialchars($row["msg_date_creation"]); ?>
          </p>
        </div>
      <?php } ?>
    </section>
    <section id="section-4">Incoming feature (Meteo)</section>
    <section id="section-5">Incoming feature (Mails)</section>
  </main>
</body>

</html>