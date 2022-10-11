<?php 
require 'connection.php';

if(isset($_POST['KATA']) && $_POST['KATA'] == 'insert')
{
    $brtPayment = $_POST['brtpayment'];
    $localPayment = $_POST['localpayment'];
    $paymentDate = $_POST['paymentdate'];

    $query = "INSERT INTO tblpaymentcit SET
    paymentBRTCit = '$brtPayment',
    paymentLocalCit = '$localPayment',
    paymentDateCit = '$paymentDate'";

    $response = mysqli_query($connect,$query);

    if($response)
    {
        header('location:../kataListCit.php?msg=success');
        exit();
    }
    else
    {
        header('location:../kataListCit.php?msg=error');
        exit();
    }
}
else
{
    echo "pleas first insert data";
}

?>