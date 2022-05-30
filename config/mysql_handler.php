<?php
    require_once(dirname(dirname(__FILE__)) . '/config/db_settings.php');
    ini_set('display_errors',1); 
    error_reporting(E_ALL);
    $con = mysqli_connect($host,$dbuser,$dbpass);
    
    if (mysqli_connect_errno()) {
        printf("Database connection failed: %s\n", mysqli_connect_error());
        exit();
    }

    @mysqli_select_db($con, $dbname) or die( "Unable to connect to the database: $dbname");
    /*if (!$con)
        {
            die('Could not connect: ' . mysqli_error($con));
        }*/

?>