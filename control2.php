<!--
Ben Chadwick
Jessica Sestak
Husrav Homidov
Tiffany Welo

Team Dotcom
11/1/20
This website is the homepage for St. James Outreach
-->

<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
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
                <th scope="col">Comments</th>
                <th scope="col">Notes</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody id="tableData">


            <?php
            // Select column data from the database table
            $sql = "SELECT `id`, `date`, `FirstName`, `LastName`, `Phone`, `Email`, 
                        `Address`, `AddressTwo`, `City`, `Zip`, `HelpList`, `Comments`, `Note` 
                        from outreach_form ORDER BY Date DESC";
            $result = $conn->query($sql);

            // Database content must contain at least one row
            if ($result->num_rows > 0) {
                // Print data while this condition is true

                while ($row = $result->fetch_assoc()) {
                    $recordId = $row["id"];
                    echo "<tr><td>" . $row["id"]
                        . "</td><td>" . date("M d, Y g:i a",
                            strtotime($row['date']."- 3 hours"))
                        . "</td><td>" . $row["FirstName"] ." ". $row["LastName"]
                        . "</td><td>" . $row["Zip"]
                        . "</td><td>" . $row["Email"]
                        . "</td><td>" . $row["Phone"]
                        . "</td><td>" . $row["HelpList"]
                        . "</td><td>" . $row["Comments"]
                        . "</td><td class='notes' id='note$recordId' contenteditable='true'>". $row['Note'] ."</td>
                        .  <td><a href='includes/delete.php?recordId=$recordId' class='btn btn-sm text-white'>Delete</a> </td>
                         </tr>";
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

        <!--<script>
            window.onload(function (){
                alert("preparing ajax");
                $.ajax({
                    url:"formDisplay.php",
                    type:"POST",
                    success:function(formState) {
                        /*$("#clicked").html(response);*/
                        if (formState == 0) {
                            alert("Form is set to 0");
                        } else {
                            alert("Something went wrong, not set to 0");
                        }
                    }
                    /*error:function (){
                        alert("could not return a value");
                    }*/
                });
            });
        </script>-->

        <div id="displayToggle" class="btn-group btn-group-toggle" data-toggle="buttons">
            <label id="onLabel" class="btn btn-secondary">
                <input type="radio" name="options" id="on" value="0"> On
            </label>
            <label id="offLabel" class="btn btn-secondary">
                <input type="radio" name="options" id="off" value="1"> Off
            </label>
            <label id="scheduleLabel" class="btn btn-secondary">
                <input type="radio" name="options" id="schedule" value="2""> Schedule
            </label>
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
<!-- jQuery Data Table -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script>

    $.post('includes/formDisplay.php',function (display){
        $('#onLabel').removeClass("active");
        $('#offLabel').removeClass("active");
        $('#scheduleLabel').removeClass("active");
        if(display == 0){
                    $('#on').prop("checked", true);
                    $('#onLabel').addClass("active");
                } else if (display == 1){
                    $('#off').prop("checked", true);
                    $('#offLabel').addClass("active");
                } else if (display == 2){
                    $('#schedule').prop("checked", true);
                    $('#scheduleLabel').addClass("active");

                }
        }
    );


    $('#on').click(function (){
        $.post('includes/formSet.php', {display : 0});
    });

    $('#off').click(function (){
        $.post('includes/formSet.php', {display : 1});
    });

    $('#schedule').click(function (){
        $.post('includes/formSet.php', {display : 2});
    });

    $(document).ready(function() {

        $('#user-table').DataTable({
            "order": [[0, "desc"]]
        });

        $('#tableData .notes').each(function () {
            $(this).blur(function (){
               let id = (this.id).substring(4);
               $.post('includes/edit.php', {id : id, text : ($(this).html())}, function (){});
            });
        });

    });
</script>

</body>
</html>
