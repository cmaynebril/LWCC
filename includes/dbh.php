<?php
/*
$servername = "localhost";
$dbUser = "id8899813_light";
$dbPassword = "Jesus";
$dbName = "id8899813_db";
*/


$servername = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "dblwcc";


$conn = mysqli_connect($servername, $dbUser, $dbPassword, $dbName);

if (!$conn) {
	die("Connection failed: ".mysqli_connect_error());
}