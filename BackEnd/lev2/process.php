<?php
require_once('../includes/session.php');
$config = require_once('../includes/config.php');


extract($config["db_config"]);
$con = new mysqli($host, $username, $password, $database, $port, $socket);
if ($con) {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {

//        $email = mysqli_real_escape_string($con, $_POST['email']);
//        $password = mysqli_real_escape_string($con, $_POST['password']);
        $password = sha1($_POST['password']);
        $stmt = $con->prepare("SELECT * FROM receptionist WHERE email=? AND lpass=?");
        $stmt->bind_param("ss", $email, $password);
        $email = $_POST['email'];
        $stmt->execute();
        $resultreceptionist = $stmt->get_result();



        if ($resultreceptionist->num_rows > 0) {
             while ($receptionist = $resultreceptionist->fetch_object()) {
                $loggedinreceptionist = $receptionist->receptionistID;
                $center_id = $receptionist->centerID;
                 $_SESSION['loggedinreceptionist'] = $loggedinreceptionist;
                 $_SESSION['centerID'] = $center_id;
             }
            header('Location:../../receptionist_home.php');
        } else {
            header('Location:index.php?message=wrong emaile or password');
        }
    } else {
        header('Location:index.php?message=Please fill the required fields');
    }
} else {
    header('Location:index.php?message=Connection Problem. Trye again.');
}
?>