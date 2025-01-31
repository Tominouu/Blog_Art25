<?php
//PDO connection
function sql_connect(){
    global $DB;

    //connect BDD with PDO using SQL_HOST, SQL_USER, SQL_PWD, SQL_DB
    // Avec encodage UTF8
    $DB = new PDO('mysql:host=localhost;dbname=blogart25', 'root', '');

}