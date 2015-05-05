<?php

$config = require_once('includes/config.php');
extract($config["db_config"]);
$con = new mysqli($host, $username, $password, $database, $port, $socket);

if ($con) {
    $request = file_get_contents("php://input");
    $instruments = json_decode($request);
   
        $stmt = $con->prepare("INSERT INTO instruments"
                . " (Name, numberofLessons, fees) values(?,?,?)");
        $stmt->bind_param("sss", $Name, $numberofLessons, $fees);
    

    $Name = $instruments->name;
    $numberofLessons = $instruments->lessons;
    $fees = $instruments->fees;


    $stmt->execute();
    $addinstrumentresult = $stmt->get_result();
    echo $addinstrumentresult;
} 
else {
    echo "check connection";
}
?>