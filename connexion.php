<?php
session_start();
include("View/connexion.php");
require_once('Model/DAOcompte.php');
$connect = new DAOcompte();

if(isset($_POST['btnconnexion'])) {
    $connect->connectuser($_POST['email'], $_POST['mdp'], $_POST['type']);
}