<!--
Ben Chadwick
Jessica Sestak
Husrav Homidov
Tiffany Welo

Team Dotcom
12/1/20
formFunction.php creates the functions that validates the form
-->
<?php

//Validate Assistance
function validAssist($assistance) {
    $validAssistance = array("Utilities", "Rent", "Gas", "Thrift Store","Licence or ID","Food");
    //Check each assistance is valid
    foreach($assistance as $assistanceCheck) {
        if (!in_array($assistanceCheck, $validAssistance)) {
            return false;
        }

    }
    return true;
}

//Validate name
function validName($name)
{
    return !empty($name) && ctype_alpha($name);
}

//validate Email
function validEmail($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    } else {

        return true;
    }
}

function validPhone($phone) {
    if(!(preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $phone))) {
        return false;
    }
    else {
        return true;
    }
}

//Validate City
function validCity($city)
{
    return $city == "" OR ctype_alpha($city);
}

//Validate Zip
function validZip($zip)
{
    return ($zip =="") OR ($zip == 98030) OR ($zip ==98031) OR ($zip == 98032) OR ($zip == 98042) OR ($zip == 98058);
}


