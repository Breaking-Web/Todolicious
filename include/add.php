<?php
require_once 'init.php';	//Initialization File to Establish Database connection

if(isset($_POST['add_todo_text'])){
	$todo_item=trim($_POST['add_todo_text']);//remove extra spaces from the todo text
	if(!empty($todo_item))
	{
		$sql="insert into todos(todo, user) values('".$todo_item."','".$_SESSION['email']."')";
		$result = mysqli_query($conn,$sql);	//insert the new todo item in the table
		if ($result) {	//if successfully inserted, execute below code.
			$id=mysqli_insert_id($conn);	//get the last inserted id
			//HTML content that will be added on the todo page after inserting it in the table
			echo '<li class="todo_list" id="item_'.$id.'">';
			echo '<span id="todo-'.$id.'" class="item">'.$todo_item.'</span>';
			echo '<button class="delete" id="del-'.$id.'"><img src="images/delete.png"/></button>';
			echo '<button id="done-'.$id.'" class="done-btn"><img src="images/mark.png"/></button>';
			echo '</li>';
			mysqli_close($conn);//close database connection
		}
	}
}

?>