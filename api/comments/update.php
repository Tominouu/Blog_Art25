<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';

// Récupérer les données du formulaire
$numCom = ctrlSaisies($_POST['numCom']);
$libCom = ctrlSaisies($_POST['libCom']);
$delLogiq = ctrlSaisies($_POST['delLogiq']);
$attModOK = ctrlSaisies($_POST['attModOK']);
$notifComKOAff = ctrlSaisies($_POST['notifComKOAff']);
$dtDelLogCom=date("Y-m-d-H-i-s");

// Modifications
sql_update('comment', "libCom = '$libCom'", "numCom = $numCom");
sql_update('comment', "delLogiq = '$delLogiq'", "numCom = $numCom");
sql_update('comment', "attModOK = '$attModOK'", "numCom = $numCom");
sql_update('comment', "notifComKOAff = '$notifComKOAff'", "numCom = $numCom");
sql_update('comment', "dtDelLogCom='$dtDelLogCom'", "numCom = $numCom");



// Redirection
header('Location: ../../views/backend/comments/list.php');
?>
