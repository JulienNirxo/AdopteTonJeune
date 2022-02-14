<?php

class DAOcompte
{
    //attribut
    private $Bdd;
    private $Hotebd = 'adoptetonjeune.fr';
    private $Nombd = 'adoptetonjeune';
    private $NomUserbd = 'adoptetonjeune';
    private $Mdpbd = 'pataprout69';

    //constructeur
    public function __construct()
    {
        try {
            $this->Bdd = new PDO('mysql:host=' . $this->Hotebd . ';dbname=' . $this->Nombd . ';utf8_bin',
                $this->NomUserbd,
                $this->Mdpbd
            );
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    /**
     * Inscription
     *
     * @param $nom
     * @param $prenom
     * @param $age
     * @param $adresse
     * @param $ville
     * @param $cp
     * @param $mail
     * @param $password
     * @param $type
     */
    public function adduser($nom, $prenom, $age, $adresse, $ville, $cp, $mail, $password, $type){
        if($type == 'jeune'){
            $requete = "INSERT INTO jeune(NOM, PRENOM, AGE, ADRESSE, VILLE, MAIL, PASSWORD) 
                    VALUES(?,?,?,?,?,?,?);";
            $req = $this->Bdd->prepare($requete);
            $req-> execute(array($nom, $prenom, $age, $adresse, $ville, $mail, $password));
            $data = $req->fetch();
            $_SESSION['idJeune'] = $this->Bdd->lastInsertId();

        }if($type == "vieux"){
            $requete = "INSERT INTO logement(ADRESSE, CP) 
                    VALUES(?,?);";
            $req = $this->Bdd->prepare($requete);
            $req-> execute(array($adresse, $ville));
            $req2 = $this->Bdd->lastInsertId();

            $requete = "INSERT INTO retraite(NOM, PRENOM, AGE, ADRESSE, VILLE, MAIL, PASSWORD, ID_LOGEMENT) 
                    VALUES(?,?,?,?,?,?,?,?);";
            $req = $this->Bdd->prepare($requete);
            $req-> execute(array($nom, $prenom, $age, $adresse, $ville, $mail, $password, $req2));
            $data = $req->fetch();

            $_SESSION['idVieux'] = $this->Bdd->lastInsertId();
        }

    }


    /**
     * Connexion
     * @param $mail
     * @param $password
     * @param $type
     */
    public function connectuser($mail, $password, $type){

        if($type == 'jeune'){
            $requete = 'SELECT MAIL, PASSWORD FROM jeune WHERE MAIL = ?';
            $req = $this->Bdd ->prepare($requete);
            $req-> execute(array($mail));
            $data = $req->fetch();

            $mdphacher = password_verify($password, $data['PASSWORD']);

            if($mdphacher == $password && $mail == $data['MAIL']){
                $requete = "SELECT ID, NOM, PRENOM, AGE, ADRESSE, VILLE, MAIL FROM jeune
                    WHERE MAIL = ?";
                $req = $this->Bdd->prepare($requete);
                $req-> execute(array($mail));
                $data = $req->fetch();
                if($data['MAIL'] == $mail){
                    $_SESSION['idJeune'] = $data['ID'];
                    echo  $_SESSION['idJeune'];
                    echo '<script language="Javascript">
                    document.location.replace("index.php");
                    </script>';
                }
            }


        }if($type == "vieux"){
            $requete = 'SELECT MAIL, PASSWORD FROM retraite WHERE MAIL = ?';
            $req = $this->Bdd ->prepare($requete);
            $req-> execute(array($mail));
            $data = $req->fetch();

            $mdphacher = password_verify($password, $data['PASSWORD']);

            if($mdphacher == $password && $mail == $data['MAIL']){
                $requete = "SELECT NOM, PRENOM, AGE, ADRESSE, VILLE, MAIL, ID_LOGEMENT FROM retraite
                    WHERE MAIL = ?";
                $req = $this->Bdd->prepare($requete);
                $req-> execute(array($mail));
                $data = $req->fetch();

                if($data['MAIL'] == $mail){
                    $_SESSION['idVieux'] = $data['ID'];
                    echo '<script language="Javascript">
                    document.location.replace("index.php");
                    </script>';
                }
            }
        }
    }

    public function getCV(){
        $requete = "SELECT NOM, PRENOM, AGE, ADRESSE, name, departementnom, department_code, MAIL
                    FROM jeune, cities, departement
                    WHERE jeune.ID = ?
                    AND jeune.VILLE = cities.id
                    AND departement.departementcode = cities.department_code";
        $req = $this->Bdd->prepare($requete);
        $req-> execute(array($_SESSION['idJeune']));
        return $req->fetch();
    }


    public function sendModifCV(){
        $Mail = $_POST['Mail'];
        $Nom = $_POST['Nom'];
        $Prenom = $_POST['Prenom'];
        $Age = $_POST['Mail'];
        $Adresse = $_POST['Adresse'];
        $departementselect = $_POST['departementselect'];
        $villeselect = $_POST['villeselect'];
        $Cuisine = $_POST['Cuisine'];
        $Menage = $_POST['Menage'];
        $Animaux = $_POST['Animaux'];
        $Jardinage = $_POST['Jardinage'];
        $Courses = $_POST['Courses'];
        $Jeuxdesociete = $_POST['Jeuxdesociete'];
        $Bricolage = $_POST['Bricolage'];
        $Livraisonderepas = $_POST['Livraisonderepas'];
        $Accompagnementvehicule = $_POST['Accompagnementvehicule'];


        $requete = "UPDATE jeune SET MAIL = ? WHERE ID = ?";
        $req = $this->Bdd->prepare($requete);
        $req-> execute(array($Mail, $_SESSION['idJeune']));

        $requete = "UPDATE jeune SET NOM = ? WHERE ID = ?";
        $req = $this->Bdd->prepare($requete);
        $req-> execute(array($Nom, $_SESSION['idJeune']));

        $requete = "UPDATE jeune SET PRENOM = ? WHERE ID = ?";
        $req = $this->Bdd->prepare($requete);
        $req-> execute(array($Prenom, $_SESSION['idJeune']));

        $requete = "UPDATE jeune SET AGE = ? WHERE ID = ?";
        $req = $this->Bdd->prepare($requete);
        $req-> execute(array($Age, $_SESSION['idJeune']));

        $requete = "UPDATE jeune SET ADRESSE = ? WHERE ID = ?";
        $req = $this->Bdd->prepare($requete);
        $req-> execute(array($Adresse, $_SESSION['idJeune']));

        $stractuellement = "actuellement";
        if(strpos($departementselect, $stractuellement) !== false){
            $requete = "UPDATE jeune SET VILLE = ? WHERE ID = ?";
            $req = $this->Bdd->prepare($requete);
            $req-> execute(array($Adresse, $_SESSION['idJeune']));
        }
    }



}
