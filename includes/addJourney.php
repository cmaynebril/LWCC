<?php
if (isset($_POST['SaveJourney']))
{
    require 'dbh.php';
    $name = $_POST['memberName'];
    $mentor = $_POST['Mentor'];
    $networkLeader = $_POST['NetworkLeader'];
    $process = $_POST['Process'];
    $dateProcessed = $_POST['DateProcessed'];

        $sql = "SELECT * FROM tbllifeprocess WHERE Name like '%".$name."%'";
                                        $result = mysqli_query($conn, $sql);
                                        $queryResult = mysqli_num_rows($result);
                                        if($queryResult > 0)
                                        {
                                            //query for update
                                            $sql1 = "UPDATE tbllifeprocess SET Name='$name',NetworkLeader='$networkLeader',Mentor='$mentor', ".$process."='Done', dt".$process."='$dateProcessed'
                                            WHERE Name like '%".$name."%'";
                                        }  
                                        else{
                                            //query for insert
                                            $sql1 = "INSERT INTO tbllifeprocess(Name,NetworkLeader,Mentor,".$process.",dt".$process.") 
                                            VALUES('$name', '$networkLeader', '$mentor', 'Done', '$dateProcessed')";
                                        } 
                                        $query = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
                                        header("Location: ../Pages/JourneyAttendance.php?result=saved");
                                        exit();
    } 
