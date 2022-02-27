<?php

class DAOrecherche
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

    public function searchDepart(){
        $requete = "SELECT * FROM departement order by departementnom";
        $req = $this->Bdd->prepare($requete);
        $req-> execute();
        $data = $req->fetchAll();

        return $data;
    }

    public function searchCity(){
        $requete = "SELECT * FROM cities WHERE department_code = ? order by name";
        $req = $this->Bdd->prepare($requete);
        $req-> execute(array($_POST['depart']));
        $data = $req->fetchAll();

        return $data;
    }


    public function searchJeune(){
        $depart = $_POST['departement-select'];
        //$taches = $_POST['selectTache'];

        $requete = "SELECT jeune.ID, NOM, PRENOM, AGE, name, ADRESSE, MAIL
                    FROM jeune, cities
                    WHERE jeune.VILLE = cities.id
                    AND department_code = ?";
        $req = $this->Bdd->prepare($requete);
        $req-> execute(array($depart));
        $data = $req->fetchAll();

        $cv = [];
        $i = 0;
        foreach($data as $dt){
            $requete = "SELECT competence.COMPETENCE
                    FROM jeune, CV, competence
                    WHERE jeune.ID = CV.ID_JEUNE
                    AND competence.ID = CV.ID_COMPETENCE
                    AND jeune.ID = ?";
            $req = $this->Bdd->prepare($requete);
            $req-> execute(array($dt['ID']));
            $data2 = $req->fetchAll();

            $cv[$i] = $dt;

            foreach ($data2 as $dt2){
                array_push($cv[$i], $dt2);
            }
            $i++;
        }

        return $cv;
    }

    public function addContrat(){
        $requete = "SELECT * FROM Contrat WHERE ID_RETRAITE = ? AND ID_JEUNE = ?";
        $req = $this->Bdd->prepare($requete);
        $req-> execute(array($_SESSION['idVieux'], $_POST['id']));
        $data = $req->fetchAll();

        if($data == null){
            $requete = "INSERT INTO Contrat(ID_JEUNE, ID_RETRAITE, ETAT) 
                    VALUES(?,?, 'En attente');";
            $req = $this->Bdd->prepare($requete);
            $req->execute(array($_POST['id'], $_SESSION['idVieux']));
        }else{
            return "Vous avez déjà demandé ce jeune.";
        }

    }

    public function getDemandeVieux(){
        $requete = "SELECT jeune.ID, ETAT, NOM, PRENOM, AGE, MAIL
                    FROM Contrat, jeune
                    WHERE Contrat.ID_JEUNE = jeune.ID
                    AND ID_RETRAITE = ?";
        $req = $this->Bdd->prepare($requete);
        $req-> execute(array($_SESSION['idVieux']));
        $data = $req->fetchAll();
        return $data;
    }



}
