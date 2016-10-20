<?php

// inclusion d'un fichier contenant des constantes de messages d'erreurs
include_once 'erreur/errors.php';

function errorView($msg)
{
    return '<div class="alert alert-danger">' . $msg . '</div>';
}

// initialisation des variables utilisées dans la page
$errorMessage = '';
$loginFieldValue = '';

// si un erreur d'identification est signalée via l'url ( $_GET['authenticationFailed'] )
if (isset($_GET['authenticationFailed']) && $_GET['authenticationFailed'] == 1) {
    $errorMessage = ERROR_AUTH_FAILED;

    if (isset($_GET['withLogin']))
        $loginFieldValue = 'value="' . $_GET['withLogin'] . '" ';
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Mon appli, identification</title>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <?php include_once "head/styles.html"; ?>
</head>
<body>

<?php

include_once "head/header.php";

if (!isset($user)) {
    ?>
    <div id="login-form" class="panel panel-default">

        <div class="panel-heading">
            Identification
        </div>
        <div class="fields">

            <!-- si le login a échoué : afficher le message d'erreur -->
            <?php echo $errorMessage != '' ? errorView($errorMessage) : ''; ?>

            <form id="loginForm" action="verification.php" method="post">
                <div>

                    <div class="input-group">
                        <!--<span class="input-group-addon" id="basic-addon1">@</span>-->
                        <span class="input-group-addon" id="basic-addon1">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                        </span>
                        <input id="chpLogin" type="text" name="login" class="form-control"
                               placeholder="Votre identifiant" <?php echo $loginFieldValue; ?>/>
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">
                            <span class="glyphicon glyphicon-sunglasses" aria-hidden="true"></span>
                        </span>
                        <input id="chpPassword" type="password" name="password" class="form-control"
                               placeholder="Votre mot de passe" <?php echo $loginFieldValue; ?>/>
                    </div>

                </div>

            </form>
        </div>
        <div class="panel-footer">
            <button type="submit" class="btn btn-info" form="loginForm">Entrer</button>
        </div>
    </div>
    <?php
} else // si l'identification a réussie
    echo "<h1>Bienvenue " . $user['prenom'] . " " . $user['nom'] . "</h1>"

?>
</body>
</html>
