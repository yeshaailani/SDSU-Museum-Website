<!doctype html>
<html lang="en">
<!--
    Yesha Ailani
    823351783
    CS545 Assignment #4
-->

<head>
    <meta charset="utf-8">
	<title>Sign Up</title>
	<meta http-equiv="content-type" 
		content="text/html;charset=utf-8" />

    <link rel="stylesheet" type="text/css" href="mycssfile.css" />
	<script src="validate.js"></script>

</head>

<body onload="updatePage()" oncontextmenu="return false;">
	
   <div class="container">
        <div class="header-name">
		
				<h2 class="header-text">
					San Diego Natural History Museum </br> 
					<label for="lastUpdated" id="lastUpdated" class="topright"></label>	
				</h2>
								
		</div>
		
		

            
            <div class="mainMenu">
                <ul class="menu">
                  <li><a class="active" href="index.html">Home</a></li>
				   <li><a href="history.html">History</a></li>
                  <li><a href="events.html">Events</a></li>
                  <li><a href="exhibits.html">Exhibits</a></li>
                  <li><a href="newsLetter.html">News Letter</a></li>
                  <li><a href="aboutUs.html">About Us</a></li>
                  <li><a href="contactUs.html">Contact Us</a></li>
				  <li><a href="signUp.php">Sign Up</a></li>
                </ul>
            </div>
    </div>
        <hr />
		
		
          <div>
            <div class="blankLeftContainer">    
            </div>
<?php
// define variables and set to empty values
//error_reporting(E_ERROR | E_PARSE);

$fname = $lname = $email = $event = $phone_no = $address = $comments = $attendees_under5 = $attendees_5to12 = $attendees_13to17 = $attendees_over18 = "";
$fname_err = $lname_err = $email_err = $event_err = $attendees_err = "";


$attendees = 0; // set attendees to zero
$event = ""; // set selected event to null
$noerrors = true; // flag set to redirect when form is without errors
$birthdate = "";


$newsletter = "on"; // user subscribed by default
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = preprocess($_POST["fname"]);
    $lname = preprocess($_POST["lname"]);
    $email = preprocess($_POST["email"]);
    $event = preprocess($_POST["event"]);
    $noerrors = true;
    $phone_no = preprocess($_POST["phone_number"]);
    $address = preprocess($_POST["address"]);
    $comments = preprocess($_POST["comments"]);
	$birthdate= preprocess($_POST["birthdate"]);
	
	

    if (isset($_POST["newsletter"]))
        $newsletter = "set"; 
	else
		$newsletter = "unset"; 

    if (isset($_POST["total_attendees"]))
        $attendees = preprocess($_POST["total_attendees"]); 

    if ($fname == "")
    {
        $fname_err = "First name cannot be blank"; //first name is required
        $noerrors = false;
    }


    if ($lname == "")
        {
            $lname_err = "Last name cannot be blank"; //last name is required
            $noerrors = false;
        }


    if ($email == "")
        {
            $email_err = "email cannot be blank"; //email id is required
            $noerrors = false;
        }

    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { //validating email id
        $email_err = "Invalid! please re-enter valid email";
        $noerrors = false;
    }

    if ($event == "") {
        $event_err = "Please select an event to proceed";
        $noerrors = false;
    }

    if (isset($_POST["attendees_under_5"])) {
        $attendees_under5 = preprocess($_POST["attendees_under_5"]);
        $attendees += (int)$attendees_under5; // adding up all attendees
    }

    if (isset($_POST["attendees_5to12"])) {
        $attendees_5to12 = preprocess($_POST["attendees_5to12"]);
        $attendees += (int)$attendees_5to12; // adding up all attendees
    }

    if (isset($_POST["attendees_13to17"])) {
        $attendees_1f3to17 = preprocess($_POST["attendees_13to17"]);
        $attendees += (int)$attendees_13to17; // adding up all attendees
    }

    if (isset($_POST["attendees_over18"])) {
        $attendees_over18 = preprocess($_POST["attendees_over18"]);
        $attendees += (int)$attendees_over18; // adding up all att
    }

    if ($attendees <= 0) {
        $attendees_err = "Please enter valid attendees"; // to prevent rogue entries
        $noerrors = false;
    }

    if ($noerrors == true) {
        // set sessions array for persistent usage of data on the next webpage
        session_start(); // new session for subsequent form fills
        $_SESSION["fname"] = $fname;
        $_SESSION["lname"] = $lname;
        $_SESSION["email"] = $email;
        $_SESSION["address"] = $address;
        $_SESSION["phone_no"] = $phone_no;
        $_SESSION["event"] = $event;
        $_SESSION["attendees"] = $attendees;
        $_SESSION["comments"] = $comments;
        $_SESSION["newsletter"] = $newsletter;
		$_SESSION["birthdate"] = $birthdate;
		
        header('Location: thanks.php');
    }

}

