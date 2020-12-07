<?php

require("creds.php");
class Common
{
    public function getAllRecords($conn) {
        $query = "SELECT * FROM outreach_form";
        $result = $conn->query($query) or die("Error in query1".$conn->error);
        return $result;
    }

    public function deleteRecordById($conn,$recordId) {
        $query = "DELETE FROM outreach_form WHERE id='$recordId'";
        $result = $conn->query($query) or die("Error in query2".$conn->error);
        return $result;
    }
}