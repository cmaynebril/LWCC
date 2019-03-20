<?php
session_start();
if (isset($_POST['btn'])) {
	require 'dbh.php';

	$email = $_POST['email'];
	$pass = $_POST['pass'];

	if (empty($email)) {
		header("Location: ../index.php?error=EmptyFields!");
		exit();
	}

	else {
		$sql = "SELECT * FROM tbluseraccounts WHERE Email=? ";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("Location: ../index.php?error=sqlerror");
		exit();
		}
		else {

			mysqli_stmt_bind_param($stmt, "s", $email);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if ($row = mysqli_fetch_assoc($result)) {
				$pwdCheck = password_verify($pass, $row['Password']);
				
					$_SESSION['email'] = $row['Email'];
					$_SESSION['network'] = $row['Network'];
					$_SESSION['Mentorname'] = $row['Name'];
					
					header("Location: ../Pages/MainDashboard.php?Login=success");
					exit();
				}
			else {
				header("Location: ../index.php?error=NoUserFound!");
				exit();
			}
		}

	}
}


else {
	header("Location: ../index.php");
	exit();
}