<?php
session_start();
if (!(isset($_SESSION['Email']))) {
    unset($_SESSION[$uname]);
    header("Location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Silver Hotel</title>
    <link rel="stylesheet" href="homecss.css">
    <link rel="stylesheet" href="stylel.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400..900&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <nav>
            <ul class="nav-left">
            <img  src="photos/logo.jpg" alt=""  class ="logo">
                <li><a class="active" href="home.php">Home</a></li>
                <li><a href="room_type.php">Book</a></li>
                <li><a href="canceling.php">Cancel Booking</a></li>
                <li><a href="showing.php">View Booking</a></li>
                
            </ul>
            <ul class="nav-right">
                <li><a href="index.php">Sign Up</a></li>
                <li><a href="login.php">log out</a></li>
            </ul>
        </nav>
    </header>


    <main>
    
     <img src="photos/2.jpg" alt="">
     <a href = "room_type.php"><h1 class="reservation">Room Reservation</h1></a>
     
     <h1 class ="facility">Our Facilities</h1>
     <div class="servis-container">
        <div class="servis-card">
        <img src="photos/3.jpg" alt="">
        <h2>Master BedRoom</h2> 
        </div>

        <div class="servis-card">
        <img src="photos/room.jpg" alt="">
        <h2>Large Cafe</h2> 
        </div>
      
        <div class="servis-card">
        <img src="photos/swim.jpg" alt="">
        <h2>Swimming Pool</h2> 
        </div>

        <div class="servis-card">
        <img src="photos/gym.jpg" alt="">
        <h2>Gym</h2> 
        </div>
     </div>


    </main>


    <footer>
		<div class="contact-info">
			<h3>Contact Us</h3>
			<p>Phone: +91-123-456-7890</p>
			<p>Email: info@hotel.com</p>
			<p>Address:  Fertilizer Nagar, Dashrath, Vadodara, Gujarat 391750•096873 44833</p>
		</div>
		<ul>
  <li>
    
		<div class="copyright">
			<p>&copy; 2023 Hotel Management System. All rights reserved.</p>
		</div>
	</footer>
</body>
</html>
