<?php 
require_once ('../BackEnd/includes/session.php');
if(isset($_SESSION['loggedinstudent']) && isset($_SESSION['centerID'])){
    
}
 else {
     header('Location:BackEnd/lev3/index.php?message=You must log in first');
}
?>
﻿<!DOCTYPE html>
<html lang="" ng-app="app">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Wynton</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../css/custom.css" />
    <!--[if IE]>
        <script src="https://cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://cdn.jsdelivr.net/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="ng-cloak">
      
<nav class="navbar navbar-inverse">
    <div class="navbar-header">
         <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
        <a class="navbar-brand" href="#/personalDetails">LogoHere</a>
    </div>
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav navbar-right">
            <li> <a href="#/personalDetails">Personal Details</a></li>
            <li><a  href="#/studentfeeStatement">Fee Statement</a></li>
            <li> <a  href="#/Lessons">My Lessons</a></li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown"  href="">Entire Timetable
                    <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a  href="#/timetableMonday">Monday</a></li>
                    <li> <a  href="#/timetableTuesday">Tuesday</a></li>
                    <li> <a  href="#/timetableWednesday">Wednesday</a></li>
                    <li><a  href="#/timetableThursday">Thursday</a></li>
                    <li><a  href="#/timetableFriday">Friday</a></li>
                    <li><a  href="#/timetableSaturday">Saturday</a></li>
                </ul>
            </li>
            <li> <a  href="../BackEnd/logout.php"> <span class="glyphicon-log-out"></span> Logout</a></li>
        </ul>
    </div>
    </nav>
    <div class="container-fluid">
        <div class="uiview">
            <div ui-view class="viewanimate"></div>
        </div>
    </div>
    <footer class="container-fluid footer-primary">
        
    </footer>

    <!--libs-->
    <script src="../js/jquery-2.1.1.min .js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/angular.js"></script>
    <script src="../js/1_ui-router.js"></script>
    <script src="../js/angular-animate.min.js"></script>
    <!--app-->
    <script src="app.js"></script>
    <!--modules-->
    <script src="pages.js"></script>
    <!--Controllers-->
    <script src="controllers/studentController.js"></script>
    <script src="controllers/timetableController.js"></script>
    <!--Services-->
    <script src="services/studentService.js"></script>
     <script src="services/timetableService.js"></script>
    
</body>
</html>
