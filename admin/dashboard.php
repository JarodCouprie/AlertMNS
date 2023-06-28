<?php

require_once("../tools/protect.php");

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../assets/style/dashboard.css" />
    <link rel="icon" type="image/x-icon" href="../assets/icon/fav-icon.svg" />
    <title>Alert MNS</title>
</head>

<body>
    <?php
    include "../partials/navbar.php"
        ?>
    <main>
        <h1>Bienvenue
            <?= $_SESSION["userFirstName"] . " " . $userLastName = $_SESSION["userName"] ?> sur l'interface de gestion
        </h1>
    </main>
</body>

</html>