<?php
require_once('includes/session.php'); 
$config = require_once('includes/config.php');
extract($config["db_config"]);
$con = new mysqli($host, $username, $password, $database, $port, $socket);
if ($con) {
    if (isset($_SESSION['loggedinreceptionist'])) {
    $request = file_get_contents("php://input");
    $deleteRoom = json_decode($request);

    $stmt = $con->prepare("DELETE FROM rooms where roomID=?");
    $stmt->bind_param("i", $ID);
    $ID = $deleteRoom->ID;
    $stmt->execute();
    $deleteRoomresult = $stmt->get_result();
    echo $deleteRoomresult;

    header('Location:../#/manageRoom?message=$deleteRoomresult');
} 
else {header('Location:lev3/index.php?message=You are not logged in. Please log in to continue.');}
}