<?php
session_start();	//Start the Session Scope
require_once 'init.php';//Initialization File to Establish Database connection
if(isset($_POST['email'])&&isset($_POST['password']))
{
	$email=$_POST['email'];
	$password=$_POST['password'];
	$sql='select * from users where email="'.$email.'"and password="'.$password.'"';
	$result=mysqli_query($conn,$sql);//Execute the above Query
	if (mysqli_num_rows($result) > 0) { //if there exist a record, execute below code.
		while($row = mysqli_fetch_assoc($result)) {
			//Set sessions for email, name and login
		$_SESSION['email']=$email;
		$_SESSION['name']=$row['name'];
		$_SESSION['login']='Logged in Successfully!';
		header('location:../todo.php');//redirect to the ToDo page
	}
	}
	else{
		$_SESSION['login']='Login Failed!';
	header('location:../index.php');//redirect to the Index page
}
}
else{
		$_SESSION['login']='Something went Wrong! Please try again.';
	header('location:../index.php');//redirect to the Index page
}
mysqli_close($conn);//close database connection
?>