<!doctype html>
<html lang="en">
<!--
    Yesha Ailani
    823351783
    CS545 Assignment #4
-->

<head>
    <meta charset="utf-8">
    <title>Registration complete!</title>
    <link rel="stylesheet" href="mycssfile.css"/>
	<script src="validate.js"></script>
</head>

<body onload="setFirstLetterCapital(); updatePage(); " oncontextmenu="return false;">
  <div class="container">
        <div class="header-name">
		
				<h2 class="header-text">
					San Diego Natural History Museum
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

session_start();

$first_name = $_SESSION["fname"];
$last_name = $_SESSION["lname"];
$email_id = $_SESSION["email"];
$address = $_SESSION["address"];
$phone_no = $_SESSION["phone_no"];
$event = $_SESSION["event"];
$attendees = $_SESSION["attendees"];
$extras = $_SESSION["comments"];
$newsletter = $_SESSION["newsletter"];
$hidden="hidden";
$birthdate= $_SESSION["birthdate"];


?>

<div class="mainContainer">
 <h3 style="margin-left: 40%; color:white;">Thankyou for the registration!!</h3>
   <div class="mainContainer"  style="margin-left: 25px;">

		

        <div class="mainContainer">

            <h4 class="mainContainer">
                The details are saved successfully.
            </h4>				
                <h5 for="firstName" class="mainContainer" id="firstName">
                    <?php echo $first_name; ?>
                </h5>

                <h5 for="lastName" class="mainContainer" id="lastName">
                    <?php echo $last_name; ?>
                </h5>

                <h5 class="mainContainer <?php if(empty($address)) echo $hidden; ?>">		
                    Address: <span class="user_details"><?php echo $address; ?></span>
                </h5>

                <h5 class="mainContainer <?php if(empty($phone_no)) echo $hidden; ?>">
                    Phone Number: <span class="user_details"><?php echo $phone_no; ?></span>
                </h5>
				
				<h5 class="mainContainer <?php if(empty($birthdate)) echo $hidden; ?>">
                    Date of Birth: <span class="user_details"><?php echo $birthdate; ?></span>
                </h5>

                <h5 class="mainContainer">
                    Email Address:<span class="user_details"> <?php echo $email_id; ?></span>
                </h5>

                <h5 class="mainContainer">
                    Registered for: <span class="user_details"><?php echo $event; ?> event!</span>

                </h5>

                <h5 class="mainContainer">
                    Number of Attendees: <span class="user_details"><?php echo $attendees; ?></span>
                </h5>

                <h5 class="mainContainer <?php if(empty($extras)) echo $hidden; ?>">
                    Your preferences: <span class="user_details"><?php echo $extras; ?>
                    </span>

                </h5>

                <h5 class="mainContainer">
				<?php if($newsletter == 'set'){
				echo 'Thanks for subscribing to our newsletter!';}
						else{
						echo 'You have chosen not to subscribe to our newsletter.';}?>
				</h5>
				
				<h5 class="mainContainer" id="browserProperties">
				  
				<script>
				document.getElementById("browserProperties").innerHTML = "Browser Application name: " +navigator.appName;
				</script>

				</h5>
						<div style="margin-left: 50%;">
						<button onclick="playVid()" type="button" >Play Video</button>
						<button onclick="pauseVid()" type="button">Pause Video</button><br> 

						<video id="myVideo" width="320" height="176">
						  <source src="img/SanDiegoZoo.mp4" type="video/mp4">
						 
						  Your browser does not support HTML5 video.
						</video>
						
							<script> 
							var vid = document.getElementById("myVideo"); 

							function playVid() { 
							  vid.play(); 
							} 

							function pauseVid() { 
							  vid.pause(); 
							} 
							</script> 
							</div>
									  
        </div>
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
		



</body>

</html>


