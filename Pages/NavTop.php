<?php
session_start();
    if(!isset($_SESSION['email'])){
        header("location: ../index.php?YouAreNotAllowedToseeThisPage");
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->	
            <link rel="icon" type="image/png" href="../images/icons/favicon.ico"/>
        <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
        <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="../fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
        <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
        <!--===============================================================================================-->	
            <link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
        <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
        <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="../css/util.css">
            <link rel="stylesheet" type="text/css" href="../css/main.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="#">Attendance Monitoring</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
            
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="../Pages/MainDashboard.php">Home <span class="sr-only">(current)</span></a>
                            </li>
            
                            <li class="nav-item active dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Add Attendance</a>
                                <div class="dropdown-menu" style="width:300px;">
                                    <a class="nav-link" href="../Pages/SundayLGAttendance.php">Add Sunday/Lifegroup Attendance</a>
                                    <a class="nav-link" href="../Pages/JourneyAttendance.php">Add Journey Attendance</a>
                                </div>
                            </li>

                            <li class="nav-item active dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Admin Settings</a>
                                <div class="dropdown-menu" style="width:300px;">
                                    <a class="nav-link" href="../Pages/MemberList.php">List of Members</a>
                                    <a class="nav-link" href="#">Reports</a>
                                </div>
                            </li>
                        </ul>

                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="../includes/logoutdb.php">Logout</a>
                                </li>
                            </ul>
                    </div>        
        </nav>    
    