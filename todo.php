<?php
require_once 'include/init.php';//Initialization File to Establish Database connection
$email=$_SESSION['email'];
$sql="SELECT id,todo,status FROM todos where user='".$email."'";
$result = mysqli_query($conn,$sql);//Select all the todo items for the logged in users.
?>

<!Doctype html>
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


<!--Start ToDo area-->
<div id="todo">
<ul class="items" id="todo_display">
<?php 
	if (mysqli_num_rows($result) > 0) { //if there exist a record then execute the following code
?>
<!--Start the loop to display the items-->
<?php
	while($row = mysqli_fetch_assoc($result)) {
?>
		<li class="todo_list" id="item_<?php echo $row['id'] ?>">
		<!--ToDo item-->
		<span id="todo-<?php echo $row['id'] ?>" class="item<?php echo $row['status']? ' done':''?>"><?php echo $row["todo"]; ?></span>
		<!--Delete Button-->
		<button class="delete" id="del-<?php echo $row['id'] ?>"><img src="images/delete.png"/></button>
		<?php if(!$row['status']): ?>
		<!--Mark Button-->
		<button id="done-<?php echo $row['id'];?>" class="done-btn"><img src="images/mark.png"/></button>
		<?php endif; ?>
	</li>
	<?php } ?>
<?php
	}
	?>
	</ul>
</div>
<!--Add new Item-->
<div id="add_new item-add">
		<input type="text" name="add_todo_text" id="add_todo_text" class="input" placeholder="Add new Item" autocomplete="off" required>
		<input type="submit" value="Add" id="add_todo" class="submit">
		<center><img src="images/loading.gif" id="LoadingImage" style="display:none" /></center>
</div>
</div>
<a href="logout.php"><h2 class="logout">Logout</h2></a>
</body>
</html>
<!--Close DataBase Connection-->
<?php mysqli_close($conn); ?>