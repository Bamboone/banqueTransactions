<?php $titre = "Modifier - Transaction " . $transaction['id']; ?>
<?php ob_start(); ?>
<?php
$erreur = '';
if (isset($_GET["erreur"])) {
    $erreur = $_GET["erreur"];
}
?>
<article>
    <header>
        <p>
        <h3>
            Modification d'une transaction
        </h3>
    </header>
</article>

<form action="index.php?action=appliquerModification" method="post">

    <div>
        <input type="hidden" name="id_compte" value="<?= $transaction['id_compte'] ?>"/>
        <div class="form-group row">
            <label for="montant" class="col-sm-4 col-form-label">Montant </label><input type="text" name="montant"
                                                                                        id="auto"
                                                                                        value="<?= $transaction['montant']; ?>"/>
        </div>
        <div class="form-group row">
            <label for="type_transaction" class="col-sm-4 col-form-label">Type de transaction </label>
            <select class="form-control-sm" name="type_transaction">
                <option value="Même banque" <?= $transaction['type_transaction'] == 'Même banque' ? ' selected="selected"' : ''; ?>>
                    Même banque
                </option>
                <option value="Intérac" <?= $transaction['type_transaction'] == 'Intérac' ? ' selected="selected"' : ''; ?>>
                    Intérac
                </option>
            </select>
        </div>
        <div class="form-group row">
            <label for="destinataire" class="col-sm-4 col-form-label">Destinataire </label><input id="destinataire"
                                                                                                  name="destinataire"
                                                                                                  type="text"
                                                                                                  value="<?= $transaction['destinataire']; ?>"/>
        </div>
        <div class="form-group row">
            <label for="courrielDestinataire" class="col-sm-4 col-form-label">Adresse courriel du
                destinataire (xyz@xyz.xyz) </label><input id="courrielDestinataire"
                                                          name="courrielDestinataire"
                                                          type="text"
                                                          value="<?= $transaction['courrielDestinataire']; ?>"/>
            <div class="col-sm-3">
                <?= ($erreur == 'courriel') ? '<small class="text-danger">Entrez un courriel valide s.v.p.</small>' : '' ?>
            </div>
        </div>
        <fieldset class="form-group">
            <div class="row">
                <label for="frequence" class="col-sm-4 col-form-label">Fréquence </label>
                <div class="col-sm-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="frequence" value="Une fois" id="uneFois"
                            <?= $transaction['frequence'] == 'Une fois' ? ' checked="checked"' : ''; ?>/>
                        <label class="form-check-label" for="uneFois">Une fois</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="frequence" value="Chaque semaine"
                               id="semaine" <?= $transaction['frequence'] == 'Chaque semaine' ? ' checked="checked"' : ''; ?>/>
                        <label class="form-check-label" for="semaine">Chaque semaine</label>
                    </div>
                    <div class="form-check ">
                        <input class="form-check-input" type="radio" name="frequence" value="Chaque mois"
                               id="mois" <?= $transaction['frequence'] == 'Chaque mois' ? ' checked="checked"' : ''; ?>/>
                        <label class="form-check-label" for="mois">Chaque mois</label>
                    </div>
                </div>

            </div>
        </fieldset>

        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"/>
        <input class="btn btn-primary" type="submit" value="Modifier"/>
    </div>
</form>
<br>
<form action="index.php" method="get">
    <input type="hidden" name="action" value="compte"/>
    <input type="hidden" name="id" value="<?= $transaction['id_compte'] ?>"/>
    <input class="btn btn-primary" type="submit" value="Annuler"/>
</form>

<?php $contenu = ob_get_clean(); ?>

<?php require 'Vue/gabarit.php'; ?>
