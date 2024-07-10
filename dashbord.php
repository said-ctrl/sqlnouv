<?php
include('livre.php');


if (isset($_POST['transmettre'])) {

    $titre = htmlspecialchars(stripslashes(trim($_POST['titre'])));
    $contenu = htmlspecialchars($_POST['contenu']);
    $auteur = htmlspecialchars($_POST['auteur']);

    $newlivre = new livres();
    $newtitre->setTitre($titre);
    $newcontenu->setContenu($contenu);
    $auteur->setTitre($auteur);
    $bdd->addUser($n);
}



?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord</title>
   
    </style>
</head>
<body>


<h1>
        ajoute ton bouquin
    </h1>

    <form action="" method="post" style="display: flex; flex-direction: column; width: 50%; margin:auto;">
        <input type="text" name="titre" placeholder="titre">
        <textarea name="contenu" id=""></textarea>
        <input type="text" name="auteur" placeholder="auteur">
        <button type="submit" name="transmettre">Envoyer</button>
    </form>
    <hr style="margin: 5% 5% 5% 5%;">





<div class="dashboard-container">
    <h1>Bienvenue sur votre tableau de bord</h1>
    <p>Vous pouvez maintenant accéder à toutes les fonctionnalités réservées à nos utilisateurs inscrits.</p>
    <a href="logout.php">Se déconnecter</a>
</div>
<form action="" method="post" style="display: flex; flex-direction: column; width: 50%; margin:auto;">
        <input type="text" name="pseudoConn" placeholder="pseudo">
        <input type="password" name="passwordConn" placeholder="mot de passe">
        <button type="submit" name="connexion">Connexion</button>
</body>
</html>
