<?php
    $dbserver = 'localhost';
    $dbusername = 'Faust';
    $dbpassword = 'Phu0ng95crA';
    $dbname = 'faust1';

    $connect = new mysqli($dbserver, $dbusername, $dbpassword, $dbname);
    if ($connect->connect_error) {
        die($connect->connect_error);
    }
?>