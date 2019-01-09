



<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <?php if (internauteEstConnecteEtEstAdmin()) : ?>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
        aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand" href="<?php echo RACINE_SITE;?>">Monsite.com</a>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo RACINE_SITE;?>boutique.php">Boutique <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo RACINE_SITE;?>panier.php">panier</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo RACINE_SITE;?>admin/gestion_boutique.php">Gestion boutique</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo RACINE_SITE;?>admin/gestion_commande.php">Gestion de commande<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo RACINE_SITE;?>admin/gestion_membre.php">Gestion de membres</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo RACINE_SITE;?>connexion.php?action=deconnexion">Deconnexion</a>
            </li>
        </ul>
    </div>
    <?php elseif (internauteEstConnecte()) : ?>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
        aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand" href="<?php echo RACINE_SITE;?>">Monsite.com</a>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo RACINE_SITE;?>boutique.php">Boutique <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo RACINE_SITE;?>panier.php">panier</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo RACINE_SITE;?>connexion.php?action=deconnexion">Deconnexion</a>
            </li>
        </ul>
    </div>
    <?php else : ?>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
        aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand" href="<?php echo RACINE_SITE;?>">Monsite.com</a>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo RACINE_SITE;?>inscription.php">Inscription <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo RACINE_SITE;?>connexion.php">Connexion</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo RACINE_SITE;?>boutique.php">Boutique <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo RACINE_SITE;?>panier.php">panier</a>
            </li>
        </ul>
    </div>
    <?php endif ?>
</nav>