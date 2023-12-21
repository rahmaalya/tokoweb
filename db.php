<?php
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $dbname   = 'tokoweb';

    $conn = mysqli_connect ($hostname, $username, $password, $dbname) or die ('gagal terhubung kedatabase')
?>