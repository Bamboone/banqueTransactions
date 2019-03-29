<?php $titre = "Banque Web"; ?>

<?php ob_start(); ?>

    <a href="index.php?action=nouveauCompte">
        <h2>Ajouter un compte</h2>
    </a>

<?php foreach ($comptes as $compte):
    ?>

    <article>
        <header>
            <a href="<?= "index.php?action=compte&id=" . $compte['id'] ?>">
                <h1>Numéro de compte: <?= $compte['id'] ?></h1>
            </a>
            <h3 class="">Type de compte: <?= $compte['type_compte'] ?></h3>
            <time>Date d'ouverture: <?= $compte['date'] ?></time>
            <h3>Numéro d'utilisateur: <?= $compte['id_utilisateur'] ?></h3>
        </header>
    </article>
    <hr />
<?php endforeach; ?>
<?php $contenu = ob_get_clean(); ?>

<?php require 'Vue/gabarit.php'; ?>