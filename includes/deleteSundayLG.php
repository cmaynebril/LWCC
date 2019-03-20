<?php
if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    require 'dbh.php';
    $sql = "DELETE FROM tblsundaylgattendance WHERE ID = '$id'";
    $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    header("Location: ../pages/SundayLGAttendance.php?member=deleted");
    exit();


}