<?php
if (isset($_POST['SaveMember']))
{
    require 'dbh.php';
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


 $sql = "INSERT INTO tblmembers(Name,Address,ContactNumber,EmailAdd,Age,Birthday,CivilStatus,Gender,Nationality,CompanyOrSchool,Mentor,NetworkLeader,IsMentor) 
            VALUES('$name', '$address', '$contactNumber', '$emailAddress', '$age', '$birthday', '$civilStatus', '$gender', '$nationality', '$companySchool', '$mentor', '$networkLeader', '$isMentor')";
			
					$query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

if ($isMentor == "Yes") {
        
                $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                $sql1 = "INSERT INTO tbluseraccounts(Name,Email,Password,Network) 
                VALUES('$name','$emailAddress', '$hashedPwd', '$networkLeader')";
                  
                        $query = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
                        header("Location: ../Pages/MemberList.php");
                        exit();
                 
    }  
    else {
        header("Location: ../Pages/MemberList.php");
        exit();

    }
}