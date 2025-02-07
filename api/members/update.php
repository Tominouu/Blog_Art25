<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';

// Récupérer les données du formulaire
$numMemb = ctrlSaisies($_POST['numMemb']);
$nomMemb = ctrlSaisies($_POST['nomMemb']);
$prenomMemb = ctrlSaisies($_POST['prenomMemb']);
$pseudoMemb = ctrlSaisies($_POST['pseudoMemb']);
$passMemb = ctrlSaisies($_POST['passMemb']);
$eMailMemb = ctrlSaisies($_POST['eMailMemb']);


// Modifications
sql_update('membre', "nomMemb = '$nomMemb'", "numMemb = $numMemb");
sql_update('membre', "prenomMemb = '$prenomMemb'", "numMemb = $numMemb");
sql_update('membre', "pseudoMemb = '$pseudoMemb'", "numMemb = $numMemb");
sql_update('membre', "passMemb = '$passMemb'", "numMemb = $numMemb");
sql_update('membre', "eMailMemb = '$eMailMemb'", "numMemb = $numMemb");

// Redirection
header('Location: ../../views/backend/members/list.php');
?>
