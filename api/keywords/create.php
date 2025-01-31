<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';

$libMotcle = ctrlSaisies($_POST['libMotcle']);

sql_insert('motcle', 'libMotcle', "'$libMotcle'");


header('Location: ../../views/backend/keywords/list.php');