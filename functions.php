<?php
session_start();
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


/*****************************INDEX + inscription *************************************/
//recherche ville
if(isset($_POST['city'])){
    $data['city'] = $recherche->searchCity();
    print json_encode($data['city']);
}
//recherche des départements
else if(isset($_POST['depart'])){
    $data['depart'] = $recherche->searchDepart();
    print json_encode($data['depart']);
}


/*********************MON CV******************************/
if(isset($_POST['lesmodifs'])){
    $compte->sendModifCV();
    print true;
}

if(isset($_POST['checkCompetence'])){
    $data['check'] = $compte->getCheckCompetence();
    print json_encode($data['check']);
}

/***************MES DEMANDES*******************/
if(isset($_POST['mesDemandes'])){
    $data['mesDemandes'] = $compte->getDemande();
    print json_encode($data['mesDemandes']);
}

if(isset($_POST['mesDemandesValide'])){
    $compte->DemandeValide();
    print 1;
}

if(isset($_POST['mesDemandesInvalide'])){
    $compte->DemandesInvalide();
    print 1;
}

if(isset($_POST['mesDemandesVieux'])){
    $data['mesDemandesVieux'] = $recherche->getDemandeVieux();
    print json_encode($data['mesDemandesVieux']);
}

/*********************RECHERCHE****************/
if(isset($_POST['contrat'])){
    $data['contrat'] = $recherche->addContrat();
    print json_encode($data['contrat']);
}

