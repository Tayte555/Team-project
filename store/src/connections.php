<?php

#!!! CHANGE BEFORE HOSTING ON ASTON SERVER !!!
$dbhost = "localhost"; 
$dbuser = "root";
$dbpass = "";
$dbname = "Team-project";

if($connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
    die("Database Connection Failed...");
}
