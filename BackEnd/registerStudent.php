<?php

$config = require_once('includes/config.php');
extract($config["db_config"]);
$con = new mysqli($host, $username, $password, $database, $port, $socket);

if ($con) {
    $request = file_get_contents("php://input");
    $student = json_decode($request);
    print_r($student);

    $stmt = $con->prepare("INSERT INTO students"
            . " (fname,sname,lname,mobile,email,gender,centerID,lpass) values(?,?,?,?,?,?,?,?)");
    $stmt->bind_param("ssssssis", $fname, $sname, $lname, $mobile, $email, $gender, $centerID, $lpass);
    $fname = $student->fname;
    $sname = $student->sname;
    $lname = $student->lname;
    $mobile = $student->phonenumber;
    $email = $student->email;
    $gender = $student->gender;
    //$dob = $student->dob;
    $centerID = $student->centerID;
    $lpass = hash("sha1", ($student->password));
    
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