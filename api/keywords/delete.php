<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';

// Récupérer les données du formulaire
$numMotCle = ctrlSaisies($_POST['numMotCle']);

// Supression
sql_delete('motcle', "numMotCle = $numMotCle");

// Redirection
header('Location: ../../views/backend/keywords/list.php');