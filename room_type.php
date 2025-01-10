<?php
require_once 'config.php';
session_start();
  $error=[];
  if (!(isset($_SESSION['Email']))) {
    unset($_SESSION[$uname]);
    header("Location:login.php");
}
  if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $_SESSION['room_type']=$_POST['room_preference'];
    header("Location:information.php"); 
}

  ?>
<!DOCTYPE html>
<html>
<head>
    <title>Room Preference</title>
    <link rel="stylesheet" href="stylel.css">
    <link rel="stylesheet" href="room_type.css">
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
                <li><a href="home.php">Home</a></li>
                <li><a class="active" href="room_type.php">Book</a></li>
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
    <div class="container">
        <div class="card">
          
            <img src="photos/delux.jpg" alt="Deluxe Room" class="card-img">
            <div class="card-title">Deluxe Room</div>
            <div class="card-rating">★★★★☆</div>
            <div class="card-price">8000 INR</div>
            <form action="" method="post">
              <input type="hidden" name="room_preference" value="DELUXE">
            <input type="submit" class="card-button"  value="Book Now">
            </form>
        </div>
        <div class="card">
            <img src="photos/luxery.jpg" alt="Luxury Room" class="card-img">
            <div class="card-title">Luxury Room</div>
            <div class="card-rating">★★★★☆</div>
            <div class="card-price">5000 INR</div>
            <form action="" method="post">
            <input type="hidden" name="room_preference" value="LUXURY">
            <input type="submit" class="card-button"  value="Book Now">
            </form>
        </div>
        
        
    </div>
    </main>
    <!-- <form method="post" action="">
        <label for="room_preference">Which type of room would you like to stay in our hotel?</label><br>
        <button type="submit" name="room_preference" value="LUXURY ROOM">Luxury Rooms</button>
        <button type="submit" name="room_preference" value="AC ROOMS">AC Rooms</button>
        <button type="submit" name="room_preference" value="NON-AC ROOM">Non-AC Rooms</button>
    </form> -->


    
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
