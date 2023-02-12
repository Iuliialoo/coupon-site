<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

$connection = mysqli_connect('localhost', 'root', '7809', 'couponsite');

if (!$connection) {
    echo('Error connect to DataBase');
}
// else{
//     echo('Connecting to DataBase');
// }