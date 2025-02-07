<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';

// Récupérer les données du formulaire
$numThem = ctrlSaisies($_POST['numThem']);

// Supression
sql_delete('THEMATIQUE', "numThem = $numThem");

// Redirection
header('Location: ../../views/backend/thematiques/list.php');
