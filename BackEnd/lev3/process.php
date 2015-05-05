<?php
require_once('../includes/session.php');
$config = require_once('../includes/config.php');


extract($config["db_config"]);
$con = new mysqli($host, $username, $password, $database, $port, $socket);
if ($con) {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {

        $password = sha1($_POST['password']);
        $stmt = $con->prepare("SELECT * FROM students WHERE email=? AND lpass=?");
        $stmt->bind_param("ss", $email, $password);
        $email = $_POST['email'];
        $stmt->execute();
        $resultstudent = $stmt->get_result();



        if ($resultstudent->num_rows > 0) {
             while ($student = $resultstudent->fetch_object()) {
                $loggedinstudent = $student->studentID;
                $center_id = $student->centerID;
                 $_SESSION['loggedinstudent'] = $loggedinstudent;
                 $_SESSION['centerID'] = $center_id;
                   $_SESSION['studentID'] = $student->studentID;
             }
            header('Location:../../studentPortal/index.php');
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