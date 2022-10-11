<?php 
require 'connection.php';

if(isset($_POST['KATA']) && $_POST['KATA'] == 'insert')
{
    $brtPayment = $_POST['brtpayment'];
    $localPayment = $_POST['localpayment'];
    $paymentDate = $_POST['paymentdate'];

    $query = "INSERT INTO tblpaymentuni SET
    paymentBRT = '$brtPayment',
    paymentLocal = '$localPayment',
    paymentDate = '$paymentDate'";

    $response = mysqli_query($connect,$query);

    if($response)
    {
        header('location:../kataListUni.php?msg=success');
        exit();
    }
    else
    {
        header('location:../kataListUni.php?msg=error');
        exit();
    }
}
else
{
    echo "pleas first insert data";
}

?>