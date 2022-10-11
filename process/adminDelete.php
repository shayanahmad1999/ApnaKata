<?php
require 'connection.php';

$adId =  $_GET['adId'];
$query = "DELETE FROM tbladmin WHERE adminId = '$adId'";
$response = mysqli_query($connect,$query);
if($response)
{
    header('location:../adminList.php?msgs=success');
    exit();
}
else
{
    header('location:../adminList.php?msgs=error');
    exit();
}
?>