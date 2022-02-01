<?php
require_once('Model/DAOcompte.php');
$connect = new DAOcompte();

echo json_encode('tetsts');
/*if(isset($_POST['inscription'])) {
    if($_POST['mdp2'] == $_POST['mdp']){
        $_POST['mdp'] = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
        //NOM, PRENOM, AGE, ADRESSE, VILLE, CP, MAIL, PASSWORD
        $connect->adduser($_POST['nom'], $_POST['prenom'], $_POST['age'], $_POST['adresse'], $_POST['ville'], $_POST['cp'], $_POST['email'], $_POST['mdp'], $_POST['type']);
    }
}*/