<?php
session_start(); //Start the Session Scope
if(isset($_SESSION['email']))
{
	header('location:todo.php');
	//if user is already logged in then redirect to the ToDo page
}
?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8"/>
	<title>ToDo</title>
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Architects+Daughter" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script> 
    <script type="text/javascript" src="js/script.js"></script> 
</head>
<body>
<h1 class="header">ToDo</h1>
<div class="container">
<!--Start Login Area-->
<div id="login">
	<h2 class="stylize-text">Login</h2>
	<p class="warning">
	<?php
		if(isset($_SESSION['login'])){
			//if login fails, print the message
		echo $_SESSION['login'];
		unset($_SESSION['login']);
	}
		if(isset($_SESSION['register'])){
			//if registration fails, print the message
		echo $_SESSION['register'];
		unset($_SESSION['register']);
		}
		?>
		</p>
		<!--Start Login Form-->
	<form action="include/login.php" class="item-add" method="post">
		<input type="email" name="email" class="input" placeholder="Enter Email" autocomplete="off" required>
		<input type="password" name="password" class="input" placeholder="Enter Password" autocomplete="off" required>
		<input type="submit" value="Login" class="submit">
	</form>
	<!--End Login Form-->
	<br/>
<p class="center-text">Don't have an account? Click to <a id="register_tab" class="tab">Register</a></p>
</div>
<!--End Login Area-->
<!--Start Registration Area-->
<div id="register">
	<h2 class="stylize-text">Register</h2>
	<!--Start Registration Form-->
	<form action="include/register.php" class="item-add" method="post">
		<input type="text" name="name" class="input" placeholder="Enter Full Name" autocomplete="off" required>
		<input type="email" name="email" class="input" placeholder="Enter Email" autocomplete="off" required>
		<input type="password" name="password" class="input" placeholder="Enter Password" autocomplete="off" required>
		<input type="submit" value="Register" class="submit">
	</form>
	<!--End Registration Form-->
	<br/>
<p class="center-text">Already Registered? Click to <a id="login_tab" class="tab">Login</a></p>
</div>
<!--End Registration Area-->
</div>

</body>
</html>
