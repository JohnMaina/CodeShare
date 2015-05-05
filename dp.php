<?php 
require_once ('BackEnd/includes/session.php');
if(isset($_SESSION['loggedindirector']) || isset($_SESSION['loggedinprincipal'])){
    
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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/custom.css" />
    <!--[if IE]>
        <script src="https://cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://cdn.jsdelivr.net/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body  class="ng-cloak">
    <div class="HomePageheader row">
        <h1 id="mainheader" class="col-xs-12 col-sm-10"><b>Dalavin College of Excellence</b>
           
        </h1> 
        <a  href="BackEnd/logout.php"><p id="logout" class="col-xs-12 col-sm-2"> Logout</p></a>
    </div>
    <div class="indexpage row container-fluid">
        <div class="col-xs-3 col-sm-3 jumbotron mainMenu">
            <p><a href="#/home">Manage Student</a></p>
            <p> <a href="#/tutorSelect">Manage Tutor</a></p>
               <p><a href="#/manageInstrument">Manage Instruments</a></p>
               <p> <a href="#/manageRoom">Manage Rooms</a></p>
             <p><a href="#/timetable">Timetable</a></p>
             <p><a href="#/addLesson">add Lesson</a></p>
            <p> <a href="#/feeStatement">Statement</a></p>
             <p> <a href="#/registerStudent">Register Student</a></p>
             <p><a href="#/registerTutor">Register Tutor</a></p>
            <p> <a href="#/registerReceptionist">Register Receptionist</a></p>
        </div>
        <div class="uiview col-xs-9 col-sm-9">
            <div ui-view class="viewanimate"></div>
        </div>
    </div>
    <footer class="container-fluid footer-primary">
        
    </footer>

    <!--libs-->
    <script src="js/jquery-2.1.1.min .js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/angular.js"></script>
    <script src="js/1_ui-router.js"></script>
    <script src="js/angular-animate.min.js"></script>
    <!--app-->
    <script src="app/app.js"></script>
    <!--modules-->
    <script src="app/pages.js"></script>
    <!--Controllers-->
    <script src="app/controllers/studentController.js"></script>
    <script src="app/controllers/instrumentController.js"></script>
    <script src="app/controllers/timetableController.js"></script>
     <script src="app/controllers/commonController.js"></script>
     <script src="app/controllers/tutorController.js"></script>
    <!--Services-->
    <script src="app/services/studentService.js"></script>
     <script src="app/services/instrumentService.js"></script>
     <script src="app/services/timetableService.js"></script>
     <script src="app/services/commonService.js"></script>
     <script src="app/services/tutorService.js"></script>
    
</body>
</html>
