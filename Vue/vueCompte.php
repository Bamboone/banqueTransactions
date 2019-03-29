<?php $titre = "La banque web - " . $compte['id']; ?>

<?php ob_start(); ?>
    <style>
        label
        {
            display: block;
            width: 250px;
            float: left;
        }
    </style>
    <article>
        <header>
            <h1>Informations sur le compte <?= $compte['id'] ?></h1>

            <h3>Type de compte: <?= $compte['type_compte'] ?></h3>
            <time>Date d'ouverture: <?= $compte['date'] ?></time>
            <h3>Numéro d'utilisateur: <?= $compte['id_utilisateur'] ?></h3>
        </header>
    </article>
    <hr />
    <header>
        <h1>Transactions du compte numéro <?= $compte['id'] ?></h1>
    </header>
<?php foreach ($transactions as $transaction): ?>
    <p><a href="index.php?action=confirmer&id=<?= $transaction['id'] ?>" >[Supprimer]</a>
       <strong>Montant de: <?= $transaction['montant'] ?>$</strong> à <?= $transaction['destinataire'] ?> (<?= $transaction['courrielDestinataire'] ?>). Envoyée: <?= $transaction['frequence'] ?>, de type: <?= $transaction['type_transaction'] ?><br/>
        <strong></strong><br/>
    </p>
<?php endforeach; ?>

    <form action="index.php?action=transaction" method="post">
        <h2>Ajouter une transaction</h2>
        <p>
            <label for="compte">Numéro de compte: </label><input type="text" name="compte" id="compte" /><br>
            <label for="montant">Montant: </label><input type="text" name="montant" id="montant" /><br>
            <label for="type_transaction">Type de transaction: </label>
            <select name="type_transaction">
                <option value="Même banque">Même banque</option>
                <option value="Intérac">Intérac</option>
            </select>
            <br>
            <label for="destinataire">Destinataire: </label><input id="destinataire" name="destinataire"
                                                                   type="text"/><br>
            <label for="courrielDestinataire">Adresse courriel du destinataire: </label><input id="courrielDestinataire" name="courrielDestinataire"
                                                                   type="text"/>
            <br>
            <label for="frequence">Fréquence: </label>
            <input type="radio" name="frequence" value="Une fois" id="uneFois" checked="checked" /> Une fois
            <input type="radio" name="frequence" value="Chaque semaine" id="semaine" /> Chaque semaine
            <input type="radio" name="frequence" value="Chaque mois" id="mois" /> Chaque mois <br>
            <input type="hidden" name="id_compte" value="<?= $compte['id'] ?>" /><br />
            <input type="submit" value="Envoyer" />
        </p>
    </form>

<?php $contenu = ob_get_clean(); ?>

<?php require 'Vue/gabarit.php'; ?>