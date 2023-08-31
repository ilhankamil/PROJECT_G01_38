<?php

/*
$localhost = "localhost";
$username = "proadmin38";
$password = "proadmin38";
$database = "proonebadmintoncentre"; 
*/

$conn=mysqli_connect("localhost","proadmin38","proadmin38","proonebadmintoncentre");

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}