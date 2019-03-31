<?php $titre = "La banque web - " . $compte['id']; ?>

<?php ob_start(); ?>

    <article>
        <header>
            <h1>Informations sur le compte <?= $compte['id'] ?></h1>

            <h4>Type de compte: <?= $compte['type_compte'] ?></h4>
            <h4>
                <time>Date d'ouverture: <?= $compte['date'] ?></time>
            </h4>
            <h4>Numéro d'utilisateur: <?= $compte['id_utilisateur'] ?></h4>
        </header>
    </article>
    <hr/>
    <header>
        <h1>Transactions du compte numéro <?= $compte['id'] ?></h1>
    </header>
<?php foreach ($transactions as $transaction): ?>
    <div class="card bg-light mb-3" style="max-width: 540px;">
        <div class="card-header">
            Transaction <?= $transaction['id']?>
        </div>
        <div class="card-body">
            <p>
                <strong><?= $transaction['montant'] ?>$</strong> à <?= $transaction['destinataire'] ?>
                (<?= $transaction['courrielDestinataire'] ?>). <br>
                Fréquence: <?= $transaction['frequence'] ?> <br>
                Type: <?= $transaction['type_transaction'] ?>
            </p>
            <a class="btn btn-primary" href="index.php?action=modifier&id=<?= $transaction['id'] ?>">Modifier</a> <a
                    class="btn btn-primary"
                    href="index.php?action=confirmer&id=<?= $transaction['id'] ?>">Supprimer</a>
        </div>

    </div>
    <br>
<?php endforeach; ?>

    <form action="index.php?action=transaction" method="post">
        <h2>Ajouter une transaction</h2>
        <div>
            <div class="form-group row">
                <label for="id_compte" class="col-sm-2 col-form-label">Numéro de compte: </label><input type="text"
                                                                                                        name="id_compte"
                                                                                                        id="id_compte"/>
            </div>
            <div class="form-group row">
                <label for="montant" class="col-sm-2 col-form-label">Montant: </label><input type="text" name="montant"
                                                                                             id="montant"/>
            </div>
            <div class="form-group row">
                <label for="type_transaction" class="col-sm-2 col-form-label">Type de transaction: </label>
                <select class="form-control-sm" name="type_transaction">
                    <option value="Même banque">Même banque</option>
                    <option value="Intérac">Intérac</option>
                </select>
            </div>
            <div class="form-group row">
                <label for="destinataire" class="col-sm-2 col-form-label">Destinataire: </label><input id="destinataire"
                                                                                                       name="destinataire"
                                                                                                       type="text"/>
            </div>
            <div class="form-group row">
                <label for="courrielDestinataire" class="col-sm-2 col-form-label">Adresse courriel du
                    destinataire: </label><input id="courrielDestinataire"
                                                 name="courrielDestinataire"
                                                 type="text"/>
                <div class="col-sm-3">
                    <?= ($erreur == 'courriel') ? '<small class="text-danger">Entrez un courriel valide s.v.p.</small>' : '' ?>
                </div>

            </div>
            <fieldset class="form-group">
                <div class="row">
                    <label for="frequence" class="col-sm-2 col-form-label">Fréquence: </label>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="frequence" value="Une fois" id="uneFois"
                                   checked="checked"/>
                            <label class="form-check-label" for="uneFois">Une fois</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="frequence" value="Chaque semaine"
                                   id="semaine"/>
                            <label class="form-check-label" for="semaine">Chaque semaine</label>
                        </div>
                        <div class="form-check ">
                            <input class="form-check-input" type="radio" name="frequence" value="Chaque mois"
                                   id="mois"/>
                            <label class="form-check-label" for="mois">Chaque mois</label>
                        </div>
                    </div>

                </div>
            </fieldset>


            <input type="hidden" name="id" value="<?= $transaction['id'] ?>"/>
            <input class="btn btn-primary" type="submit" value="Envoyer"/>
        </div>
        <br>

    </form>

<?php $contenu = ob_get_clean(); ?>

<?php require 'Vue/gabarit.php'; ?>