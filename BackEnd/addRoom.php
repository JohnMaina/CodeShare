<?php
require_once('includes/session.php'); 
$config = require_once('includes/config.php');
extract($config["db_config"]);
$con = new mysqli($host, $username, $password, $database, $port, $socket);

if ($con) {
    if (isset($_SESSION['loggedinreceptionist'])) {
    $request = file_get_contents("php://input");
    $rooms = json_decode($request);

    $stmt = $con->prepare("INSERT INTO rooms (roomName, capacity, centerId) values(?,?,?)");
    
    $stmt->bind_param("sii", $roomName, $capacity, $centerID);
    $roomName = $rooms->name;
    $capacity = $rooms->capacity;
    $centerID = $_SESSION['centerID'];
    $stmt->execute();
    $addroomresult = $stmt->get_result();
    echo $addroomresult;
}
else {
          header('Location:lev3/index.php?message=You are not logged in. Please log in to continue.');

}
}
else {
    echo "check connection";
}
?>