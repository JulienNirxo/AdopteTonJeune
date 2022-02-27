<?php
session_start();
require_once('Model/DAOcompte.php');

$compte = new DAOcompte();
$note = $compte->getNote();

include("View/avis.php");
