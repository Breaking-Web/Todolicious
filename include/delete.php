<?php
require_once 'init.php';    //Initialization File to Setablish Database connection
if(isset($_POST['todo_id']))
{
	$todo_id = $_POST['todo_id'];
	$sql="delete from todos where id=".$todo_id." and user='".$_SESSION['email']."'";
	$result = mysqli_query($conn,$sql);//delete the item from the table
	if(!$result)//if the above code fails then run this
    {    
        //If mysql delete query was unsuccessful, output error 
        header('HTTP/1.1 500 Could not delete record!');//send the error record to the header
        exit();
    }
    mysqli_close($conn);//close database connection
}
?>
