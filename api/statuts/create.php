<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';

// Récupérer les données du formulaire
$libStat = ctrlSaisies($_POST['libStat']);

// Insertion
sql_insert('STATUT', 'libStat', "'$libStat'");

// Redirection
header('Location: ../../views/backend/statuts/list.php');