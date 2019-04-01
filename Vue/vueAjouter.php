<?php $titre = "La banque web - Ajout d'un compte"; ?>
<?php
$erreur = '';
if (isset($_GET["erreur"])) {
    $erreur = $_GET["erreur"];
}
?>
<?php ob_start(); ?>
    <form action="index.php?action=ajouter" method="post">
        <br>
        <h3>Ajouter un compte</h3>
        <div>
            <div class="form-group row">
                <label for="id_utilisateur" class="col-sm-3 col-form-label">Numéro d'utilisateur </label><input
                        type="text" name="id_utilisateur"
                        id="id_utilisateur"/><br>
            </div>
            <div class="form-group row">
                <label for="type_compte" class="col-sm-3 col-form-label">Type de compte </label>
                <select class="form-control-sm" name="type_compte">
                    <option value="Chèque">Chèque</option>
                    <option value="Épargne">Épargne</option>
                </select>
            </div>
            <div class="form-group row">
                <label for="date" class="col-sm-3 col-form-label">Date d'ouverture (AAAA-MM-JJ) </label><input
                        type="text" name="date" id="date"/>
                <div class="col-sm-3">
                    <?= ($erreur == 'date') ? '<small class="text-danger">Entrez une date valide s.v.p.</small>' : '' ?>
                </div>
            </div>
            <input type="hidden" name="id" value="<?= $compte['id'] ?>"/><br/>
            <input class="btn btn-primary" type="submit" value="Envoyer"/>
        </div>
    </form>

<?php $contenu = ob_get_clean(); ?>

<?php require 'Vue/gabarit.php'; ?>