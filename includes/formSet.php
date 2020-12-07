<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require("creds.php");

$query = "UPDATE `admin_functions` SET `form` =";
$query = $query.$_POST['display'];

$success = mysqli_query($conn, $query);
if (!$success) {
    echo "<br><h4 class='text-center'>Something went wrong...</h4>";
}