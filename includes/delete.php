<?php

include "creds.php";
include_once "common.php";
if (isset($_GET['recordId'])) {
    $recordId = $_GET['recordId'];
    $common = new Common();
    $delete = $common->deleteRecordById($conn, $recordId);
    if ($delete) {
/*        echo '<script>alert("Record deleted successfully !")</script>';*/
        echo '<script>window.location.href="http://bchadwick.greenriverdev.com/dotcomMigrate/control2.php";</script>';
    }
}
