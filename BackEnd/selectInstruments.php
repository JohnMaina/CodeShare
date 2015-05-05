<?php 
$config = require_once('includes/config.php');


extract($config["db_config"]);
    $con = new mysqli($host, $username, $password, $database, $port, $socket);
    if ($con) {
//        $request=  file_get_contents("php://input");
//        $selectedCenter=  json_decode($request);
//        
        $select_instruments_query = "SELECT * FROM instruments";
        $resultInstruments = $con->query($select_instruments_query);
    
     $instruments=Array();
      $instrumentsandp=Array();
    
    while ($r=$resultInstruments->fetch_object()){
                $instruments[]=$r;
    }
    $select_packages_query = "SELECT * FROM feespackages";
        $resultpackages = $con->query($select_packages_query);
    
     $packages=Array();
    
    while ($r=$resultpackages->fetch_object()){
                $packages[]=$r;
    }
    $instrumentsandp['packages']=$packages;
    $instrumentsandp['instruments']=$instruments;
        $returnedjson= json_encode($instrumentsandp);
        //echo "We have ",$countServices," Services and ",$countTeam," team members";
        echo $returnedjson;
    
    }