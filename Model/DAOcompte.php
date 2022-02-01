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

    public function adduser($nom, $prenom, $age, $adresse, $ville, $cp, $mail, $password, $type){
        echo $nom;
        /*
        if($type == 'jeune'){
            $requete = "INSERT INTO jeune(NOM, PRENOM, AGE, ADRESSE, VILLE, CP, MAIL, PASSWORD) 
                    VALUES(?,?,?,?,?,?,?,?);";
            $req = $this->Bdd->prepare($requete);
            $req-> execute(array($nom, $prenom, $age, $adresse, $ville, $cp, $mail, $password));
            echo "un jeune";
            $data = $req->fetch();
        }if($type == "vieux"){
            $requete = "INSERT INTO retraite(ADRESSE, CP) 
                    VALUES(?,?);";
            $req = $this->Bdd->prepare($requete);
            $req-> execute(array($adresse, $cp));
            $data = $req->fetch();
            $req2 = "SELECT LAST_INSERT_ID()";

            $requete = "INSERT INTO retraite(NOM, PRENOM, AGE, ADRESSE, VILLE, CP, MAIL, PASSWORD, ID_LOGEMENT) 
                    VALUES(?,?,?,?,?,?,?,?,?);";
            $req = $this->Bdd->prepare($requete);
            $req-> execute(array($nom, $prenom, $age, $adresse, $ville, $cp, $mail, $password, $req2));
            echo "un vieux";
            $data = $req->fetch();
        }*/

    }

    public function connectuser($mail, $password, $type){

        if($type == 'jeune'){
            $requete = 'SELECT MAIL, PASSWORD FROM jeune WHERE MAIL = ?';
            $req = $this->Bdd ->prepare($requete);
            $req-> execute(array($mail));
            $data = $req->fetch();

            $mdphacher = password_verify($password, $data['PASSWORD']);

            if($mdphacher == $password && $mail == $data['MAIL']){
                $requete = "SELECT NOM, PRENOM, AGE, ADRESSE, VILLE, CP, MAIL FROM jeune
                    WHERE MAIL = ?";
                $req = $this->Bdd->prepare($requete);
                $req-> execute(array($mail));
                echo "un jeune";
                $data = $req->fetch();
                if($data['MAIL'] == $mail){
                    header('Location: index.php');
                }
            }


        }if($type == "vieux"){
            $requete = 'SELECT MAIL, PASSWORD FROM retraite WHERE MAIL = ?';
            $req = $this->Bdd ->prepare($requete);
            $req-> execute(array($mail));
            $data = $req->fetch();

            $mdphacher = password_verify($password, $data['PASSWORD']);

            if($mdphacher == $password && $mail == $data['MAIL']){
                $requete = "SELECT NOM, PRENOM, AGE, ADRESSE, VILLE, CP, MAIL, ID_LOGEMENT FROM retraite
                    WHERE MAIL = ?";
                $req = $this->Bdd->prepare($requete);
                $req-> execute(array($mail));
                echo "un vieux";
                $data = $req->fetch();

                if($data['MAIL'] == $mail){
                    header('Location: index.php');
                }
            }
        }
    }



}
