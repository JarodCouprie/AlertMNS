<?php
session_start();
require_once "tools/connect.php";

if (isset($_SESSION["connected"]) && $_SESSION["connected"] == "ok") {
    header("Location: ./user/main.php");
}

if (isset($_POST["mail"]) && isset($_POST["mdp"]) && ($_POST["mail"] != "") && ($_POST["mdp"] != "")) {
    $sql = "SELECT * FROM user WHERE user_mail=:mail";
    $stmt = $db->prepare($sql);
    $stmt->execute([":mail" => $_POST["mail"]]);
    if ($row = $stmt->fetch()) {
        if (password_verify($_POST["mdp"], $row["user_password"])) {
            $_SESSION["connected"] = "ok";
            $_SESSION["userName"] = $row["user_name"];
            $_SESSION["userFirstName"] = $row["user_firstname"];
            $_SESSION["userAdmin"] = $row["user_admin"];
            header("Location: ./user/main.php");
        }
    }
    $msg = "Email ou mot de passe incorrect";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/style/shared.css">
    <link rel="stylesheet" href="./assets/style/main.css">
    <link rel="icon" type="image/x-icon" href="./assets/icon/fav-icon.svg">
    <title>Alert MNS</title>
</head>

<body>
    <form method="POST" action="index.php">
        <h1>
            Connexion
        </h1>
        <section>
            <article>
                <div class="input-box">
                    <input autocomplete="off" class="input-form" type="email" name="mail" placeholder=" " required>
                    <label>Email</label>
                    <img src="./assets/icon/mail.svg" alt="mail icon" class="icon">
                </div>
                <div class="input-box">
                    <input class="input-form" type="password" name="mdp" required>
                    <label>Mot de passe</label>
                    <img src="./assets/icon/lock.svg" alt="lock icon" class="icon">
                </div>
                <?= isset($msg) ? ("<div class='wrong'>" . $msg . "</div>") : ""; ?>
                <input class="send" type="submit" value="Connexion">
                <button>
                    <a href="#">
                        Mot de passe oublié ?
                    </a>
                </button>
            </article>
        </section>
        <img src="./assets/icon/logo-mns.svg" alt="mns logo">
    </form>
</body>

</html>