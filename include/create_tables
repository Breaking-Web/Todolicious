<?php
require_once 'init.php';    //Initialization File to Setablish Database connection
	$sql1="create table todos(id int auto_increment primarey key, todo varchar(400) not null, user varchar(100) not null, status tinyint(4) default 0 not null, created timestamp default CURRENT_TIMESTAMP not null)";
	$result1 = mysqli_query($conn,$sql1);
	if($result1)
    {    
        echo '1';
    }
	$sql2="create table users(id int auto_increment primarey key, name varchar(50) not null, email varchar(100) not null, password varchar(50) not null)";
	$result2 = mysqli_query($conn,$sql2);
	if($result2)
    {    
        echo '2';
    }
    mysqli_close($conn);//close database connection
}
?>
