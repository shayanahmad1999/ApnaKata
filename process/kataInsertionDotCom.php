<?php 
require 'connection.php';

if(isset($_POST['KATA']) && $_POST['KATA'] == 'insert')
{
    $brtPayment = $_POST['brtpayment'];
    $localPayment = $_POST['localpayment'];
    $paymentDate = $_POST['paymentdate'];

    $query = "INSERT INTO tblpaymentdotcom SET
    paymentBRTDotCom = '$brtPayment',
    paymentLocalDotCom = '$localPayment',
    paymentDateDotCom = '$paymentDate'";

    $response = mysqli_query($connect,$query);

    if($response)
    {
        header('location:../kataListDotcom.php?msg=success');
        exit();
    }
    else
    {
        header('location:../kataListDotcom.php?msg=error');
        exit();
    }
}
else
{
    echo "pleas first insert data";
}

?>