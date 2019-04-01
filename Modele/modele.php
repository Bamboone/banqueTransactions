<?php

function getBdd()
{
    $bdd = new PDO('mysql:host=localhost;dbname=banque_web;charset=utf8', 'root', 'mysql', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $bdd;
}

function getComptes()
{
    $bdd = getBdd();
    $comptes = $bdd->query('select id, type_compte, date, id_utilisateur from comptes');
    return $comptes;
}

function getCompte($idCompte)
{
    $bdd = getBdd();
    $compte = $bdd->prepare('select id, type_compte, date, id_utilisateur from comptes where id=?');
    $compte->execute(array($idCompte));
    if ($compte->rowCount() == 1)
        return $compte->fetch();
    else
        throw new Exception("Aucun compte ne correspond à l'identifiant '$idCompte'");
}

function getTransactions($idCompte)
{
    $bdd = getBdd();
    $transactions = $bdd->prepare('select id, montant, type_transaction, destinataire, courrielDestinataire, frequence, id_compte from transactions where id_compte=?');
    $transactions->execute(array($idCompte));
    return $transactions;
}

function getTransaction($id)
{
    $bdd = getBdd();
    $transaction = $bdd->prepare('select id, montant, type_transaction, destinataire, courrielDestinataire, frequence, id_compte from transactions where id=?');
    $transaction->execute(array($id));
    if ($transaction->rowCount() == 1)
        return $transaction->fetch();  // Accès à la première ligne de résultat
    else
        throw new Exception("Aucune transaction ne correspond à l'identifiant '$id'");
    return $transaction;
}

function setTransaction($transaction)
{
    $bdd = getBdd();
    $req = $bdd->prepare('INSERT INTO transactions (montant, type_transaction, destinataire, courrielDestinataire, frequence, id_compte ) VALUES(?, ?, ?, ?, ?, ?)');
    $req->execute(array($transaction['montant'], $transaction['type_transaction'], $transaction['destinataire'], $transaction['courrielDestinataire'], $transaction['frequence'], $transaction['id_compte']));
    return req;
}

function deleteTransaction($id)
{
    $bdd = getBdd();
    $result = $bdd->prepare('DELETE FROM transactions'
        . ' WHERE id = ?');
    $result->execute(array($id));
    return $result;
}

function setCompte($compte)
{
    $bdd = getBdd();
    $req = $bdd->prepare('INSERT INTO comptes (type_compte, date, id_utilisateur) VALUES(?, ?, ?)');
    $req->execute(array($_POST['type_compte'], $_POST['date'], $_POST['id_utilisateur']));
    return req;
}

function modifierTransaction($transacton)
{
    $bdd = getBdd();
    $req = $bdd->prepare('UPDATE transactions SET id_compte = ?, montant = ?, type_transaction = ?, destinataire = ?, courrielDestinataire=?, frequence = ? WHERE id = ?');
    $req->execute(array($transacton['id_compte'], $transacton['montant'], $transacton['type_transaction'], $transacton['destinataire'], $transacton['courrielDestinataire'], $transacton['frequence'], $transacton['id']));
}

function searchMontant($term)
{
    $conn = getBdd();
    $stmt = $conn->prepare('SELECT montant FROM montants WHERE montant LIKE :term');
    $stmt->execute(array('term' => '%' . $term . '%'));

    while ($row = $stmt->fetch()) {
        $return_arr[] = $row['montant'];
    }

    /* Toss back results as json encoded array. */
    return json_encode($return_arr);
}