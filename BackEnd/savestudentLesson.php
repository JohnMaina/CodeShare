<?php

require_once('includes/session.php');
$config = require_once('includes/config.php');
extract($config["db_config"]);
$con = new mysqli($host, $username, $password, $database, $port, $socket);

if ($con) {
    if (isset($_SESSION['loggedinreceptionist'])) {
            $centerID = $_SESSION['centerID'];
    $request = file_get_contents("php://input");
    $lesson = json_decode($request);

    $stmt = $con->prepare("INSERT INTO lessons"
            . " (studentID,tutorID,instrumentID,roomID,day,start,end,centerID) values(?,?,?,?,?,?,?,?)");
    $stmt->bind_param("sssssssi",$studentID,$tutorID,$instrumentID,$roomID,$day,$start,$end,$centerID);
    $studentID =  $_SESSION['selectedStudent'];
    $tutorID =     $lesson->tutorID;
    $instrumentID =     $lesson->instrumentID;
    $roomID =    $lesson->roomID;
    $day =     $lesson->day;
    $start =    $lesson->stime;
    $end = $lesson->etime;
    $stmt->execute();
    $addlessonresult = $stmt->get_result();
    echo $addlessonresult;
} 
else {
          header('Location:lev3/index.php?message=You are not logged in. Please log in to continue.');

}
}
else {
    echo "check connection";
}
?>