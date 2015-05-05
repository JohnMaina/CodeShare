<?php 
$config = require_once('includes/config.php');


extract($config["db_config"]);
    $con = new mysqli($host, $username, $password, $database, $port, $socket);
    if ($con) {
        $request = file_get_contents("php://input");
    $studentIDObj = json_decode($request);

    $stmt = $con->prepare("SELECT * FROM students where studentID=?");
    $stmt->bind_param("i",$studentID);
    $studentID = $studentIDObj->studentID;
    $stmt->execute();
    $studentDetails= $stmt->get_result();
   
    $stmfees = $con->prepare("SELECT * FROM feestatement where studentID=?");
    $stmfees->bind_param("i",$studentID);
    $stmfees->execute();
    $studentFeeStatement= $stmfees->get_result();
    
     $stmLessons = $con->prepare("SELECT lessons.lessonID, lessons.tutorID, lessons.instrumentID, lessons.roomID,"
             . "lessons.day, lessons.start, lessons.end,"
             . "tutors.fname as tutorFname, instruments.Name, rooms.roomName FROM lessons LEFT JOIN tutors ON lessons.tutorID=tutors.tutorID LEFT JOIN instruments "
             . "ON lessons.instrumentID=instruments.instrumentID LEFT JOIN rooms ON lessons.roomID=rooms.roomID where studentID=?");
  
    $stmLessons->bind_param("i",$studentID);
    $stmLessons->execute();
    $studentLessons= $stmLessons->get_result();
    
     $stminstruments = $con->prepare("SELECT instruments.Name as studentinstrumentName FROM studentinstrumentallocation "
             . "LEFT JOIN instruments ON studentinstrumentallocation.instrumentID=instruments.instrumentID where studentID=?");
  
    $stminstruments->bind_param("i",$studentID);
    $stminstruments->execute();
    $studentinstruments= $stminstruments->get_result();
    
     $studentPortalInfo=Array();
     $result=array();
        $result[0]=$studentDetails;
         $result[1]=$studentinstruments;
        $result[2]=$studentFeeStatement;
        $result[3]=$studentLessons;
       
        $countLessons=0;
       
        for($i=0;$i<4;$i++){
            while ($r=$result[$i]->fetch_object()){
                if($i==1){
                    $countLessons++;
                }
                $studentPortalInfo[]=$r;
            }
        }
       
        $returnedjson= json_encode($studentPortalInfo);
        //echo "We have ",$countServices," Services and ",$countTeam," team members";
        echo $returnedjson;
    
    }
    else{
     echo "Not Connected";
    }
 ?>