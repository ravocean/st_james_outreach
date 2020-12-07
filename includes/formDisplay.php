<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require("creds.php");

$query = "SELECT form FROM `admin_functions`";

if($result = mysqli_query($conn, $query)){
    $row = $result->fetch_assoc();
    echo $row['form'];
}