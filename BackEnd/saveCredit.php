<?php
require_once('includes/session.php');
$config = require_once('includes/config.php');
extract($config["db_config"]);
$con = new mysqli($host, $username, $password, $database, $port, $socket);

if ($con) {
    $request = file_get_contents("php://input");
    $Credit = json_decode($request);
   
        $stmt = $con->prepare("INSERT INTO feestatement"
                . " (studentID, receiptNumber, credit) values(?,?,?)");
        $stmt->bind_param("isi", $studentID, $receiptNumber, $credit);
    
    $studentID = $_SESSION['selectedStudent'];
    $receiptNumber = $Credit->RCN;
    $credit = $Credit->Amount;


    $stmt->execute();
    $saveCreditresult = $stmt->get_result();
    echo $saveCreditresult;
} 
else {
    echo "check connection";
}
?>