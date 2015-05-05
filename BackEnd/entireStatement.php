<?php 
require_once('includes/session.php');
$config = require_once('includes/config.php');
extract($config["db_config"]);
    $con = new mysqli($host, $username, $password, $database, $port, $socket);
    if ($con) {
         if (isset($_SESSION['loggedindirector']) || isset($_SESSION['loggedinprincipal'])){
        $select_statement_query = "SELECT feestatement.*,students.*,center.name as centerName  FROM feestatement LEFT JOIN students ON "
                . "feestatement.studentID=students.studentID LEFT JOIN center ON center.centerID=students.centerID"
                . " ";
         }
          else if (isset($_SESSION['loggedinreceptionist'])) {
            $centerID = $_SESSION['centerID'];
            $select_statement_query = "SELECT feestatement.*,students.*,center.name as centerName  FROM feestatement LEFT JOIN students ON "
                . "feestatement.studentID=students.studentID LEFT JOIN center ON center.centerID=students.centerID"
                . " WHERE students.centerID=$centerID";
          }
        $resultStatement = $con->query($select_statement_query);
    
     $feestatement=Array();
    
    while ($r=$resultStatement->fetch_object()){
                $feestatement[]=$r;
    }
        $returnedjson= json_encode($feestatement);
        //echo "We have ",$countServices," Services and ",$countTeam," team members";
        echo $returnedjson;
    
    }