<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';

// Récupérer les données du formulaire
$libThem = ctrlSaisies($_POST['libThem']);

// Insertion
sql_insert('THEMATIQUE', 'libThem', "'$libThem'");

// Redirection
header('Location: ../../views/backend/thematiques/list.php');
