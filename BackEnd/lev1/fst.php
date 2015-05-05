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
        $stmt = $con->prepare("SELECT * FROM director WHERE email=? AND lpass=?");
        $stmt->bind_param("ss", $email, $password);
        $email = $_POST['email'];
        $selected_center = $_POST['center'];
        $stmt->execute();
        $resultdirector = $stmt->get_result();


        $stmb = $con->prepare("SELECT * FROM principal WHERE email=? AND lpass=?");
        $stmb->bind_param("ss", $email, $password);
        $stmb->execute();
        $resultprincipal = $stmb->get_result();

        if ($resultdirector->num_rows > 0 || $resultprincipal->num_rows > 0) {
            if($resultdirector->num_rows > 0){
             while ($director = $resultdirector->fetch_object()) {
                $loggedindirector = $director->directorID;
                 $_SESSION['loggedindirector'] = $loggedindirector;
                 $_SESSION['centerID'] = $selected_center;
            }
            }
            if($resultprincipal->num_rows > 0){
             while ($principal = $resultprincipal->fetch_object()) {
                $loggedinprincipal= $principal->principalID;
                $_SESSION['loggedinprincipal'] = $loggedinprincipal;
                $_SESSION['centerID'] = $selected_center;
            }
            }

            header('Location:../../dp.php');
        } else {
            header('Location:index.php?message=wrong email or password');
        }
    } else {
        header('Location:index.php?message=Please fill the required fields');
    }
} else {
    header('Location:index.php?message=Connection Problem. Try again.');
}
?>