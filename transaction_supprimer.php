<?php
// Connexion à la base de données
try {
    $bdd = new PDO('mysql:host=localhost;dbname=banque_web;charset=utf8', 'root', 'mysql');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

// Insertion de la transaction à l'aide d'une requête préparée
$req = $bdd->prepare('DELETE from transactions WHERE id = ?');
$req -> execute(array($_POST['id']));

header('Location: index.php');
?>