<?php
require_once('includes/session.php');
$config = require_once('includes/config.php');
extract($config["db_config"]);
$con = new mysqli($host, $username, $password, $database, $port, $socket);

if ($con) {
    $request = file_get_contents("php://input");
    $student = json_decode($request);
    print_r($student);

   $stmt = $con->prepare( "UPDATE `students` SET `fname`=?,`sname`=?,`lname`=?,mobile=? ,email=?,gender=?,centerID=?"
           . " WHERE studentID=?");
    $stmt->bind_param("ssssssii", $fname, $sname, $lname, $mobile, $email, $gender, $centerID, $studentID);
    $fname = $student->fname;
    $sname = $student->sname;
    $lname = $student->lname;
    $mobile = $student->mobile;
    $email = $student->email;
    $gender = $student->gender;
    //$dob = $student->dob;
    $centerID = $student->centerID;
    $studentID= $_SESSION['selectedStudent'];
    //converting date to valid sql date type
//    $dob=  DateTime::createFromFormat(yyyy-mm-dd);
//    $dob=$dob->format('yyyy-mm-dd');
    $stmt->execute();
    $registerstudentresult = $stmt->get_result();
    echo $registerstudentresult;
} 
else {
    echo "check connection";
}
?>