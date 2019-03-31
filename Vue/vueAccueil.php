<?php $titre = "Banque Web"; ?>

<?php ob_start(); ?>

<?php foreach ($comptes as $compte):
    ?>

    <article>
        <header>

        </header>
        <div class="card bg-light mb-3" style="max-width: 540px;">
            <div class="card-header">
                <a href="<?= "index.php?action=compte&id=" . $compte['id'] ?>">Information sur le
                    compte <?= $compte['id'] ?> </a>
            </div>
            <div class="card-body">
                <p>
                    Numéro de compte: <?= $compte['id'] ?>
                    <br>
                    Type de compte: <?= $compte['type_compte'] ?>
                    <br>
                    <time>Date d'ouverture: <?= $compte['date'] ?></time>
                    <br>
                    Numéro d'utilisateur: <?= $compte['id_utilisateur'] ?>
                </p>
            </div>

        </div>
    </article>
<?php endforeach; ?>
    <a class="btn-lg btn-primary" href="index.php?action=nouveauCompte">Ajouter un compte
    </a>
<br>
<?php $contenu = ob_get_clean(); ?>

<?php require 'Vue/gabarit.php'; ?>