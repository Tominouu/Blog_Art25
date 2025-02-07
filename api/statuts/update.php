<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';

// Récupérer les données du formulaire
$numStat = ctrlSaisies($_POST['numStat']);
$libStat = ctrlSaisies($_POST['libStat']);

// Mise à jour
sql_update(table: "STATUT",attributs: 'libStat = "'.$libStat.'"', where: "numStat = $numStat");

// Redirection
header('Location: ../../views/backend/statuts/list.php');
