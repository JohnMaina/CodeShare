<?php
require_once('includes/session.php');
$config = require_once('includes/config.php');


extract($config["db_config"]);
    $con = new mysqli($host, $username, $password, $database, $port, $socket);
    if ($con) {
     if (isset($_SESSION['loggedinreceptionist'])) {
        $centerID = $_SESSION['centerID'];
        $select_students_query = "SELECT * FROM students WHERE centerID={$centerID}";    
    } else if (isset($_SESSION['loggedindirector']) || isset($_SESSION['loggedinprincipal'])) {
        $centerID = $_SESSION['centerID'];
        $select_students_query = "SELECT * FROM students WHERE centerID={$centerID}";  
    } else {
        header('Location:index.php?message=You are not logged in. Please log in to continue.');
    }
        $resultStudents = $con->query($select_students_query);
        $rows=array();
         while ($r=$resultStudents->fetch_object()){
               
                $rows[]=$r;
            }
        $returnedjson= json_encode($rows);
        //echo "We have ",$countServices," Services and ",$countTeam," team members";
        echo $returnedjson;
    }
    else
     echo "Not Connected";
 ?>