<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';

$libCom = ctrlSaisies($_POST['libCom']);
$numArt = ctrlSaisies($_POST['numArt']);
$numMemb = ctrlSaisies($_POST['numMemb']);


sql_insert('comment', 'libCom, numArt, numMemb', "'$libCom', '$numArt', '$numMemb'");


header('Location: ../../views/frontend/articles/article.php?id=' . $_SESSION['user_id'] . '?' . '&numArt=' . $numArt .'&like=0');
