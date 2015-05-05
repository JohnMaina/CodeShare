<?php
require_once('includes/session.php'); 
$config = require_once('includes/config.php');


extract($config["db_config"]);
    $con = new mysqli($host, $username, $password, $database, $port, $socket);
    if ($con) {
        if (isset($_SESSION['loggedindirector']) || isset($_SESSION['loggedinprincipal'])){
            $centerID = $_SESSION['centerID'];
         $select_lessons_query="SELECT lessons.lessonID, lessons.tutorID, lessons.instrumentID, lessons.roomID,"
             . "lessons.day, lessons.start, students.fname as studentFName, students.sname as studentSName,"
             . "tutors.fname as tutorFname, instruments.Name, rooms.roomName FROM lessons LEFT JOIN students ON lessons.studentID=students.studentID"
                 . " LEFT JOIN tutors ON lessons.tutorID=tutors.tutorID"
                 . " LEFT JOIN studentinstrumentallocation ON lessons.instrumentID=studentinstrumentallocation.ID LEFT JOIN instruments ON studentinstrumentallocation.instrumentID=instruments.instrumentID "
             . "LEFT JOIN rooms ON lessons.roomID=rooms.roomID WHERE lessons.centerID={$centerID}";
         } else if (isset($_SESSION['loggedinreceptionist'])) {
            $centerID = $_SESSION['centerID'];
            $select_lessons_query="SELECT lessons.lessonID, lessons.tutorID, lessons.instrumentID, lessons.roomID,"
                . "lessons.day, lessons.start, students.fname as studentFName, students.sname as studentSName,"
                . "tutors.fname as tutorFname, instruments.Name, rooms.roomName FROM lessons LEFT JOIN students ON lessons.studentID=students.studentID"
                    . " LEFT JOIN tutors ON lessons.tutorID=tutors.tutorID"
                    . " LEFT JOIN studentinstrumentallocation ON lessons.instrumentID=studentinstrumentallocation.ID LEFT JOIN instruments ON studentinstrumentallocation.instrumentID=instruments.instrumentID "
                . "LEFT JOIN rooms ON lessons.roomID=rooms.roomID WHERE lessons.centerID={$centerID}";
 
         } else if (isset($_SESSION['loggedinstudent'])){ 
            $centerID = $_SESSION['centerID'];
        $select_lessons_query = "SELECT lessons.lessonID, lessons.tutorID, lessons.instrumentID, lessons.roomID,"
                . "lessons.day, lessons.start, students.fname as studentFName, students.sname as studentSName,"
                . "tutors.fname as tutorFname, instruments.Name, rooms.roomName FROM lessons LEFT JOIN students ON lessons.studentID=students.studentID"
                . " LEFT JOIN tutors ON lessons.tutorID=tutors.tutorID"
                . " LEFT JOIN studentinstrumentallocation ON lessons.instrumentID=studentinstrumentallocation.ID LEFT JOIN instruments ON studentinstrumentallocation.instrumentID=instruments.instrumentID "
                . "LEFT JOIN rooms ON lessons.roomID=rooms.roomID WHERE lessons.centerID={$centerID}";
    } 
     else if (isset($_SESSION['loggedintutor'])){ 
            $centerID = $_SESSION['centerID'];
        $select_lessons_query = "SELECT lessons.lessonID, lessons.tutorID, lessons.instrumentID, lessons.roomID,"
                . "lessons.day, lessons.start, students.fname as studentFName, students.sname as studentSName,"
                . "tutors.fname as tutorFname, instruments.Name, rooms.roomName FROM lessons LEFT JOIN students ON lessons.studentID=students.studentID"
                . " LEFT JOIN tutors ON lessons.tutorID=tutors.tutorID"
                . " LEFT JOIN studentinstrumentallocation ON lessons.instrumentID=studentinstrumentallocation.ID LEFT JOIN instruments ON studentinstrumentallocation.instrumentID=instruments.instrumentID "
                . "LEFT JOIN rooms ON lessons.roomID=rooms.roomID WHERE lessons.centerID={$centerID}";
    }
    else {
            header('Location:lev3/index.php?message=You are not logged in. Please log in to continue.');
         }
       
    
     $resultlessons = $con->query($select_lessons_query);

     //checking if the query was successful
    if ($resultlessons){
    $lessons=array();
            while ($r=$resultlessons->fetch_object()){
                
                $lessons[]=$r;
            }
        
       
        $returnedjson= json_encode($lessons);
        //echo "We have ",$countServices," Services and ",$countTeam," team members";
        echo $returnedjson;
    } else {
        echo $con->error;
    }
    }
    else{
     echo "Not Connected";
    }