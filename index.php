<?php
    session_start();

if( isset($_SESSION['user'])){
    $user = $_SESSION['user'];
    $welcomeMessage = "Bienvenue ".$user['nom']." ".$user['prenom'];

} else
    header("location:login.php");
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Mon Appli / Accueil</title>
    <?php include_once "head/styles.html"; ?>
</head>
<body>

<?php include_once "head/header.php"; ?>

<h1><?php echo $welcomeMessage ?></h1>

</body>
</html>