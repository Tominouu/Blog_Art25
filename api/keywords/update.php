<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';

// Récupérer les données du formulaire
$numMotCle = ctrlSaisies($_POST['numMotCle']);
$libMotCle = ctrlSaisies($_POST['libMotCle']);

// Modifications
sql_update('motcle', "libMotCle = '$libMotCle'", "numMotCle = $numMotCle");

// Redirection
header('Location: ../../views/backend/keywords/list.php');
?>