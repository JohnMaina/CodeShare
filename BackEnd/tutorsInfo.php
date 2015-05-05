<?php 
$config = require_once('includes/config.php');


extract($config["db_config"]);
    $con = new mysqli($host, $username, $password, $database, $port, $socket);
    if ($con) {
        $select_tutors_query = "SELECT * FROM tutors";
        $resulttutors = $con->query($select_tutors_query);
        $rows=array();
         while ($r=$resulttutors->fetch_object()){
               
                $rows[]=$r;
            }
        $returnedjson= json_encode($rows);
        //echo "We have ",$countServices," Services and ",$countTeam," team members";
        echo $returnedjson;
    }
    else
     echo "Not Connected";
 ?>