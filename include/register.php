<?php
session_start();	//Start the Session Scope
require_once 'init.php';//Initialization File to Establish Database connection
if(isset($_POST['email'])&&isset($_POST['password'])&&isset($_POST['name']))
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$sql='insert into users(name,email,password) values("'.$name.'","'.$email.'","'.$password.'")';
	$result=mysqli_query($conn,$sql);//Execute the above Query
	if ($result) { //if successfully inserted, execute below code.
		//Set sessions for email, name and login
		$_SESSION['email']=$email;
		$_SESSION['name']=$row['name'];
		$_SESSION['register']='Registered Successfully!';
		header('location:../todo.php');//redirect to the ToDo page
	}
	else{
		$_SESSION['register']='Registration Failed!';
	header('location:../index.php');//redirect to the Index page
}
}
else{
		$_SESSION['register']='Something went Wrong! Please try again.';
	header('location:../index.php');//redirect to the Index page
}
mysqli_close($conn);//close database connection
?>