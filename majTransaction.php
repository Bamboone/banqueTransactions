<?php
// Connexion à la base de données
try {
    $bdd = new PDO('mysql:host=localhost;dbname=banque_web;charset=utf8', 'root', 'mysql');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

// Insertion de la transaction à l'aide d'une requête préparée
$req = $bdd->prepare('UPDATE transactions SET id_compte = ?, montant = ?, type_transaction = ?, destinataire = ?, frequence = ? WHERE id = ?');
$req->execute(array($_POST['compte'], $_POST['montant'], $_POST['type_transaction'], $_POST['destinataire'], $_POST['frequence'], $_POST['id']));

header('Location: index.php');
?>

