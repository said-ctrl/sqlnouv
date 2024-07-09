<?php

require_once("sql.php");
session_start();
$db = new basedd();
$db->connect();

if (isset($_POST["inscription"])) {
    $mdp = password_hash($_POST["mdp"], PASSWORD_BCRYPT);
    $db->addnewser($_POST["email"], $mdp);
}

if (isset($_POST["connexion"])) {
    $mail = $_POST['mail'];
    $mdp = $_POST['motdp'];
    if (!empty($mail) && !empty($mdp)) {
       $user =  $db->confirmation(["mail"=>$mail, "pass"=>$mdp]);
       if($user){
        $_SESSION["user"] = $user;
       }
    } else {
        echo "wrong username or password";
    }
}
echo "<pre>";
var_dump($_SESSION['user']);
echo "</pre>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        Votre nom : <input type="text" name="email"><br />
        Votre mot de passe : <input type="" name="mdp"><br />
        <input type="submit" name="inscription" value="Envoyer">
    </form>
    <form action="" method="post">
        email:<input type="text" name="mail"> <br>
        mot de passe:<input type="" name="motdp">
        <input type="submit" name="connexion" value="connexion">
    </form>
</body>

</html>