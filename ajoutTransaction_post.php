<?php
// Connexion à la base de données
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=banque_web;charset=utf8', 'root', 'mysql');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

// Insertion de la transaction à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO transactions (montant, type_transaction, destinataire, frequence, id_compte ) VALUES(?, ?, ?, ?, ?)');
$req->execute(array($_POST['montant'], $_POST['type_transaction'], $_POST['destinataire'], $_POST['frequence'], $_POST['compte']));

// Redirection du visiteur vers la page d'index
header('Location: index.php');
?>