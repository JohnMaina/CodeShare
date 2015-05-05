<?php
require_once('includes/session.php');
$config = require_once('includes/config.php');


extract($config["db_config"]);
$con = new mysqli($host, $username, $password, $database, $port, $socket);
if ($con) {
    $studentID = $_SESSION['studentID'];
    $stmt = $con->prepare("SELECT students.*,center.name as centerName FROM students LEFT JOIN center ON students.centerID=center.centerID where studentID=?");
    $stmt->bind_param("i", $studentID);
    $stmt->execute();
    $studentDetails = $stmt->get_result();
    $stmfees = $con->prepare("SELECT * FROM feestatement where studentID=?");
    $stmfees->bind_param("i", $studentID);
    $stmfees->execute();
    $studentFeeStatement = $stmfees->get_result();

    $stmLessons = $con->prepare("SELECT lessons.lessonID, lessons.tutorID, lessons.instrumentID, lessons.roomID,"
            . "lessons.day, lessons.start, lessons.end,"
            . "tutors.fname as tutorFname, instruments.Name, rooms.roomName FROM lessons LEFT JOIN tutors ON lessons.tutorID=tutors.tutorID "
            . "LEFT JOIN studentinstrumentallocation ON lessons.instrumentID=studentinstrumentallocation.ID LEFT JOIN instruments ON studentinstrumentallocation.instrumentID=instruments.instrumentID"
            . " LEFT JOIN rooms ON lessons.roomID=rooms.roomID "
            . "where lessons.studentID=?");

   if(!$stmLessons)
   {
              die($con->error);}
    $stmLessons->bind_param("i", $studentID);
    $stmLessons->execute();
    $studentLessons = $stmLessons->get_result();

    $stminstruments = $con->prepare("SELECT instruments.Name  as studentinstrumentName,studentinstrumentallocation.ID as studentInstrumentID FROM studentinstrumentallocation "
            . "LEFT JOIN instruments ON studentinstrumentallocation.instrumentID=instruments.instrumentID where studentID=?");

    $stminstruments->bind_param("i", $studentID);
    $stminstruments->execute();
    $studentinstruments = $stminstruments->get_result();

    $result = array();
    $result1 = array();
    $result2 = array();
    $result3 = array();
    $result4 = array();

    $result[0] = $studentDetails;
    $result[1] = $studentinstruments;
    $result[2] = $studentFeeStatement;
    $result[3] = $studentLessons;

    $countLessons = 0;

    for ($i = 0; $i < 4; $i++) {
        while ($r = $result[$i]->fetch_object()) {
            if ($i == 1) {
                $result2[] = $r;
            }
            if ($i == 0) {
                $result1[] = $r;
            }
            if ($i == 2) {
                $result3[] = $r;
            }
            if ($i == 3) {
                $countLessons++;
                $result4[] = $r;
            }
        }
    }
    $result1['Instruments'] = $result2;
    $result1['Feestatement'] = $result3;
    $result1['Lessons'] = $result4;
    $result1['Lessoncount'] = $countLessons;

    $returnedjson = json_encode($result1);
    //echo "We have ",$countServices," Services and ",$countTeam," team members";
    echo $returnedjson;
} else {
    echo "Not Connected";
}
?>