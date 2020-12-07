<?php
session_start();
?>

<!--
Ben Chadwick
Jessica Sestak
Husrav Homidov
Tiffany Welo

Team Dotcom
11/1/20
This website is to let the user know that they submitted the form and emails the users information to the client
-->
<?php
//if(empty($_POST)) {
//   header("location: index.php");
//  return;
//}
// Include header file
include("includes/head.html");
require("includes/creds.php");
require("includes/formFunctions.php")
?>

<body>

<!--NAVBAR-->
<nav class="navbar navbar-dark bg-dark navbar-expand-md fixed-top">
    <div class="container">
        <button class="navbar-toggler" type="button"
                data-toggle="collapse" data-target="#myTogglerNav"
                aria-controls="myTogglerNav" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <a href="index.php" class="navbar-brand">Kent Outreach</a>
        <div class="collapse navbar-collapse" id="myTogglerNav">
            <div class="navbar-nav">
                <a href="index.php#assistance" class="nav-item nav-link">ASSISTANCE</a>
                <a href="index.php#contact" class="nav-item nav-link">CONTACTS</a>
                <a href="getinvolved.php" class="nav-item nav-link">GET INVOLVED</a>
                <a href="resources.php" class="nav-item nav-link">RESOURCES</a>
            </div><!-- navbar -->
        </div>
    </div><!-- container -->
</nav><!-- nav -->
<?php
//sets isValid to tru
$isValid = true;

//Check first name
$fname ="";
if (validName($_POST['fname'])) {
    $fname = $_POST['fname'];
} else {
    echo "<br><h4 class='text-center'>Invalid first name</h4>";
    $isValid = false;
}

//Check last name
$lname ="";
if (validName($_POST['lname'])) {
    $lname = $_POST['lname'];
} else {
    echo "<br><h4 class='text-center'>Invalid last name</h4>";
    $isValid = false;
}
$assistance = "";
$other = "";
$checkAssist = $_POST['otherTextInput'];
if (validAssist($_POST['assistance']) && $checkAssist != "") {
    $assistance = implode(", ", $_POST['assistance']);
    $other = $_POST['otherTextInput'];
}
else if(validAssist($_POST['assistance'])) {
    $assistance = implode(", ", $_POST['assistance']);
}
else if($checkAssist != "" && (!isset($_POST['assistance']))) {
    $other = $_POST['otherTextInput'];
}
else {
    echo "<br><h4 class='text-center'>Invalid Assistance</h4>";
    $isValid = false;
}

//check email and phone number
$email = "";
$phone = "";
$emailCheck = $_POST['emailFrom'];
$phoneCheck = $_POST['phone'];
//check that phone number and email are not blank
if($phoneCheck != "" && $emailCheck != "") {
    if((validEmail($emailCheck))&&(validPhone($phoneCheck))) {
        $email = $emailCheck;
        $phone = $phoneCheck;
    }
    else if((!validEmail($emailCheck)) && (validPhone($phoneCheck))) {
        echo "<br><h4 class='text-center'>Please provide a valid email </h4>";
        $isValid = false;
    }
    else if((validEmail($emailCheck))&&(!validPhone($phoneCheck))) {
        echo "<br><h4 class='text-center'>Please provide a valid phone number </h4>";
        $isValid = false;
    }
    else {
        echo "<br><h4 class='text-center'>Please provide a valid phone number </h4>";
        echo "<br><h4 class='text-center'>Please provide a valid email </h4>";
        $isValid = false;
    }
}
else if($phoneCheck != "") {
    if(validPhone($phoneCheck)) {
        $phone = $phoneCheck;
    }
    else {
        echo "<br><h4 class='text-center'>Please provide a valid phone number </h4>";
        $isValid = false;
    }
}
else if ($emailCheck != "") {
    if(validEmail($emailCheck)) {
        $email = $emailCheck;
    }
    else {
        echo "<br><h4 class='text-center'>Please provide a valid email </h4>";
        $isValid = false;
    }
}

else {
    echo "<br><h4 class='text-center'>Please provide either an email or phone number</h4>";
    $isValid = false;
}

//check city
$city = "";
if (validCity($_POST['city'])) {
    $city = $_POST['city'];
} else {
    echo "<br><h4 class='text-center'>Invalid city name</h4>";
    $isValid = false;
}

//check zip
$zip = "";
if (validZip($_POST['zip'])) {
    $zip = $_POST['zip'];
} else {
    echo "<br><h4 class='text-center'>Invalid Zip</h4>";
    $isValid = false;
}

//checks if isValid is not true
if (!$isValid) {
    return;
}
//get data

//$fname = $_POST['fname'];
//$lname = $_POST['lname'];
//$phone = $_POST['phone'];
//$email = $_POST['emailFrom'];
$addressOne = $_POST['address'];
$addressTwo = $_POST['addressTwo'];
//$city = $_POST['city'];
//$zip = $_POST['zip'];
//$assistance = implode(", ", $_POST['assistance']);
$comment = $_POST['inComment'];
//$assistanceArray = $_POST['assistance'];
//$other = $_POST['otherTextInput'];
if ($other !== "") {
    $assistanceMore = $assistance . " Other: " . $other;
} else {
    $assistanceMore = $assistance;
}

