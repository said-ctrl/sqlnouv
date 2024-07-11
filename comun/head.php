<header>
    <nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <?php if (isset($_SESSION['user'])) { ?>
                <?php if($_SESSION['user']['statut'] == "admin"){ ?>
                    <li><a href="admin.php">Admin</a></li>
                <?php } ?>
                <li><a href="logout.php">Déconnexion</a></li>
            <?php } else { ?>
                <li><a href="inscrip.php">Inscription</a></li>
                <li><a href="connex.php">Connexion</a></li>
            <?php } ?>
        </ul>
    </nav>
</header>