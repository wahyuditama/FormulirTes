<?php

$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'formulir';

$koneksi = mysqli_connect($hostname, $username, $password, $dbname);
if (mysqli_connect_errno()) {
    echo '' . mysqli_connect_error();
}
