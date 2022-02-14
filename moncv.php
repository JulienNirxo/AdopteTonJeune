<?php
session_start();
require_once('Model/DAOcompte.php');
$connect = new DAOcompte();
$data = $connect->getCV();
include("View/moncv.php");