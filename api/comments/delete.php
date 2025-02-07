<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';

// Récuperer la donnée du formulaire
$numCom = ctrlSaisies($_POST['numCom']);

// Supression
sql_delete('comment', "numCom = $numCom");

// Redirection
header('Location: ../../views/backend/comments/list.php'); 
