<?php

$config = require_once('includes/config.php');
extract($config["db_config"]);
$con = new mysqli($host, $username, $password, $database, $port, $socket);

if ($con) {
    $request = file_get_contents("php://input");
    $tutor = json_decode($request);

    $stmt = $con->prepare("INSERT INTO tutors"
            . " (fname,sname,lname,mobile,email,gender,nationality,lpass,anyotherinfo) values(?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("sssssssss", $fname, $sname, $lname, $mobile, $email, $gender, $nationality, $lpass,$anyotherinfo);
    $fname = $tutor->fname;
    $sname = $tutor->sname;
    $lname = $tutor->lname;
    $mobile =$tutor->phonenumber;
    $email = $tutor->email;
    $gender =$tutor->gender;
    $nationality=$tutor->nationality;
    //$dob = $student->dob;
    $anyotherinfo = $tutor->anyotherinfo;
    $lpass = hash("sha1", ($tutor->password));
    
    //converting date to valid sql date type
//    $dob=  DateTime::createFromFormat(yyyy-mm-dd);
//    $dob=$dob->format('yyyy-mm-dd');
    $stmt->execute();
    $registertutorresult = $stmt->get_result();
    echo $registertutorresult;
} 
else {
    echo "check connection";
}
?>