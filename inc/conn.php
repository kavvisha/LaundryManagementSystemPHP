<?php 


//This is the database connection file 


require_once("config.php");


try {
    $conn = new PDO("mysql:host=".DBHOST.";dbname=".DB."", DBUSER, DBPASS);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
    
?>
