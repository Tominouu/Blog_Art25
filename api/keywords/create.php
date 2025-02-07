<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';

// Récupérer les données du formulaire
$libMotcle = ctrlSaisies($_POST['libMotcle']);

//Insertion
sql_insert('motcle', 'libMotcle', "'$libMotcle'");

// Redirection
header('Location: ../../views/backend/keywords/list.php');