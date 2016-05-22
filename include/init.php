<?php
session_start();
//Create Database Connection
$conn= new mysqli('localhost', 'root', '','todolicious') or die('Could not connect: ' . mysql_error());
?>