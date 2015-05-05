<?php 
$config = require_once('includes/config.php');


extract($config["db_config"]);
    $con = new mysqli($host, $username, $password, $database, $port, $socket);
    if ($con) {
//        $request=  file_get_contents("php://input");
//        $selectedCenter=  json_decode($request);
//        
        $select_centers_query = "SELECT * FROM center";
        $resultcenters = $con->query($select_centers_query);
    
     $centers=Array();
    
    while ($r=$resultcenters->fetch_object()){
                $centers[]=$r;
    }
        $returnedjson= json_encode($centers);
        //echo "We have ",$countServices," Services and ",$countTeam," team members";
        echo $returnedjson;
    
    }