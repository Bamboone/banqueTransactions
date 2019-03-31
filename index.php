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
                    $compte = getCompte($id);
                    $transaction = $_POST;
                    transaction($transaction);
                } else
                    throw new Exception("Identifiant de compte incorrect");
            } else
                throw new Exception("Aucun identifiant de compte");

            // Confirmer la suppression
        } else if ($_GET['action'] == 'confirmer') {
            if (isset($_GET['id'])) {
                // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
                $id = intval($_GET['id']);
                if ($id != 0) {
                    confirmer($id);
                } else
                    throw new Exception("Identifiant de transaction incorrect");
            } else
                throw new Exception("Aucun identifiant de transaction");

        } else if ($_GET['action'] == 'supprimer') {
            if (isset($_POST['id'])) {
                // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
                $id = intval($_POST['id']);
                if ($id != 0) {
                    supprimer($id);
                } else
                    throw new Exception("Identifiant de transaction incorrect");
            } else
                throw new Exception("Aucun identifiant de transaction");

        } else if ($_GET['action'] == 'nouveauCompte') {
            nouveauCompte();
        } else if ($_GET['action'] == 'ajouter') {
            $compte = $_POST;
            ajouter($compte);

        } else if ($_GET['action'] == 'modifier') {
            if (isset($_GET['id'])) {
                // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
                $id = intval($_GET['id']);
                if ($id != 0) {
                    modifier($id);
                } else
                    throw new Exception("Identifiant de transaction incorrect");
            } else
                throw new Exception("Aucun identifiant de transaction");
        } else if ($_GET['action'] == 'appliquerModification') {
            if (isset($_POST['id'])) {
                // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
                $id = intval($_POST['id']);
                if ($id != 0) {
                    $transaction = $_POST;
                    appliquerModification($transaction);
                } else
                    throw new Exception("Identifiant de transaction incorrect");
            } else
                throw new Exception("Aucun identifiant de transaction");

        }
    } else {
        accueil();  // action par défaut
    }
} catch (Exception $e) {
    erreur($e->getMessage());
}