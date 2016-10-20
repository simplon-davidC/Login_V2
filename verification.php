<?php

session_start();

define('USER_MAIL', "toto@gmail.com");
define('USER_PASS', "azerty");
define('USER_LASTNAME', "Dupont");
define('USER_FIRSTNAME', "Toto");

function go($path){
    header('location:'.$path);
}

function backToLogin($urlData){
    go("login.php".$urlData);
}

if (isset($_POST["login"]) && isset($_POST["password"])) {

    $login = $_POST["login"];
    $password = $_POST["password"];

    if ($login == USER_MAIL && $password == USER_PASS) {

        $user = [
            "nom" => USER_LASTNAME,
            "prenom" => USER_FIRSTNAME,
            "mail" => USER_MAIL
        ];

        $_SESSION['user'] = $user;

        go('index.php');

    } else {
        backToLogin("?authenticationFailed=1&withLogin=".$login );
    }
} else
    backToLogin("");

?>

