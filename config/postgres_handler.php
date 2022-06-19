<?php
    //database connection local PostgreSQL server
    require_once(dirname(dirname(__FILE__)) . '/config/db_settings_postgres.php');
    ini_set('display_errors',1); 
    error_reporting(E_ALL);
    $con = pg_connect("host=$host dbname = $dbname user=$dbuser password=$dbpass");

    //database connection Heroku via environment variable
    // $conn = pg_connect(getenv("DATABASE_URL"));
?>