<!--
Ben Chadwick
Jessica Sestak
Husrav Homidov
Tiffany Welo

Team Dotcom
11/1/20
This website is the resources for St. James Outreach
-->
<?php

// Include header file
include('includes/head.html');

?>
<body>

<!--NAVBAR-->
<nav class="navbar navbar-dark bg-dark navbar-expand-md sticky-top">
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
                <a href="resources.php" class="nav-item nav-link active">RESOURCES</a>
            </div><!-- navbar -->
        </div>
    </div><!-- container -->
</nav><!-- nav -->

    <div class="w3-container w3-content w3-center w3-padding-64 band shadow-lg p-3 mb-5 mt-5 rounded">
                <h2 class="w3-wide w3-center">COMMUNITY RESOURCES</h2>
                <span class="w3-opacity w3-center w3-large"><i>Additional help can be found below...</i></span>
        <hr class="style-13">
        <!--LINKS AND DESCRIPTION SECTION-->
        <!--<div class="w3-container w3-theme" id="myHeader">-->
        <div class="w3-theme w3-container w3-center d-flex justify-content-center container">
            <div class="d-none d-lg-block">
            <div class="row">

                <div class="col-md-6">

                    <div class="card form-group">
                        <div class="card-title w3-black lead">2-1-1</div>
                        <div class="row">
                            <div class="col-9">
                            <aside>2-1-1 is a free confidential community service and your one-stop connection to the local services you need, from utility assistance, food, housing, health, child care, after school programs, elder care, crisis intervention and much more.</aside>
                            </div>
                            <div class="col">
                            <a href="https://www.211.org" target="_blank"><img class="ml-0"
                                                                               src="images/211-logo.svg" alt="211"
                                                                               <!--style="width:100px; height:120px;"--></a>
                            </div>
                        <!--<div class="row">
                            <div class="col">
                                <aside class="pr-4">
                                    2-1-1 is a free confidential community service and your one-stop connection to the local services you need, from utility assistance, food, housing, health, child care, after school programs, elder care, crisis intervention and much more.</aside>
                            </div>
                            <div class="col">
                            <a href="https://www.211.org" target="_blank"><img class="card-img-top"
                                                                               src="images/211-logo.svg" alt="211"
                                                                               style="width:220px; height:120px;"></a>
                            </div>-->
                        </div>
<!--                        <div class="card-footer"><a href="https://www.211.org" target="_blank">Go To 2-1-1</a></div>
-->                    </div>
                    <div class="card form-group cardHeight">
                        <a href="http://kentmethodist.com/assistance" target="_blank"><img class="mt-4 flex-margin"
                                                                                           src="images/KentUMC-logo.png"
                                                                                           alt="Kent Methodist"
                                                                                           style="width:360px; height:140px;"></a>


                    </div>
                </div>
                <div class="col-md-6">

                    <div class="card form-group cardHeight">
                        <a href="https://stjameskent.org/" target="_blank"><img class="mt-4 flex-margin"
                                                                                src="images/stjamesresourcelogo.png"
                                                                                alt="Kent Methodist"
                                                                                style="width:280px; height:140px;"></a>

                    </div>

                    <div class="card form-group cardHeight">
                        <a href="https://www.dshs.wa.gov/" target="_blank"><img class="mt-4 flex-margin"
                                                                                src="images/dshs.png"
                                                                                alt="Kent Methodist"
                                                                                style="width:280px; height:160px;"></a>

                    </div>
                </div>

            </div>
            </div>
        </div>

    </div>
    <!-- The Footer Section -->
    <div class="w3-container w3-content w3-center w3-padding-64 shadow-lg mb-5 bg-white w3-black rounded" id="contact">
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
                            <p><i class="fa fa-phone contactFont"></i> Phone:<a href="tel:253-852-4100">253-852-4100</a>
                            </p>
                            <p><i class="fa fa-envelope contactFont"> </i> Email:mail@mail.com</p>
                        </div>

                        <div class="col-md-4 col-lg-3 footer-location">
                            <h3 class="mb-3">Our Location</h3>
                            <!--Google map-->
                            <div id="map-container-google-1" class="z-depth-1-half map-container" style="height: 200px">
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