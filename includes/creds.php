<?php
// Connect to dataase
$database = "bchadwi1_dotcom";
$username = "bchadwi1_dotcomuser";
$password = "dotcompassword";
$hostname = "localhost";

$conn = @mysqli_connect($hostname, $username, $password, $database)
or die("There was a problem");


// var_dump($cnxn);