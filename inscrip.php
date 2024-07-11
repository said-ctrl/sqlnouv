<?php

require_once('config/config.php');
require_once('class/users.php');
session_start();

$bdd = new bdd();
$bdd->connect();

$message;

if (isset($_POST['envoyer'])) {

    $pseudo = htmlspecialchars(stripslashes(trim($_POST['pseudo'])));
    $password = htmlspecialchars($_POST['password']);

    $newUser = new Users();
    $newUser->setPseudo($pseudo);
    $newUser->setPassword(password_hash($password, PASSWORD_BCRYPT));

    $bdd->addUser($newUser);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<header>
    
<?php include('comun/head.php');?>

</header>

<?php if (isset($_SESSION['user'])) { ?>
        <a href="logout.php">Déconnexion</a>
    <?php } ?>

    <form action="" method="post" style="display: flex; flex-direction: column; width: 50%; margin:auto;">
        <input type="text" name="pseudo" placeholder="pseudo">
        <input type="password" name="password" placeholder="mot de passe">
        <button type="submit" name="envoyer">Envoyer</button>
    </form>
    <hr style="margin: 5% 5% 5% 5%;">

</body>
</html>