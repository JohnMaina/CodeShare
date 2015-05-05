<?php
require_once('includes/session.php');
$config = require_once('includes/config.php');
extract($config["db_config"]);
$con = new mysqli($host, $username, $password, $database, $port, $socket);

if ($con) {
    $request = file_get_contents("php://input");
    $instruments = json_decode($request);
        $stmt = $con->prepare("INSERT INTO studentinstrumentallocation"
                . " (studentID, instrumentID, packageID) values(?,?,?)");
        $stmt->bind_param("iii", $studentID, $instrumentID, $packageID);
    

    $studentID = $_SESSION['selectedStudent'];
    $instrumentID = $instruments->instrumentID;
    $packageID = $instruments->pID;


    $stmt->execute();
    $addinstrumentresult = $stmt->get_result();
    echo $addinstrumentresult;
} 
else {
    echo "check connection";
}
?>