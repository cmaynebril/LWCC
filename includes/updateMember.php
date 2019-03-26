<?php

    require 'dbh.php';
    $ID = $_GET['ID'];
    $name = $_POST['MemberName'];
    $address = $_POST['Address'];
    $contactNumber = $_POST['ContactNumber'];
    $emailAddress = $_POST['EmailAddress'];
    $password = 'JesusLovesMe';
    $age = $_POST['Age'];
    $birthday = $_POST['Birthday'];
    $civilStatus = $_POST['CivilStatus'];
    $gender = $_POST['Gender'];
    $nationality = $_POST['Nationality'];
    $companySchool = $_POST['CompanySchool'];
    $mentor = $_POST['Mentor'];
    $networkLeader = $_POST['NetworkLeader'];
    $isMentor = $_POST['isMentor'];


 $sql = "UPDATE tblmembers SET Name='$name',Address='$address',ContactNumber='$contactNumber',EmailAdd='$emailAddress',Age='$age',Birthday='$birthday',
        CivilStatus='$civilStatus',Gender='$gender',Nationality='$nationality',CompanyOrSchool='$companySchool',
        Mentor='$mentor',NetworkLeader='$networkLeader',IsMentor='$isMentor'
           WHERE ID=$ID";
			
					$query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                    header("Location: ../Pages/MemberList.php");
                    exit();
