<?php
require  'Modele/modele.php';

function accueil() {
    $comptes = getComptes();
    require  'Vue/vueAccueil.php';
}

function compte($idCompte, $erreur) {
    $compte = getCompte($idCompte);
    $transactions = getTransactions($idCompte);
    require  'Vue/vueCompte.php';
}

function transaction($transaction){
    $validation_courriel = filter_var($transaction['courrielDestinataire'], FILTER_VALIDATE_EMAIL);
    echo "allp";
    if ($validation_courriel) {
        // Ajouter le commentaire à l'aide du modèle
        setTransaction($transaction);
        //Recharger la page pour mettre à jour la liste des commentaires associés
        header('Location: index.php?action=compte&id=' . $transaction['id_compte']);
    } else {
        //Recharger la page avec une erreur près du courriel
        header('Location: index.php?action=compte&id=' . $transaction['id_compte'] . '&erreur=courriel');
    }
}