/*
Ben Chadwick
Jessica Sestak
Husrav Homidov
Tiffany Welo

Team Dotcom
10/19/20
zipCode checks the input the user puts for Zip Codes and then checks to see
if it sends the user to the resources page or form
*/


document.getElementById("zipForm").onsubmit = validateZip;
/*
	function validateZip gets the value a user puts in and if the value
	is 98030,98031,98032,98042,98058 if passes theme to the form otherwise 
	it sends the user to the resources page
*/
window.onload = validateTime;

function showForm() {
    document.getElementById("formDiv").classList.remove("d-none");
}

function showNonForm() {
    document.getElementById("nonformDiv").classList.remove("d-none");
}

//validates when the user can fill out the form
function validateTime() {
    let todayDate = new Date();
    let myDay = /*todayDate.getDay()*/ 3;
    let myHour = /*todayDate.getHours();*/ 13;
    // Tests to see if it is Monday
    if (myDay == 1) {
        console.log("It's Monday!");
        // Tests to see if it is after 1pm and before 4pm
        if (13 <= myHour && myHour < 16) {
            console.log("You made it in time!");
            showForm();
        } else {
            console.log("Sorry, try again later!");
            showNonForm();
        }
        // Test to see if it is Tuesday
    } else if (myDay == 2) {
        console.log("It's Tuesday!");
        // Tests to see if it is after 9am and before noon
        if (9 <= myHour && myHour < 12) {
            console.log("You made it in time!");
            showForm();
        } else {
            console.log("Sorry, try again later!");
            showNonForm();
        }
        // Test to see if it is Wednesday
    } else if (myDay == 3) {
        console.log("It's Wednesday!");
        // Tests to see if it is after 1pm and before 4pm
        if (13 <= myHour && myHour < 16) {
            console.log("You made it in time!");
            showForm();
        } else {
            console.log("Sorry, try again later!");
            showNonForm();
        }
        // Else, it's not within the hours of operation
    } else {
        console.log("Sorry, try again later!");
        showNonForm();
    }

    /*Monday:
        1:00 pm to 4:00 pm
    Tuesday:
        9 a.m. to 12:00 noon
    Wednesday:
        1:00 pm to 4:00 pm*/

}


//validateds the zip
function validateZip() {
    let zip = document.getElementById("zipCode").value;
    if (zip == "98030") {
        ("Correct Zip code");
        return true;
    } else if (zip == "98058") {
        ("Correct Zip code");
        return true;
    } else if (zip == "98031") {
        ("Correct Zip code");
        return true;
    } else if (zip == "98032") {
        ("Correct Zip code");
        return true;
    } else if (zip == "98042") {
        ("Correct Zip code");
        return true;
    } else {
        ("incorrect zip code");
        /*let choice = confirm("Sorry, you seem to be out of our reach. You will now be redirected to see additional resources...");
        if (choice == true) {
            window.location = "../resources.php";
        }*/
        $("#redirectModal").modal()

        return false;
    }

}

// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}

// When the user clicks anywhere outside of the modal, close it
var modal = document.getElementById("ticketModal");
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
};
