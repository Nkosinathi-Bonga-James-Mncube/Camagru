<?php

function DB_Connection($servername, $db_name, $username, $password) {
    $conn = null;
    try {
        $conn = new PDO("$servername;dbname=$db_name", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully";
        return ($conn);
    }
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
}
?>