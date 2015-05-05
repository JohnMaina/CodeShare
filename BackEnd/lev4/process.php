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
        $stmt = $con->prepare("SELECT * FROM tutors WHERE email=? AND lpass=?");
        $stmt->bind_param("ss", $email, $password);
        $email = $_POST['email'];
        //$password = $_POST['password'];
        $stmt->execute();
        $resulttutor = $stmt->get_result();



        if ($resulttutor->num_rows > 0) {
             while ($tutor = $resulttutor->fetch_object()) {
                $loggedintutor = $tutor->tutorID;
                 $_SESSION['loggedintutor'] = $loggedintutor;
                 $_SESSION['centerID'] = $_POST['center'];
             }
            header('Location:../../tutorPortal/tutor_home.php');
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