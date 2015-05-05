<?php

$config = require_once('includes/config.php');
extract($config["db_config"]);
$con = new mysqli($host, $username, $password, $database, $port, $socket);

if ($con) {
    $request = file_get_contents("php://input");
    $director = json_decode($request);
    print_r($director);

//nationality is an optiional field in the registration form. If it has been filled, the following
//code will cater for that using the if else statements. Where if its filled in, I'll run a particular 
//code. Vice versa is true.
    if (isset($nationality)){
        //nationality is set
        $nationality = $_POST['nationality'];
        $stmt = $con->prepare("INSERT INTO director"
                . " (fname,sname,lname,doc,mobile,email,gender,dob,,nationality,lpass) values(?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssssss", $fname, $sname, $lname, $doc, $mobile, $email, $gender, $dob, $nationality, $lpass);
    } else {
        //nationality is not set
        $stmt = $con->prepare("INSERT INTO director"
                . " (fname,sname,lname,doc,mobile,email,gender,dob,lpass) values(?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssssss", $fname, $sname, $lname, $doc, $mobile, $email, $gender, $dob, $lpass);
    }

    

    $fname = $director->fname;
    $sname = $director->sname;
    $lname = $director->lname;
    $doc = $director->doc;
    $mobile = $director->phonenumber;
    $email = $director->email;
    $gender = $director->gender;
    $dob = $director->dob;
    if (isset($nationality))
        $nationality = $director->nationality;
    $lpass = hash("md5", ($director->password));
    
    //converting date to valid sql date type
//    $dob=  DateTime::createFromFormat(yyyy-mm-dd);
//    $dob=$dob->format('yyyy-mm-dd');
    $stmt->execute();
    $registerdirectorresult = $stmt->get_result();
    echo $registerdirectorresult;
} 
else {
    echo "check connection";
}
?>