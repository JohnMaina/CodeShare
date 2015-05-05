<?php 
require_once('includes/session.php');
$config = require_once('includes/config.php');


extract($config["db_config"]);
    $con = new mysqli($host, $username, $password, $database, $port, $socket);
    if ($con) {
    $centerID=0;
    if (isset($_SESSION['loggedindirector']) || isset($_SESSION['loggedinprincipal'])){
        $centerID = $_SESSION['centerID'];
    } else if (isset($_SESSION['loggedinreceptionist'])){
        $centerID = $_SESSION['centerID'];
    }
    else if (isset($_SESSION['loggedinstudent'])){
        $centerID = $_SESSION['centerID'];
    }
    else {
        header('Location:lev3/index.php');
    }
    $stmt = $con->prepare("SELECT * FROM rooms where centerID=?");
    $stmt->bind_param("i",$centerID);
    $stmt->execute();
    $roomsObj= $stmt->get_result();
    
     $rooms=Array();
    
    while ($r=$roomsObj->fetch_object()){
                $rooms[]=$r;
    }
        $returnedjson= json_encode($rooms);
        //echo "We have ",$countServices," Services and ",$countTeam," team members";
        echo $returnedjson;
    
    }