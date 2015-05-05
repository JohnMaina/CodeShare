<?php
require_once('includes/session.php');
$config = require_once('includes/config.php');
extract($config["db_config"]);
$con = new mysqli($host, $username, $password, $database, $port, $socket);

if ($con) {
    $request = file_get_contents("php://input");
    $Debit = json_decode($request);
   
        $stmt = $con->prepare("INSERT INTO feestatement"
                . " (studentID, invoiceNumber, debit) values(?,?,?)");
        $stmt->bind_param("isi", $studentID, $invoiceNumber, $debit);
    
    $studentID = $_SESSION['selectedStudent'];
    $invoiceNumber = $Debit->INN;
    $debit = $Debit->Amount;


    $stmt->execute();
    $saveDebitresult = $stmt->get_result();
    echo $saveDebitresult;
} 
else {
    echo "check connection";
}
?>