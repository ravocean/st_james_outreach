<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require("creds.php");

$id = $_POST['id'];
$text = $_POST['text'];
$query = "UPDATE `outreach_form` SET `Note`='".$text."' WHERE id=".$id;
$success = mysqli_query($conn, $query);
if (!$success) {
    echo "$query";
    echo "<br><h4 class='text-center'>Something went wrong...</h4>";
}
