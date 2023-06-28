<?php

require_once("../tools/protect.php");


?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../assets/style/shared.css" />
  <link rel="stylesheet" href="../assets/style/messages.css" />
  <link rel="stylesheet" href="../assets/style/navbar.css" />
  <link rel="icon" type="image/x-icon" href="../assets/icon/fav-icon.svg" />
  <title>Alert MNS</title>
</head>

<body>
  <?php
  include "../partials/navbar.php"
    ?>
  <main>
    <input id="search-someone" type="text" placeholder="Recherche une conversation">
    <div id="talks-container"></div>
    <button id="more-button">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
        <path
          d="M23.677 18.52c.914 1.523-.183 3.472-1.967 3.472h-19.414c-1.784 0-2.881-1.949-1.967-3.472l9.709-16.18c.891-1.483 3.041-1.48 3.93 0l9.709 16.18z" />
      </svg>
    </button>
    <div class="bars" id="topbar">
      <div>
        <div id="profile-picture">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
            <path
              d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm7.753 18.305c-.261-.586-.789-.991-1.871-1.241-2.293-.529-4.428-.993-3.393-2.945 3.145-5.942.833-9.119-2.489-9.119-3.388 0-5.644 3.299-2.489 9.119 1.066 1.964-1.148 2.427-3.393 2.945-1.084.25-1.608.658-1.867 1.246-1.405-1.723-2.251-3.919-2.251-6.31 0-5.514 4.486-10 10-10s10 4.486 10 10c0 2.389-.845 4.583-2.247 6.305z" />
          </svg>
        </div>
        <p>Messagerie privée</p>
      </div>
      <button id="info">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
          <path
            d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-.001 5.75c.69 0 1.251.56 1.251 1.25s-.561 1.25-1.251 1.25-1.249-.56-1.249-1.25.559-1.25 1.249-1.25zm2.001 12.25h-4v-1c.484-.179 1-.201 1-.735v-4.467c0-.534-.516-.618-1-.797v-1h3v6.265c0 .535.517.558 1 .735v.999z" />
        </svg>
      </button>
    </div>
    <div id="middle">
      <?php
      require_once("../tools/connect.php");
      $sqlmsg = "SELECT * FROM message ORDER BY msg_date_creation DESC";
      $recordset = $db->query($sqlmsg);
      foreach ($recordset as $row) { ?>
        <div class="db-message">
          <p>
            <?= htmlspecialchars($row["msg_content"]); ?>
          </p>
          <p>
            <?= htmlspecialchars($row["msg_date_creation"]); ?>
          </p>
        </div>
      <?php } ?>
    </div>
    <div class="bars" id="bottombar">
      <div>
        <button id="actions">
          <svg clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path
              d="m12.002 2c5.518 0 9.998 4.48 9.998 9.998 0 5.517-4.48 9.997-9.998 9.997-5.517 0-9.997-4.48-9.997-9.997 0-5.518 4.48-9.998 9.997-9.998zm-.747 9.25h-3.5c-.414 0-.75.336-.75.75s.336.75.75.75h3.5v3.5c0 .414.336.75.75.75s.75-.336.75-.75v-3.5h3.5c.414 0 .75-.336.75-.75s-.336-.75-.75-.75h-3.5v-3.5c0-.414-.336-.75-.75-.75s-.75.336-.75.75z"
              fill-rule="nonzero" />
          </svg>
        </button>
        <input id="write-input" type="text" placeholder="Aa">
      </div>
      <button id="send">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
          <path
            d="M24 0l-6 22-8.129-7.239 7.802-8.234-10.458 7.227-7.215-1.754 24-12zm-15 16.668v7.332l3.258-4.431-3.258-2.901z" />
        </svg>
      </button>
    </div>
  </main>
</body>

</html>