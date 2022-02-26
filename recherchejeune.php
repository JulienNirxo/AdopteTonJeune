<?php
session_start();
require_once('Model/DAOrecherche.php');
$DAOrecherche = new DAOrecherche();

if(isset($_POST['search'])){
    $data = $DAOrecherche->searchJeune();
}
include("View/recherchejeune.php");