function preprocess($data)
{
//    simple function that removes extra whitespaces and special characters if any

    if (empty($data)) // if user sends blank form
        return "";

    $data = htmlspecialchars($data);
    return $data;
}

?>

<div class="mainContainer">
    <div class="mainContainer"  style="margin-left: 25px;">
        
		<h3 style="margin-left: 40%; color: white;">Sign Up for an Event</h3><br/>	
        <div>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <!-- This will direct to same webpage until all mandatory fields are filled and form is without errors.-->
                <h5 class="mainContainer">
                    First Name*:
                    <!--                    hidden error tags for required values-->
                    <input type="text" class="register-input-values" placeholder="Enter First Name" name="fname"
                           value="">
						   <span class="error"> <?php echo $fname_err;?>
                       </span>
                </h5>
                <!--                For filling in past values -->

                <h5 class="mainContainer">
                    Last Name*:
                    <input type="text" class="register-input-values" placeholder="Enter Last Name" name="lname"
                           value="">
						    <span class="error"> <?php echo $lname_err;?> </span>
                </h5>


                <h5 class="mainContainer">
                    Address:
                    <textarea rows="5" cols="10" placeholder="Enter Address" class="big-textbox"
                              name="address"></textarea>
                </h5>


                <h5 class="mainContainer">
                    Phone Number:
                    <input type="text" class="register-input-values" placeholder="Enter phone number"
                           name="phone_number" value="">
                </h5>
				
				<h5 class="mainContainer">
                    Date of Birth:
                    <input type="date" name="birthdate" >
                </h5>
				


                <h5 class="mainContainer">
                    Email Id*:
                    <input type="text" class="register-input-values" placeholder="Enter email id" name="email"
                           value="">
						   <span class="error"> <?php echo $email_err;?>
                       </span>
                </h5>


                <h5 class="mainContainer">
                    Event Name*:
                    <select class="dropdown" name="event">
                        <option value="">Choose an event</option>
                        <option value="SDSU recreation" >
                            SDSU Recreation
                        </option>
                        <option value="BRCC Project">
                            BRCC Project
                        </option>
                    </select>
					<span class="error"> <?php echo $event_err;?>
                       </span>
                </h5>


                <h5 class="mainContainer">
                    No. of Attendees:
                    <span class="error">* </span>
                    <input type="text" id="total_attendees" placeholder="Total Number of Attendees:" disabled
                           value="" name="total_attendees" onchange="updateTotal()"
                           required>

                    <input type="number" id="id1" min="0" max="10"
                           placeholder="Attendees under 5 years: (0 to 10)"
                           name="attendees_under_5"
                           value="" onchange="updateTotal()"
                    >
                    <input type="number" id="id2" min="0" max="10"
                           placeholder="Attendees between 5 - 12: (0 to 10)"
                           name="attendees_5to12"
                           value="" onchange="updateTotal()"
                    >
                    <input type="number" id="id3"
                           min="0" max="10" placeholder="Attendees between 13 - 17: (0 to 10)" name="attendees_13to17"
*                           value="" onchange="updateTotal()"
                    >
                    <input type="number" id="id4" min="0" max="10"
                           placeholder="Attendees above 18: (0 to 10)"
                           name="attendees_over18"
                           value="" onchange="updateTotal()"
                    >

                </h5>


                <h5 class="mainContainer">
                    Add comment for any other events you would like:
                    <input type="text" class="register-input-values big-textbox"
                           placeholder="Add your comments here" name="comments"
                           value="">
                </h5 >

                    <h5 class="mainContainer">
                        <input type="checkbox" class="register-input-values newsletter checkbox" name="newsletter" checked>
                        Would you like to sign-up for monthly newsletter?
                    </h5>


                    <h5 class="mainContainer">
                        <input type="submit" class="register-input-values submit-form" name="submit" value="Register Now!">
                    </h5>
            </form>

        </div>

    </div>
					<div class="blankRightContainer">
							
					</div>
</div>
        <div class="footer">
        <p class="pFooter">
            © All rights reserved 
            <span class="footerLogos">
            Follow us @ 
            <a href="https://www.facebook.com/SanDiegoNaturalHistoryMuseum/" onclick="target='_blank'"> <img src="img/fb.png" alt="Facebook" class="icon" /> </a>
            
            <a href="https://www.instagram.com/sdnhm/" onclick="target='_blank'"> <img src="img/twit.png" alt="Instagram" class="icon" /> </a>
            <a href="https://twitter.com/SDNHM" onclick="target='_blank'"> <img src="img/insta.png" alt="twitter" class="icon" /> </a>
            </span>
        </p>
        </div>
    </div>
</body>

</html>