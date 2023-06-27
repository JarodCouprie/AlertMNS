<?php
session_start();
require_once "./tools/connect.php";

if (isset($_POST["mail"]) && isset($_POST["mdp"]) && ($_POST["mail"] != "") && ($_POST["mdp"] != "")) {
    $sql = "SELECT * FROM utilisateur WHERE user_mail=:mail";
    $stmt = $db->prepare($sql);
    $stmt->execute([":mail" => $_POST["mail"]]);
    if ($row = $stmt->fetch()) {
        if (password_verify($_POST["mdp"], $row["user_password"])) {
            $_SESSION["connected"] = "ok";
            header("Location: ./user/connected.php");
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
    <link rel="stylesheet" href="./assets/style/common.css">
    <link rel="stylesheet" href="./assets/style/login.css">
    <link rel="icon" type="image/x-icon" href="./assets/img/fav-icon.svg">
    <title>Connexion</title>
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
                    <img src="./assets/img/mail.svg" alt="mail icon" class="icon">
                </div>
                <div class="input-box">
                    <input class="input-form" type="password" name="mdp" required>
                    <label>Mot de passe</label>
                    <img src="./assets/img/lock.svg" alt="lock icon" class="icon">
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
        <img src="./assets/img/logo-mns.svg" alt="mns logo">
    </form>
</body>

</html>