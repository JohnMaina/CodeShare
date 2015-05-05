<?php

require_once('includes/session.php');
$config = require_once('includes/config.php');
extract($config["db_config"]);
$con = new mysqli($host, $username, $password, $database, $port, $socket);
if ($con) {
    $request = file_get_contents("php://input");
    $tutorIDObj = json_decode($request);
    $_SESSION['selectedTutor'] = $tutorIDObj->tutorID;
    $stmt = $con->prepare("SELECT * FROM tutors where tutorID=?");
    $stmt->bind_param("i", $tutorID);
    $tutorID = $tutorIDObj->tutorID;
    $stmt->execute();
    $tutorDetails = $stmt->get_result();
$stmLessons = $con->prepare("SELECT lessons.lessonID, lessons.studentID, lessons.instrumentID, lessons.roomID,"
            . "lessons.day, lessons.start, lessons.end,lessons.dateStarted,"
            . "students.fname as studentFname,students.sname as studentSname, instruments.Name as instrumentName, rooms.roomName FROM lessons "
            . "LEFT JOIN students ON lessons.studentID=students.studentID"
            . " LEFT JOIN rooms ON lessons.roomID=rooms.roomID "
            . "LEFT JOIN studentinstrumentallocation ON lessons.instrumentID=studentinstrumentallocation.ID LEFT JOIN instruments ON studentinstrumentallocation.instrumentID=instruments.instrumentID"
            . " where tutorID=?");
    if(!$stmLessons){
        echo $con->error;
    }
    $stmLessons->bind_param("i", $tutorID);
    $stmLessons->execute();
    $tutorLessons = $stmLessons->get_result();

    $stminstruments = $con->prepare("SELECT instruments.Name as tutorinstrumentName,ID as tutorinstrumentID FROM instrumentallocation "
            . "LEFT JOIN instruments ON instrumentallocation.instrumentID=instruments.instrumentID where tutorID=?");

    $stminstruments->bind_param("i", $tutorID);
    $stminstruments->execute();
    $tutorinstruments = $stminstruments->get_result();

    $result = array();
    $result[0] = $tutorDetails;
    $result[1] = $tutorLessons;
    $result[2] = $tutorinstruments;
    $countLessons = 0;
    $result0 = array();
    $result1 = array();
    $result2 = array();
    for ($i = 0; $i < 3; $i++) {
        while ($r = $result[$i]->fetch_object()) {
            if ($i == 1) {
                $countLessons++;
                $result1[] = $r;
            }
            if ($i == 0) {
                $result0[] = $r;
            }
            if ($i == 2) {
                $result2 [] = $r;
            }
        }
    }
    $result0['Lessons'] = $result1;
    $result0['Lessoncount'] = $countLessons;
    $result0['Instruments'] = $result2;

    $returnedjson = json_encode($result0);
    //echo "We have ",$countServices," Services and ",$countTeam," team members";
    echo $returnedjson;
} else {
    echo "Not Connected";
}
?>