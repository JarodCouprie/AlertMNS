<?php
session_start();
require_once "../tools/connect.php";

if (isset($_POST["mail"]) && isset($_POST["mdp"]) && ($_POST["mail"] != "") && ($_POST["mdp"] != "")) {
    $sql = "SELECT * FROM user WHERE user_mail=:mail";
    $stmt = $db->prepare($sql);
    $stmt->execute([":mail" => $_POST["mail"]]);
    if ($row = $stmt->fetch()) {
        if (password_verify($_POST["mdp"], $row["user_mdp"])) {
            $_SESSION["connected"] = "ok";
            header("Location: /login.php");
        } //full calendar pour le calendrier
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
    <link rel="stylesheet" href="../../assets/style/common.css">
    <link rel="stylesheet" href="../../assets/style/login.css">
    <title>Connexion</title>
</head>

<body>
    <form method="POST" action="login.php">
        <h1>
            Metz Numeric School
        </h1>
        <h2>
            Connexion
        </h2>
        <section>
            <article>
                <label>Email</label>
                <input class="input-form" type="email" name="mail" placeholder="abc@mail.fr" required>
                <label>Mot de passe</label>
                <input class="input-form" type="password" name="mdp" required>
                <?= isset($msg) ? ("<div class='red'>" . $msg . "</div>") : ""; ?>
                <div>
                    <button>
                        <a href="/">
                            Mot de passe oublié ?
                        </a>
                    </button>
                    <input type="submit" value="Connexion">
                </div>
            </article>
        </section>
        <img src="../../assets/img/logo-mns.svg" alt="mns logo">
    </form>
</body>

</html>