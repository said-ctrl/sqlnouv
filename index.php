<?php
require_once('config/config.php');
require_once('class/livre.php');
include('class/book.php');
session_start();
$bdd = new bdd();
$bdd->connect();


if (isset($_POST['transmettre'])) {

    $titre = htmlspecialchars(stripslashes(trim($_POST['titre'])));
    $contenu = htmlspecialchars($_POST['contenu']);
    $auteur = htmlspecialchars($_POST['auteur']);

    $newlivres = new livres();
    $newlivres->setTitre($titre);
    $newlivres->setContenu($contenu);
    $newlivres->setAuteur($auteur);
    $bdd->addbooks($newlivres);
}

$books = $bdd->getBooks();


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
    <?php include('comun/head.php'); ?>


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
    <table border="1">
        <thead>
            <th>Titre</th>
            <th>Contenu</th>
            <th>Auteur</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php foreach ($books as $newlivre) { ?>
                <tr>
                    <td><?php echo $newlivre['titre']; ?> </td>
                    <td><?php echo $newlivre['contenu']; ?> </td>
                    <td><?php echo $newlivre['auteur']; ?> </td>
                    <td>
                        <form action="" method="post">
                            <button type="submit" name="supprime" value="<?php echo $newlivre['id']; ?>"> delete</button>
                        </form>
                    </td>
                </tr>
              <?php  if (isset($_POST['supprime'])) {
                if($_POST['supprime'] ==$newlivre['id']){
                $bdd->deletbook($newlivre['id']);
                }
                } 
                ?>

            <?php } ?>
        </tbody>
    </table>




    <div>
        <h1>Bienvenue sur votre tableau de bord</h1>
        <p>Vous pouvez maintenant accéder à toutes les fonctionnalités réservées à nos utilisateurs inscrits.</p>
        <a href="logout.php">Se déconnecter</a>
    </div>

</body>

</html>