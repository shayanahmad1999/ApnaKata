<?php
require 'connection.php';

if(isset($_POST['ADMIN']) && $_POST['ADMIN'] == 'signin')
{
    $Name = $_POST['name'];
    $Email = $_POST['email'];
    $Password = $_POST['password'];

    $query = "INSERT INTO tbladmin SET
    adminName = '$Name',
    adminEmail = '$Email',
    adminPassword = '$Password'";

    $response = mysqli_query($connect,$query);

    if($response)
    {
        header('location:../adminList.php?msg=success');
        exit();
    }
    else
    {
        header('location:../adminList.php?msg=error');
        exit();
    }
}
else
{
    echo "HAHAHAHAHA Nothing";
}

?>