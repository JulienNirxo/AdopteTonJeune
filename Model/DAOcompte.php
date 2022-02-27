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
            $requete = "INSERT INTO logement(VILLE,ADRESSE) 
                    VALUES(?,?);";
            $req = $this->Bdd->prepare($requete);
            $req-> execute(array($ville, $adresse));
            $req2 = $this->Bdd->lastInsertId();

            $requete = "INSERT INTO retraite(NOM, PRENOM, AGE, MAIL, PASSWORD, ID_LOGEMENT) 
                    VALUES(?,?,?,?,?,?);";
            $req = $this->Bdd->prepare($requete);
            $req-> execute(array($nom, $prenom, $age, $mail, $password, $req2));
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
                $requete = "SELECT * FROM retraite
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
        $Age = $_POST['Age'];
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

        if(ctype_digit($villeselect)){
            $requete = "UPDATE jeune SET VILLE = ? WHERE ID = ?";
            $req = $this->Bdd->prepare($requete);
            $req-> execute(array($villeselect, $_SESSION['idJeune']));
        }

        //cuisine
        if($Cuisine == "true"){
            $requete = "SELECT ID_COMPETENCE
                        FROM CV
                        WHERE ID_COMPETENCE = ?
                        AND ID_JEUNE = ?";
            $req = $this->Bdd->prepare($requete);
            $req-> execute(array(1, $_SESSION['idJeune']));
            $data = $req->fetch();

            if($data == null) {
                $requete = "INSERT INTO CV(ID_COMPETENCE,ID_JEUNE) 
                    VALUES(?,?);";
                $req = $this->Bdd->prepare($requete);
                $req->execute(array(1, $_SESSION['idJeune']));
            }
        }else{
            $requete = "DELETE FROM CV WHERE ID_COMPETENCE = ? AND ID_JEUNE = ? ";
            $req = $this->Bdd->prepare($requete);
            $req-> execute(array(1, $_SESSION['idJeune']));
        }

        //Menage
        if($Menage == "true"){
            $requete = "SELECT ID_COMPETENCE
                        FROM CV
                        WHERE ID_COMPETENCE = ?
                        AND ID_JEUNE = ?";
            $req = $this->Bdd->prepare($requete);
            $req-> execute(array(2, $_SESSION['idJeune']));
            $data = $req->fetch();

            if($data == null) {
                $requete = "INSERT INTO CV(ID_COMPETENCE,ID_JEUNE) 
                    VALUES(?,?);";
                $req = $this->Bdd->prepare($requete);
                $req->execute(array(2, $_SESSION['idJeune']));
            }
        }else{
            $requete = "DELETE FROM CV WHERE ID_COMPETENCE = ? AND ID_JEUNE = ? ";
            $req = $this->Bdd->prepare($requete);
            $req-> execute(array(2, $_SESSION['idJeune']));
        }

        //Animaux
        if($Animaux == "true"){
            $requete = "SELECT ID_COMPETENCE
                        FROM CV
                        WHERE ID_COMPETENCE = ?
                        AND ID_JEUNE = ?";
            $req = $this->Bdd->prepare($requete);
            $req-> execute(array(5, $_SESSION['idJeune']));
            $data = $req->fetch();

            if($data == null) {
                $requete = "INSERT INTO CV(ID_COMPETENCE,ID_JEUNE) 
                    VALUES(?,?);";
                $req = $this->Bdd->prepare($requete);
                $req->execute(array(5, $_SESSION['idJeune']));
            }
        }else{
            $requete = "DELETE FROM CV WHERE ID_COMPETENCE = ? AND ID_JEUNE = ? ";
            $req = $this->Bdd->prepare($requete);
            $req-> execute(array(5, $_SESSION['idJeune']));
        }

        //Jardinage
        if($Jardinage == "true"){
            $requete = "SELECT ID_COMPETENCE
                        FROM CV
                        WHERE ID_COMPETENCE = ?
                        AND ID_JEUNE = ?";
            $req = $this->Bdd->prepare($requete);
            $req-> execute(array(7, $_SESSION['idJeune']));
            $data = $req->fetch();

            if($data == null) {
                $requete = "INSERT INTO CV(ID_COMPETENCE,ID_JEUNE) 
                    VALUES(?,?);";
                $req = $this->Bdd->prepare($requete);
                $req->execute(array(7, $_SESSION['idJeune']));
            }
        }else{
            $requete = "DELETE FROM CV WHERE ID_COMPETENCE = ? AND ID_JEUNE = ? ";
            $req = $this->Bdd->prepare($requete);
            $req-> execute(array(7, $_SESSION['idJeune']));
        }

        //Courses
        if($Courses == "true"){
            $requete = "SELECT ID_COMPETENCE
                        FROM CV
                        WHERE ID_COMPETENCE = ?
                        AND ID_JEUNE = ?";
            $req = $this->Bdd->prepare($requete);
            $req-> execute(array(8, $_SESSION['idJeune']));
            $data = $req->fetch();

            if($data == null) {
                $requete = "INSERT INTO CV(ID_COMPETENCE,ID_JEUNE) 
                    VALUES(?,?);";
                $req = $this->Bdd->prepare($requete);
                $req->execute(array(8, $_SESSION['idJeune']));
            }
        }else{
            $requete = "DELETE FROM CV WHERE ID_COMPETENCE = ? AND ID_JEUNE = ? ";
            $req = $this->Bdd->prepare($requete);
            $req-> execute(array(8, $_SESSION['idJeune']));
        }

        //Jeux de sociétés
        if($Jeuxdesociete == "true"){
            $requete = "SELECT ID_COMPETENCE
                        FROM CV
                        WHERE ID_COMPETENCE = ?
                        AND ID_JEUNE = ?";
            $req = $this->Bdd->prepare($requete);
            $req-> execute(array(9, $_SESSION['idJeune']));
            $data = $req->fetch();

            if($data == null) {
                $requete = "INSERT INTO CV(ID_COMPETENCE,ID_JEUNE) 
                    VALUES(?,?);";
                $req = $this->Bdd->prepare($requete);
                $req->execute(array(9, $_SESSION['idJeune']));
            }
        }else{
            $requete = "DELETE FROM CV WHERE ID_COMPETENCE = ? AND ID_JEUNE = ? ";
            $req = $this->Bdd->prepare($requete);
            $req-> execute(array(9, $_SESSION['idJeune']));
        }

        //Bricolage
        if($Bricolage == "true"){
            $requete = "SELECT ID_COMPETENCE
                        FROM CV
                        WHERE ID_COMPETENCE = ?
                        AND ID_JEUNE = ?";
            $req = $this->Bdd->prepare($requete);
            $req-> execute(array(10, $_SESSION['idJeune']));
            $data = $req->fetch();

            if($data == null) {
                $requete = "INSERT INTO CV(ID_COMPETENCE,ID_JEUNE) 
                    VALUES(?,?);";
                $req = $this->Bdd->prepare($requete);
                $req->execute(array(10, $_SESSION['idJeune']));
            }
        }else{
            $requete = "DELETE FROM CV WHERE ID_COMPETENCE = ? AND ID_JEUNE = ? ";
            $req = $this->Bdd->prepare($requete);
            $req-> execute(array(10, $_SESSION['idJeune']));
        }

        //Livraison de repas
        if($Livraisonderepas == "true"){
            $requete = "SELECT ID_COMPETENCE
                        FROM CV
                        WHERE ID_COMPETENCE = ?
                        AND ID_JEUNE = ?";
            $req = $this->Bdd->prepare($requete);
            $req-> execute(array(11, $_SESSION['idJeune']));
            $data = $req->fetch();

            if($data == null) {
                $requete = "INSERT INTO CV(ID_COMPETENCE,ID_JEUNE) 
                    VALUES(?,?);";
                $req = $this->Bdd->prepare($requete);
                $req->execute(array(11, $_SESSION['idJeune']));
            }
        }else{
            $requete = "DELETE FROM CV WHERE ID_COMPETENCE = ? AND ID_JEUNE = ? ";
            $req = $this->Bdd->prepare($requete);
            $req-> execute(array(11, $_SESSION['idJeune']));
        }

        //Accompagnement vehicule
        if($Accompagnementvehicule == "true"){
            $requete = "SELECT ID_COMPETENCE
                        FROM CV
                        WHERE ID_COMPETENCE = ?
                        AND ID_JEUNE = ?";
            $req = $this->Bdd->prepare($requete);
            $req-> execute(array(12, $_SESSION['idJeune']));
            $data = $req->fetch();

            if($data == null) {
                $requete = "INSERT INTO CV(ID_COMPETENCE,ID_JEUNE) 
                    VALUES(?,?);";
                $req = $this->Bdd->prepare($requete);
                $req->execute(array(12, $_SESSION['idJeune']));
            }
        }else{
            $requete = "DELETE FROM CV WHERE ID_COMPETENCE = ? AND ID_JEUNE = ? ";
            $req = $this->Bdd->prepare($requete);
            $req-> execute(array(12, $_SESSION['idJeune']));
        }
    }

    public function getCheckCompetence(){
        $requete = "SELECT ID_COMPETENCE
                    FROM CV
                    WHERE ID_JEUNE = ?";
        $req = $this->Bdd->prepare($requete);
        $req-> execute(array($_SESSION['idJeune']));
        return $req->fetchAll();
    }

    public function getDemande(){
        $requete = "SELECT retraite.ID, NOM, PRENOM, AGE, name, MAIL, logement.ADRESSE, zip_code, ETAT
                    FROM Contrat, retraite, logement, cities
                    WHERE Contrat.ID_RETRAITE = retraite.ID
                    AND retraite.ID_LOGEMENT = logement.ID
                    AND logement.VILLE = cities.id
                    AND ETAT = 'En attente'
                    AND ID_JEUNE = ?";
        $req = $this->Bdd->prepare($requete);
        $req-> execute(array($_SESSION['idJeune']));
        return $req->fetchAll();
    }

    public function DemandeValide(){
        $requete = "UPDATE Contrat SET ETAT = 'Valider' WHERE ID_JEUNE = ?";
        $req = $this->Bdd->prepare($requete);
        $req-> execute(array($_SESSION['idJeune']));
    }

    public function DemandesInvalide(){
        $requete = "UPDATE Contrat SET ETAT = 'Refuser' WHERE ID_JEUNE = ?";
        $req = $this->Bdd->prepare($requete);
        $req-> execute(array($_SESSION['idJeune']));
    }

    //z
    public function addNote(){
        $requete = "INSERT INTO avis(AVIS ,NOTE, ID_JEUNE) 
                    VALUES(?,?,?);";
        $req = $this->Bdd->prepare($requete);
        $req->execute(array($_POST['avis'], $_POST['note'], $_POST['idjeune']));
    }

    public function getNote(){
        $requete = "SELECT AVIS, NOTE
                    FROM avis
                    WHERE ID_JEUNE = ?";
        $req = $this->Bdd->prepare($requete);
        $req-> execute(array($_SESSION['idJeune']));
        return $req->fetchAll();
    }

}
