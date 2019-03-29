<?php
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'mysql');
define('DB_NAME', 'banque_web');


if (isset($_GET['term'])){
    $return_arr = array();

    try {
        $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $req = $bdd->prepare('SELECT distinct destinataire FROM transactions WHERE destinataire LIKE :term');
        $req->execute(array('term' => '%'.$_GET['term'].'%'));


        while($row = $req->fetch()) {
            $return_arr[] =  $row['destinataire'];
        }

    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }

    echo json_encode($return_arr);
}
?>