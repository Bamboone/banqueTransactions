<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
</head>
<body>


<?php
// Connexion à la base de données
try {
    $bdd = new PDO('mysql:host=localhost;dbname=banque_web;charset=utf8', 'root', 'mysql');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

// Récupération de la transaction à supprimer
try {
    $req = $bdd->prepare('SELECT * FROM transactions WHERE id = ?');
    $req->execute(array($_GET['id']));
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
// Affichage de la transaction à supprimer (toutes les données externes sont protégées par htmlspecialchars)
$donnees = $req->fetch();
$req->closeCursor();

echo '
                <table>
                     <tr>
                        <td><strong>Numéro de compte :  </strong></td>
                        <td>' . htmlspecialchars($donnees['id_compte']) . '</td>
                     </tr>
                     <tr>
                        <td> Montant : </td>
                        <td>' . htmlspecialchars($donnees['montant']) . '</td>
                     </tr>
                     <tr>
                        <td>Type de transaction : </td>
                        <td>' . htmlspecialchars($donnees['type_transaction']) . '</td>
                     </tr>
                     <tr>
                        <td>Destinataire : </td>
                        <td>' . htmlspecialchars($donnees['destinataire']) . '</td>
                     </tr>
                     <tr>
                        <td>Fréquence : </td>
                        <td>' . htmlspecialchars($donnees['frequence']) . '</td>
                     </tr>
                </table>'

;
?>
<form action="transaction_supprimer.php" method="post">

    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
    <input type="submit" value="Supprimer" />
    <input type="submit" value="Annuler" onclick="location.href='index.php';return false;"/>
</form>

</body>
</html>