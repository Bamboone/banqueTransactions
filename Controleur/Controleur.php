<?php
require 'Modele/modele.php';


function accueil()
{
    $comptes = getComptes();
    require 'Vue/vueAccueil.php';
}

function compte($idCompte, $erreur)
{
    $compte = getCompte($idCompte);
    $transactions = getTransactions($idCompte);
    require 'Vue/vueCompte.php';
}

function transaction($transaction)
{
    $validation_courriel = filter_var($transaction['courrielDestinataire'], FILTER_VALIDATE_EMAIL);
    if ($validation_courriel) {
        setTransaction($transaction);
        header('Location: index.php?action=compte&id=' . $transaction['id_compte']);
    } else {
        //Recharger la page avec une erreur près du courriel
        header('Location: index.php?action=compte&id=' . $transaction['id_compte'] . '&erreur=courriel');
    }
}

function confirmer($id)
{
    $transaction = getTransaction($id);
    require 'Vue/vueConfirmer.php';
}

function supprimer($id)
{
    $transaction = getTransaction($id);
    deleteTransaction($id);
    header('Location: index.php?action=compte&id=' . $transaction['id_compte']);
}

function nouveauCompte()
{
    require 'Vue/vueAjouter.php';
}

function ajouter($compte)
{
    $validation_date = filter_var($compte['date'], FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/")));
    if ($validation_date) {
        setCompte($compte);
        header('Location: index.php');
    } else {
        header('Location: index.php?action=nouveauCompte&erreur=date');
    }

}

function modifier($id)
{
    $transaction = getTransaction($id);
    require 'Vue/vueModifier.php';
}

function appliquerModification($transaction)
{
    $validation_courriel = filter_var($transaction['courrielDestinataire'], FILTER_VALIDATE_EMAIL);
    if ($validation_courriel) {
        modifierTransaction($transaction);
        header('Location: index.php?action=compte&id=' . $transaction['id_compte']);
    } else {
        header('Location: index.php?action=modifier&id=' . $transaction['id'] . '&erreur=courriel');
    }
}

function quelsMontants($term)
{
    echo(searchMontant($term));

}

function erreur($msgErreur)
{
    require 'Vue/vueErreur.php';
}
