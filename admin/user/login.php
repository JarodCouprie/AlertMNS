<?php
session_start();
require_once "../tools/connect.php";

if (isset($_POST["mail"]) && isset($_POST["mdp"]) && ($_POST["mail"]!="") && ($_POST["mdp"]!="")){
    $sql = "SELECT * FROM user WHERE user_mail=:mail";
    $stmt = $db->prepare($sql);
    $stmt->execute([":mail"=> $_POST["mail"]]);
    if ($row = $stmt -> fetch()){
        if (password_verify($_POST["mdp"],$row["user_mdp"])){
            $_SESSION["connected"]= "ok";
            header("Location: /login.php");
        }//full calendar pour le calendrier
    }
    $msg = "Échec de connexion";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <?= isset($msg) ? ("<div>".$msg."</div>"): "" ;?>
    <form method="POST" action="login.php">
        <label for="">Email</label><br>
        <input type="email" name="mail" placeholder="abc@mail.com">
        <br><br>
        <label for="">Mot de passe</label><br>
        <input type="password" name="mdp">
        <br><br>
        <input type="submit" value="Connexion">
    </form>
</body>
</html>