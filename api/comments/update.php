<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';

$numCom = ctrlSaisies($_POST['numCom']);
$libCom = ctrlSaisies($_POST['libCom']);

//sql_delete('STATUT', "numStat = $numStat");
sql_update('comment', "libCom = '$libCom'", "numCom = $numCom");

header('Location: ../../views/backend/comments/list.php');
?>
