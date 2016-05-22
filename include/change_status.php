<?php
require_once 'init.php';	//Initialization File to Setablish Database connection
if(isset($_POST['as'])){
	$todo_id=$_POST['todo_id'];
			$sql="update todos set status=1 where id=".$todo_id." and user='".$_SESSION['email']."'";
			$result = mysqli_query($conn,$sql);//Execute the update query
			mysqli_close($conn);	//close database connection
}
?>