<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';

$nomMemb = ctrlSaisies($_POST['nomMemb']);
$prenomMemb = ctrlSaisies($_POST['prenomMemb']);
$pseudoMemb = ctrlSaisies($_POST['pseudoMemb']);
$passMemb = ctrlSaisies($_POST['passMemb']);
$eMailMemb = ctrlSaisies($_POST['eMailMemb']);
$dtCreaMemb = ctrlSaisies($_POST['dtCreaMemb']);
$numStat = ctrlSaisies($_POST['numStat']);

$hashedPassMemb = password_hash($passMemb, PASSWORD_DEFAULT);

sql_insert('membre', 'nomMemb, prenomMemb, pseudoMemb, passMemb, eMailMemb, numStat', "'$nomMemb', '$prenomMemb', '$pseudoMemb', '$hashedPassMemb', '$eMailMemb', '$numStat'");

header('Location: ../../index.php');
