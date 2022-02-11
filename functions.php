<?php
require_once('Model/DAOcompte.php');
require_once('Model/DAOrecherche.php');
$compte = new DAOcompte();
$recherche = new DAOrecherche();

/**************************UTILISATEUR********************************/
//inscription de l'utilisateur
if(isset($_POST['inscription'])) {
    if($_POST['mdp2'] == $_POST['mdp']){
        $_POST['mdp'] = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
        //NOM, PRENOM, AGE, ADRESSE, VILLE, CP, MAIL, PASSWORD
        $compte->adduser($_POST['nom'], $_POST['prenom'], $_POST['age'], $_POST['adresse'], $_POST['ville'], $_POST['cp'], $_POST['email'], $_POST['mdp'], $_POST['type']);
    }
}


/*****************************INDEX*************************************/
//recherche des départements
if(isset($_POST['depart'])){
    $data['depart'] = $recherche->searchDepart();
    print json_encode($data['depart']);
}