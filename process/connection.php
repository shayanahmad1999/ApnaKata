<?php

$ServerName = 'localhost';
$UserName = 'root';
$Password = '';
$DataBase = 'apnakata';

$connect = mysqli_connect($ServerName, $UserName, $Password, $DataBase);

if(mysqli_connect_errno())
{
    echo "<h1>Sorry DataBase is not Connected</h1>" . mysqli_connect_error();
}
session_start();
?>