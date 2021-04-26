<?php

    // Load Composer's autoloader
    require 'vendor/autoload.php';
    
    // Load .env file
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    // Store credentials in varriables from environment file
    $db_server = $_ENV['DB_SERVER'];
    $db_username = $_ENV['DB_USERNAME'];
    $db_password = $_ENV['DB_PASSWORD'];
    $db_name = $_ENV['DB_NAME'];

    /* Attempt to connect to MySQL database */
    $connect = mysqli_connect($db_server, $db_username, $db_password, $db_name);

    // Check connection
    if(!$connect){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

?>