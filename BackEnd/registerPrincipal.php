<?php

$config = require_once('includes/config.php');
extract($config["db_config"]);
$con = new mysqli($host, $username, $password, $database, $port, $socket);

if ($con) {
    $request = file_get_contents("php://input");
    $principal = json_decode($request);
    print_r($principal);


//nationality is an optiional field in the registration form. If it has been filled, the following
//code will cater for that using the if else statements. Where if its filled in, I'll run a particular 
//code. Vice versa is true.    
    if (isset($nationality)){
        //nationality is set
        $nationality = $_POST['nationality'];
        $stmt = $con->prepare("INSERT INTO principal"
                . " (fname,sname,lname,doc,mobile,email,gender,dob,,nationality,lpass) values(?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssssss", $fname, $sname, $lname, $doc, $mobile, $email, $gender, $dob, $nationality, $lpass);
    } else {
        //nationality is not set
        $stmt = $con->prepare("INSERT INTO principal"
                . " (fname,sname,lname,doc,mobile,email,gender,dob,lpass) values(?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssssss", $fname, $sname, $lname, $doc, $mobile, $email, $gender, $dob, $lpass);
    }

    

    $fname = $principal->fname;
    $sname = $principal->sname;
    $lname = $principal->lname;
    $doc = $principal->doc;
    $mobile = $principal->phonenumber;
    $email = $principal->email;
    $gender = $principal->gender;
    $dob = $principal->dob;
    if (isset($nationality))
        $nationality = $principal->nationality;
    $lpass = hash("md5", ($principal->password));
    
    //converting date to valid sql date type
//    $dob=  DateTime::createFromFormat(yyyy-mm-dd);
//    $dob=$dob->format('yyyy-mm-dd');
    $stmt->execute();
    $registerprincipalresult = $stmt->get_result();
    echo $registerprincipalresult;
} 
else {
    echo "check connection";
}
?>