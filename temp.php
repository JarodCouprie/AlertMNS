<?php

// echo password_hash("labombe", PASSWORD_DEFAULT);

$mdp = "$2y$10$6ULKX6C/.kMkfOaZdjFXg.kNlDIKPaKt7n3iv1xz6PjZ9Q1K8Ymnu";

if (password_verify("labombe", $mdp)){
    echo "Acces granted";
}else{
    echo "Acces denied";
};


?>