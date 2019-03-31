<?php $titre = "Supprimer - Transaction " . $transaction['id']; ?>
<?php ob_start(); ?>
    <article>
        <div class="card bg-light mb-3" style="max-width: 540px;">
            <div class="card-header">
                Voulez-vous supprimer la transaction <?= $transaction['id'] ?>?
            </div>
            <div class="card-body">
                <p>
                    <strong><?= $transaction['montant'] ?>$</strong> à <?= $transaction['destinataire'] ?>
                    (<?= $transaction['courrielDestinataire'] ?>). <br>
                    Fréquence: <?= $transaction['frequence'] ?> <br>
                    Type: <?= $transaction['type_transaction'] ?>
                </p>
            </div>

        </div>
    </article>
    <div class="d-inline-block">
        <form action="index.php?action=supprimer" method="post">
            <input type="hidden" name="id" value="<?= $transaction['id'] ?>"/><br/>
            <input class="btn btn-primary" type="submit" value="Oui"/>
        </form>
    </div>
    <div class="d-inline-block">
        <form action="index.php" method="get">
            <input type="hidden" name="action" value="compte"/>
            <input type="hidden" name="id" value="<?= $transaction['id_compte'] ?>"/>
            <input class="btn btn-primary" type="submit" value="Annuler"/>
        </form>
    </div>


<?php $contenu = ob_get_clean(); ?>

<?php require 'Vue/gabarit.php'; ?>