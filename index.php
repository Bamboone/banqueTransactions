<?php

require './Controleur/Controleur.php';

try {
    if (isset($_GET['action'])) {

        // Afficher un article
        if ($_GET['action'] == 'compte') {
            if (isset($_GET['id'])) {
                // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
                $id = intval($_GET['id']);
                if ($id != 0) {
                    $erreur = isset($_GET['erreur']) ? $_GET['erreur'] : '';
                    compte($id, $erreur);
                } else
                    throw new Exception("Identifiant de compte incorrect");
            } else
                throw new Exception("Aucun identifiant de compte");
        } else if ($_GET['action'] == 'transaction') {
        if (isset($_POST['id_compte'])) {
            // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
            $id = intval($_POST['id_compte']);
            if ($id != 0) {
                // vérifier si l'article existe;
                $compte = getCompte($id);
                // Récupérer les données du formulaire
                $transaction = $_POST;
                //Réaliser l'action commentaire du contrôleur
                transaction($transaction);
            } else
                throw new Exception("Identifiant d'article incorrect");
        } else
            throw new Exception("Aucun identifiant d'article");

        // Confirmer la suppression
    }
    } else {
        accueil();  // action par défaut
    }
} catch (Exception $e) {
    echo $e->getMessage();
    //erreur($e->getMessage());
}