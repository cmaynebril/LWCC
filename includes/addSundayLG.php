<?php
if (isset($_POST['saveSundayLG']))
{
    require 'dbh.php';
    $name = $_POST['memberName'];
    $month = $_POST['Month'];
    $year = $_POST['Year'];
    $sunday = $_POST['Sunday'];
    $lifegroup = $_POST['Lifegroup'];
    $zsunday = $_POST['zSunday'];
    $zlifegroup = $_POST['zLifegroup'];
    $mentor = $_POST['Mentor'];
    $networkLeader = $_POST['NetworkLeader'];
    $sundayCheck = $_POST['Sundaycheck'];
    $lifegroupCheck = $_POST['Lifegroupcheck'];
    $monthDigit;

    if ($month == "January"){
        $monthDigit = '01';
    } elseif ($month == "February") {
        $monthDigit = '02';
    } elseif ($month == "March") {
        $monthDigit = '03';
    }elseif ($month == "April") {
        $monthDigit = '04';
    } elseif ($month == "May") {
        $monthDigit = '05';
    }elseif ($month == "June") {
        $monthDigit = '06';
    }elseif ($month == "July") {
        $monthDigit = '07';
    }elseif ($month == "August") {
        $monthDigit = '08';
    }elseif ($month == "September") {
        $monthDigit = '09';
    }elseif ($month == "October") {
        $monthDigit = '10';
    }elseif ($month == "November") {
        $monthDigit = '11';
    }elseif ($month == "December") {
        $monthDigit = '12';
    }

        if($sundayCheck == 1 && $lifegroupCheck == 1){
        $sql = "SELECT * FROM tblsundaylgattendance WHERE Name like '%".$name."%' AND zMonth='".$month."' AND zYear='".$year."'";
                                        $result = mysqli_query($conn, $sql);
                                        $queryResult = mysqli_num_rows($result);
                                        if($queryResult > 0)
                                        {
                                            //query for update
                                            $sql1 = "UPDATE tblsundaylgattendance SET Name='$name',NetworkLeader='$networkLeader',Mentor='$mentor',zMonth='$month',zMonthDigit='$monthDigit',zYear='$year',".$sunday."='$zsunday',".$lifegroup."='$zlifegroup'
                                            WHERE Name like '%".$name."%' AND zMonth='".$month."' AND zYear='".$year."'";
                                        }  
                                        else{
                                            //query for insert
                                            $sql1 = "INSERT INTO tblsundaylgattendance(Name,NetworkLeader,Mentor,zMonth,zMonthDigit,zYear,".$sunday.",".$lifegroup.") 
                                            VALUES('$name', '$networkLeader', '$mentor', '$month', '$monthDigit', '$year', '$zsunday', '$zlifegroup')";
                                        } 
                                        $query = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
                                        header("Location: ../Pages/SundayLGAttendance.php?result=saved");
                                        exit();

    
    }
    elseif ($lifegroupCheck ==1 && $sundayCheck !=1){
        //query here to add lifregorup
        $sql = "SELECT * FROM tblsundaylgattendance WHERE Name like '%".$name."%' AND zMonth='".$month."' AND zYear='".$year."'";
                                        $result = mysqli_query($conn, $sql);
                                        $queryResult = mysqli_num_rows($result);
                                        if($queryResult > 0)
                                        {
                                            //query for update
                                            $sql1 = "UPDATE tblsundaylgattendance SET Name='$name',NetworkLeader='$networkLeader',Mentor='$mentor',zMonth='$month',zMonthDigit='$monthDigit',zYear='$year',".$lifegroup."='$zlifegroup'
                                            WHERE Name like '%".$name."%' AND zMonth='".$month."' AND zYear='".$year."'";
                                        }  
                                        else{
                                            //query for insert
                                            $sql1 = "INSERT INTO tblsundaylgattendance(Name,NetworkLeader,Mentor,zMonth,zMonthDigit,zYear,".$lifegroup.") 
                                            VALUES('$name', '$networkLeader', '$mentor', '$month', '$monthDigit', '$year', '$zlifegroup')";
                                        } 
                                        $query = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
                                        header("Location: ../Pages/SundayLGAttendance.php?result=saved");
                                        exit();

    }
    elseif ($sundayCheck == 1 && $lifegroupCheck !=1){
        //query here to add sundayCheck
        $sql = "SELECT * FROM tblsundaylgattendance WHERE Name like '%".$name."%' AND zMonth='".$month."' AND zYear='".$year."'";
        $result = mysqli_query($conn, $sql);
        $queryResult = mysqli_num_rows($result);
        if($queryResult > 0)
        {
            //query for update
            $sql1 = "UPDATE tblsundaylgattendance SET Name='$name',NetworkLeader='$networkLeader',Mentor='$mentor',zMonth='$month',zMonthDigit='$monthDigit',zYear='$year',".$sunday."='$zsunday'
            WHERE Name like '%".$name."%' AND zMonth='".$month."' AND zYear='".$year."'";
        }  
        else{
            //query for insert
            $sql1 = "INSERT INTO tblsundaylgattendance(Name,NetworkLeader,Mentor,zMonth,zMonthDigit,zYear,".$sunday.") 
            VALUES('$name', '$networkLeader', '$mentor', '$month','$monthDigit', '$year', '$zsunday')";
        } 
        $query = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
        header("Location: ../Pages/SundayLGAttendance.php?result=saved");
        exit();

    }
    
       
}