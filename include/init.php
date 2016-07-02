<?php
session_start();
$servername = "";  //change your server address here
$username = "";  //enter the database username here
$password = "";  //enter password here
$database = "";  //enter database name here

/*------------------------------------------------------Do not change anything below this line------------------------------------------------------*/

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
	echo "Connection Failed";
    die("Connection failed: " . mysqli_error($conn));
} 
?>
