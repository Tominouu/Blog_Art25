<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';

// Récupérer les données du formulaire
$numMemb = ctrlSaisies($_POST['numMemb']);

// Supression
sql_delete('membre', "numMemb = $numMemb");

// Redirection
header('Location: ../../views/backend/members/list.php'); 
