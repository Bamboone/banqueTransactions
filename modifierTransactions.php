<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Modifier une transaction</title>
    </head>
    <style>
        label
        {
            display: block;
            width: 150px;
            float: left;
        }
    </style>
    <body>


        <?php
// Connexion à la base de données
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=banque_web;charset=utf8', 'root', 'mysql');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

// Récupération de la transaction à modifier
        try {
			$req = $bdd->prepare('SELECT * FROM transactions WHERE id = ?');
			$req->execute(array($_GET['id']));
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
// Affichage de la transaction à modifer (toutes les données externes sont protégées par htmlspecialchars)
        $donnees = $req->fetch();
        $req->closeCursor();
        ?>

        <form action="majTransaction.php" method="post">
			<h2>Modifier une transaction</h2>
			<p>




                <label for="compte">Numéro de compte: </label><input type="text" name="compte" id="compte" value="<?php echo htmlspecialchars($donnees['id_compte']); ?>"/><br>
                <label for="montant">Montant: </label><input type="text" name="montant" id="montant" value="<?php echo htmlspecialchars($donnees['montant']); ?>"/><br>
                <label for="type_transaction">Type de transaction: </label>
                <select name="type_transaction">
                    <option value="Même banque" <?=$donnees['type_transaction'] == 'Même banque' ? ' selected="selected"' : '';?>>Même banque</option>
                    <option value="Intérac" <?=$donnees['type_transaction'] == 'Intérac' ? ' selected="selected"' : '';?>>Intérac</option>
                </select>
                <br>
                <label for="destinataire">Destinataire: </label><input type="text" name="destinataire" id="destinataire" value="<?php echo htmlspecialchars($donnees['destinataire']); ?>"/><br>
                <label for="frequence">Fréquence: </label>
                <input type="radio" name="frequence" value="Une fois" id="uneFois" <?=$donnees['frequence'] == 'Une fois' ? ' checked="checked"' : '';?>/> Une fois
                <input type="radio" name="frequence" value="Chaque semaine" id="semaine"  <?=$donnees['frequence'] == 'Chaque semaine' ? ' checked="checked"' : '';?>/> Chaque semaine
                <input type="radio" name="frequence" value="Chaque mois" id="mois" <?=$donnees['frequence'] == 'Chaque mois' ? ' checked="checked"' : '';?>/> Chaque mois <br>
                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
                <input type="submit" value="Modifier" />
                <input type="submit" value="Annuler" onclick="location.href='index.php';return false;"/>
            </p>

        </form>
    </body>
</html>



