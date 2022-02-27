<?php
session_start();
require_once('Model/DAOcompte.php');
$compte = new DAOcompte();

if(isset($_POST['validernote'])){
    $compte->addNote();
}

include("View/homevieux.php");