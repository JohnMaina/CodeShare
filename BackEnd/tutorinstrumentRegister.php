<?php
require_once('includes/session.php');
$config = require_once('includes/config.php');
extract($config["db_config"]);
$con = new mysqli($host, $username, $password, $database, $port, $socket);

if ($con) {
    $request = file_get_contents("php://input");
    $instruments = json_decode($request);
        $stmt = $con->prepare("INSERT INTO instrumentallocation"
                . " (tutorID, instrumentID) values(?,?)");
        $stmt->bind_param("ii", $tutorID, $instrumentID);
    

    $tutorID =  $_SESSION['selectedTutor'];
    $instrumentID = $instruments->instrumentID;


    $stmt->execute();
    $addinstrumentresult = $stmt->get_result();
    echo $addinstrumentresult;
} 
else {
    echo "check connection";
}
?>