<?php 
$config = require_once('includes/config.php');


extract($config["db_config"]);
    $con = new mysqli($host, $username, $password, $database, $port, $socket);
    if ($con) {
        $request=  file_get_contents("php://input");
        $selectedCenter=  json_decode($request);
        $stmt = $con->prepare("UPDATE `instruments` SET `Name`=?,`numberofLessons`=?,`fees`=? WHERE instrumentID=?");
        
        if ($stmt){
        	//database update on room successful
        } else {
        	//update not successful
        	die("Error updating instruments record". mysql_error());
        }
    } else {
    	echo "Connection failed";
    }