/*Prevent SQL injection */
$fname = mysqli_real_escape_string($conn, $fname);
$lname = mysqli_real_escape_string($conn, $lname);
$phone = mysqli_real_escape_string($conn, $phone);
$addressOne = mysqli_real_escape_string($conn, $addressOne);
$addressTwo = mysqli_real_escape_string($conn, $addressTwo);
$city = mysqli_real_escape_string($conn, $city);
$zip = mysqli_real_escape_string($conn, $zip);
$assistanceMore = mysqli_real_escape_string($conn, $assistanceMore);
$comment = mysqli_real_escape_string($conn, $comment);

// Send data to database
$sql = "INSERT INTO outreach_form 
        (`id`, `FirstName`, `LastName`, `Phone`, `Email`, `Address`, `AddressTwo`, 
        `City`, `Zip`, `HelpList`, `Comments`) 
        VALUES (NULL, '$fname', '$lname', '$phone', 
        '$email', '$addressOne', '$addressTwo', '$city', '$zip', '$assistanceMore', '$comment');";

$success = mysqli_query($conn, $sql);
if (!$success) {
    echo "<br><h4 class='text-center'>Something went wrong...</h4>";
}

//format data to be more easily read

$to = "jsestak2@mail.greenriver.edu";
$subject = "Form completed";
$message = "Form completed by: $fname $lname \r\n";
$message .= "Phone: $phone\n";
$message .= "Email: $email\n";
$message .= "Address: $addressOne $addressTwo\n";
$message .= "City: $city\n";
$message .= "Zip: $zip \n\n";
$message .= "Assistance Required: $assistance\n";
$message .= "Other: $other\n";


$message .= "Message: $comment";


//email data
$confirmEmail = "Thank you for submitting your form. Someone will email you shortly.";
$confirmEmailSubject = "St.James Application";
mail($to, $subject, $message);
mail($email, $confirmEmailSubject, $confirmEmail);
?>
<div class="w3-content pageStyle">

    <!-- Note to user thanking them for submitting form -->
    <div class="w3-content pageStyle">

        <div class="w3-container w3-content w3-center w3-padding-64 band shadow-lg p-3 mb-5 bg-white rounded">
            <img src="images/stjameslogoreal.png" class="img-fluid" alt="St. James logo">
        </div>

        <div class="w3-container w3-content w3-center w3-padding-64 band shadow-lg p-3 mb-5 bg-white rounded" id="main">

            <h2>Thank you for your request. We'll be in touch soon!</h2> <br>
            <div>
                <h4>Please <a href="resources.php"><u>click here</u></a> to see the other resources provided!
                </h4>

            </div>
        </div>

        <!-- The Footer Section -->
        <div class="w3-container w3-content w3-center w3-padding-64 shadow-lg mb-5 bg-white w3-black rounded"
             id="contact">
            <!-- Footer -->
            <footer>
                <div class="footer-top">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 col-lg-4 footer-about">
                                <h3 class="mb-5">Hours</h3>

                                <p><i class="fa fa-calendar contactFont"> </i>
                                    Monday: 1:00pm to 4:00pm</p>
                                <p>Tuesday: 9:00am to 12:00 noon</p>
                                <p>Wednesday: 1:00pm to 4:00pm</p>

                            </div>

                            <div class="col-md-4 col-lg-4 footer-contact">
                                <h3 class="mb-5">Contacts</h3>
                                <!-- Google Map insertion -->
                                <p><i class="fa fa-map-marker" id="google"></i>
                                    <a
                                            href="https://goo.gl/maps/UEuiGpguDtXozPjN7"
                                            target="_blank"
                                            rel="noopener noreferrer"
                                    >24447 94th Ave S, Kent, WA, 98030 </a></p>
                                <p><i class="fa fa-phone contactFont"></i> Phone:<a
                                            href="tel:253-852-4100">253-852-4100</a></p>
                                <p><i class="fa fa-envelope contactFont"> </i> Email:mail@mail.com</p>
                            </div>

                            <div class="col-md-4 col-lg-3 footer-location">
                                <h3 class="mb-3">Our Location</h3>
                                <!--Google map-->
                                <div id="map-container-google-1" class="z-depth-1-half map-container"
                                     style="height: 200px">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10806.156076848025!2d-122.216393!3d47.381915!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54905eaea6606e61%3A0x206815f453c0e48b!2s24447%2094th%20Ave%20S%2C%20Kent%2C%20WA%2098030!5e0!3m2!1sen!2sus!4v1605391186289!5m2!1sen!2sus"
                                            width="300" height="150" style="border:0;" allowfullscreen=""
                                            aria-hidden="false"
                                            tabindex="0"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7 footer-menu">
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script
        src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"
></script>
<script
        src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"
></script>
<script
        src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"
></script>
</body>
</html>
