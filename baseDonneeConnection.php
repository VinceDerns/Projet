<?php

ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);



try {
    
    $dsn = 'mysql:dbname=users;host=localhost;port=3306;charset=utf8';   
    $user = 'root';
    $pwd = '';

    
    $pdo = new PDO($dsn, $user, $pwd, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    
    echo ("Error : une erreur est survenue lors de l'execution de la requête");
} 


function dataCleaning($data)
{
    $data = trim($data);   
    $data = stripslashes($data);    
    $data = htmlentities($data);    
    return $data;
}
