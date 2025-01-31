<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';

$nomMemb = ctrlSaisies($_POST['nomMemb']);
$prenomMemb = ctrlSaisies($_POST['prenomMemb']);
$pseudoMemb = ctrlSaisies($_POST['pseudoMemb']);
$passMemb = ctrlSaisies($_POST['passMemb']);
$eMailMemb = ctrlSaisies($_POST['eMailMemb']);
$numStat = isset($_POST['numStat']);

$numMemb = ctrlSaisies($_POST['numMemb']);

$sql = "UPDATE members SET 
nomMemb = '$nomMemb', 
prenomMemb = '$prenomMemb', 
pseudoMemb = '$pseudoMemb', 
passMemb = '$passMemb', 
eMailMemb = '$eMailMemb', 
numStat = '$numStat'
WHERE numMemb = '$numMemb'";

header('Location: ../../views/backend/members/list.php');
