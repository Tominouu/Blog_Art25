<?php
session_start();
var_dump($_SESSION);
//var_dump($_GET);
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';
var_dump($_SESSION);

$numMem = $_SESSION['user_id'];
$numArt = $_GET['numArt'];

$likeselect = sql_select('LIKEART', '*', "numMemb = $numMem AND numArt = $numArt");

if ($likeselect) {
    $likeType = sql_select('LIKEART', 'likeA', "numMemb = $numMem AND numArt = $numArt");
    var_dump($likeType);
    if ($likeType[0]['likeA'] == 0) {
        echo 'unlike';
        $likeA = 1;
        $Unlike = sql_update('LIKEART', "likeA = $likeA", "numMemb = $numMem AND numArt = $numArt");
        header('Location: ../../views/frontend/articles/article.php?numArt='.$numArt.'&id='.$numMem.'&like=1');

    } else {
        echo 'like';
        $likeA = 0;
        $Unlike = sql_update('LIKEART', "likeA = $likeA", "numMemb = $numMem AND numArt = $numArt");
        header('Location: ../../views/frontend/articles/article.php?numArt='.$numArt.'&id='.$numMem.'&like=0');

    }
} else {
    echo 'insert';
    $likeA = 1;
    $likeAjoute = sql_insert('LIKEART', 'numMemb, numArt, likeA', "'$numMem', '$numArt', '$likeA'");
    header('Location: ../../views/frontend/articles/article.php?numArt='.$numArt.'&id='.$numMem.'&like=1');

}