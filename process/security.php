<?php

    if(!isset($_SESSION['ADMINid']) || empty($_SESSION['ADMINid']))
    {
        header('location:index.php?msg=please first login');
        exit();
    }

?>