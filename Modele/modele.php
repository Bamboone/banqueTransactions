<?php
function getBdd() {
    $bdd = new PDO('mysql:host=localhost;dbname=banque_web;charset=utf8', 'root', 'mysql', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $bdd;
}

function getComptes() {
    $bdd = getBdd();
    $comptes = $bdd->query('select id, type_compte, date, id_utilisateur from comptes');
    return $comptes;
}

function getCompte($idCompte) {
    $bdd = getBdd();
    $compte = $bdd->prepare('select id, type_compte, date, id_utilisateur from comptes where id=?');
    $compte->execute(array($idCompte));
    if($compte->rowCount() == 1)
        return $compte->fetch();
    else
        throw new Exception("Aucun compte ne correspond à l'identifiant '$idCompte'");
}

function getTransactions($idCompte) {
    $bdd = getBdd();
    $transactions = $bdd->prepare('select id, montant, type_transaction, destinataire, courrielDestinataire, frequence, id_compte from transactions where id_compte=?');
    $transactions->execute(array($idCompte));
    return $transactions;
}

function setTransaction($transaction) {
    $bdd = getBdd();
    $req = $bdd->prepare('INSERT INTO transactions (montant, type_transaction, destinataire, courrielDestinataire, frequence, id_compte ) VALUES(?, ?, ?, ?, ?, ?)');
    $req->execute(array($_POST['montant'], $_POST['type_transaction'], $_POST['destinataire'], $_POST['courrielDestinataire'], $_POST['frequence'], $_POST['id_compte']));
    return req;
}