<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'draggen') or die;

if(!$conn){
    echo "Database connected" . mysqli_connect_error();
}