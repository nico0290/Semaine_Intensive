<?php

// Connexion variables
define('DB_HOST','mysql55-48.perso');
define('DB_NAME','achappuysbachap');
define('DB_USER','achappuysbachap');
define('DB_PASS','4L3awDjtf3M'); 

try
{
    // Try to connect to database
    $database = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASS);
    // Set fetch mode to object
    $database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
}
catch (Exception $e)
{
    // Failed to connect
    die('Cound not connect');
}
