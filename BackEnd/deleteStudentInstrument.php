<?php

$config = require_once('includes/config.php');


extract($config["db_config"]);
$con = new mysqli($host, $username, $password, $database, $port, $socket);
if ($con) {
    $request = file_get_contents("php://input");
    $selectedInstrument = json_decode($request);

    $stmt = $con->prepare("DELETE FROM studentinstrumentallocation where ID=?");
    $stmt->bind_param("i", $ID);
    $ID = $selectedInstrument->ID;
    $stmt->execute();
    $deletestrumentresult = $stmt->get_result();
    echo $deletestrumentresult;
    
}      