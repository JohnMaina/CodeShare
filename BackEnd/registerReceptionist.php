<?php

$config = require_once('includes/config.php');
extract($config["db_config"]);
$con = new mysqli($host, $username, $password, $database, $port, $socket);

if ($con) {
    $request = file_get_contents("php://input");
    $receptionist = json_decode($request);
   
    $stmt = $con->prepare("INSERT INTO receptionist"
            . " (fname,sname,lname,mobile,email,gender,centerID,lpass) values(?,?,?,?,?,?,?,?)");
    if($stmt){
    $stmt->bind_param("ssssssis", $fname, $sname, $lname, $mobile, $email, $gender, $centerID, $lpass);
    $fname = $receptionist->fname;
    $sname = $receptionist->sname;
    $lname = $receptionist->lname;
    $mobile =$receptionist->phonenumber;
    $email = $receptionist->email;
    $gender =$receptionist->gender;
    //$dob = $student->dob;
    $centerID = $receptionist->center;
    $lpass = hash("sha1", ($receptionist->password));
    
    //converting date to valid sql date type
//    $dob=  DateTime::createFromFormat(yyyy-mm-dd);
//    $dob=$dob->format('yyyy-mm-dd');
    $stmt->execute();
    $registerreceptionistresult = $stmt->get_result();
    echo $registerreceptionistresult;
} 
else{
    echo  mysqli_error($con);
}
}
else {
    echo "check connection";
}
?>