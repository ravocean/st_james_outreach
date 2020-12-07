<?php
session_start();

//checks to see if logged in if not it will take you to index.php
if (!isset($_SESSION['loggedin'])) {
    //store the page that i am currently on in the session
    $_SESSION['page'] = $_SERVER['SCRIPT_URI'];

    header("location: login.php");
}
// Include header file
include("includes/head.html");
include("includes/creds.php");

?>

<!-- Beginning of the main body -->
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
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-item nav-link" href="logout.php">Log Out</a>
                </li>
            </ul>
        </div>
    </div><!-- container -->
</nav><!-- nav -->

<div class="w3-content pageStyle">
    <!-- The Application Form Section -->
    <!-- Paragraph representing what the Outreach program does -->
    <div class="w3-container w3-content w3-center w3-padding-64 band shadow-lg p-3 mb-5 bg-white rounded">

        <!-- Welcome Message -->
        <div class="w3-container w3-content w3-center w3-padding-64" id="welcomeMessage">
            <h1>Control Page</h1>
        </div>
    </div>
</div>

<!--TABLE-->
<div class="w3-content pageStyle">
    <div class="band shadow-lg p-3 mb-5 bg-white rounded table-responsive">

        <table class="table display table-hover" id="user-table">
            <thead class="thead-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Date</th>
                <th scope="col">Name</th>
                <th scope="col">Zip</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Help List</th>
                <th scope="col">Comments and Attachments</th>
            </tr>
            </thead>
            <tbody>

            <?php
            // Select column data from the database table
            $sql = "SELECT `ID`, `Date`, `First Name`, `Last Name`, `Phone`, `Email`, 
                        `Address`, `Adress 2`, `City`, `ZIP`, `Help List`, `Comments and Attachments` 
                        from outreach_form ORDER BY Date DESC";
            $result = $conn->query($sql);

            // Database content must contain at least one row
            if ($result->num_rows > 0) {
                // Print data while this condition is true
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["ID"]
                        . "</td><td>" . date("M d, Y g:i a",
                            strtotime($row['Date']."- 3 hours"))
                        . "</td><td>" . $row["First Name"] ." ". $row["Last Name"]
                        . "</td><td>" . $row["ZIP"]
                        . "</td><td>" . $row["Email"]
                        . "</td><td>" . $row["Phone"]
                        . "</td><td>" . $row["Help List"]
                        . "</td><td>" . $row["Comments and Attachments"]
                        . "</td> </tr>";
                }
            } else {
                echo "0 Result";
            }

            /*
            $sql = "SELECT `ID`, `Date`, `First Name`, `Last Name`, `Phone`, `Email`, 
                        `Address`, `Adress 2`, `City`, `ZIP`, `Help List`, `Comments and Attachments` 
                        from outreach_form";
            $result = mysqli_query($cnxn, $sql);

            foreach ($result as $row) {
                $id = $row["ID"];
                $date = date("M d, Y g:i a",
                    strtotime($row['Date']."- 3 hours"));
                $name = $row["First Name"] ." ". $row["Last Name"];
                $phone = $row["Phone"];
                $email = $row["Email"];
                $address = $row["Address"] . " " . $row["Address 2"] . " " . $row["City"] . ", " . $row["ZIP"];
                $helplist = $row["Help List"];
                $comments = $row["Comments and Attachments"];

                echo "<tr>";
                echo "<td>$id</td>";
                echo "<td>$date</td>";
                echo "<td>$name</td>";
                echo "<td>$phone</td>";
                echo "<td>$email</td>";
                echo "<td>$address</td>";
                echo "<td>$helplist</td>";
                echo "<td>$comments</td>";
                echo "</tr">;
            }
            */

            ?>

            </tbody>
        </table>
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
<!-- jQuery Data Table -->
<script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

<script>$(document).ready(function() {
        $('#user-table').DataTable( {
            "order": [[ 0, "desc" ]]
        } );
    } );</script>

<script src="scripts/scripts.js"></script>
<script src="scripts/index.js"></script>
<script src="scripts/zipCode.js"></script>

</body>
</html>
