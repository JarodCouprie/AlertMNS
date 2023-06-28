<?php

require_once("../tools/protect.php");

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../assets/style/shared.css" />
    <link rel="stylesheet" href="../assets/style/navbar.css" />
    <link rel="icon" type="image/x-icon" href="../assets/icon/fav-icon.svg" />
    <title>Alert MNS</title>
    <style>
        main {
            width: 100%;
            display: grid;
            place-items: center;
        }

        h1 {
            color: #fff;
            font-size: 5rem;
        }
    </style>
</head>

<body>
    <?php
    include "../partials/navbar.php"
        ?>
    <main>
        <h1>Bienvenue sur les mails</h1>
    </main>
</body>

</html>