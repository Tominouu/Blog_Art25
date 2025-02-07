<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';

// Récupérer les données du formulaire
$numThem = ctrlSaisies($_POST['numThem']);
$libThem = ctrlSaisies($_POST['libThem']);

// Mise à jour
sql_update(table: "THEMATIQUE",attributs: 'libThem = "'.$libThem.'"', where: "numThem = $numThem");

// Redirection
header('Location: ../../views/backend/thematiques/list.php');
