<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';

$nomMemb = ctrlSaisies($_POST['nomMemb']);
$prenomMemb = ctrlSaisies($_POST['prenomMemb']);
$pseudoMemb = ctrlSaisies($_POST['pseudoMemb']);
$passMemb = ctrlSaisies($_POST['passMemb']);
$eMailMemb = ctrlSaisies($_POST['eMailMemb']);
$numStat = ctrlSaisies($_POST['numStat']);

sql_update('membre', 'nomMemb, prenomMemb, pseudoMemb, passMemb, eMailMemb, numStat', "'$nomMemb', '$prenomMemb', '$pseudoMemb', '$passMemb', '$eMailMemb', '$numStat'");


header('Location: ../../views/backend/members/list.php');
