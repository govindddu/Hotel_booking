<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment Refund</title>
  <link rel="stylesheet" href="refund.css">
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
                <li><a href="Showing.php">View Booking</a></li>
              
            </ul>
            <ul class="nav-right">
                <li><a href="index.php">Sign Up</a></li>
                <li><a href="login.php">log out</a></li>
            </ul>
        </nav>
    </header>


 <main>
 <h2>Payment Refund</h2>
  
  
  <?php
    // Initialize $originalAmount using data from POST method
   require_once 'config.php';
    $booking_id=$_POST['booking_id'];
    $originalAmount = isset($_POST['amount']) ? $_POST['amount'] : 0; // Assuming default value is 0 if not provided
    $sql="DELETE FROM `booking` WHERE `Booking_ID`='$booking_id'";
        $link->query($sql);
       
    // Calculate deduction (10%)
    $deduction = $originalAmount * 0.1;
    
    // Calculate refund amount
    $refundAmount = $originalAmount - $deduction;
    
    // Calculate refund date
    $refundDate = date('F j, Y', strtotime('+3 days'));
?>
    
    <div class="container">
        <p>You successfully canceled your booking. Your refund has been processed.</p>
        <p>Refund Details:</p>
        <ul>
            <li><strong>Booking ID:</strong> <?php echo htmlspecialchars($booking_id); ?></li>
            <li><strong>Original Payment Amount:</strong> <?php echo htmlspecialchars($originalAmount); ?> INR</li>
            <li><strong>Deduction (10%):</strong> -<?php echo htmlspecialchars($deduction); ?> INR</li>
            <li><strong>Refund Amount:</strong> <?php echo htmlspecialchars($refundAmount); ?> INR</li>
            <li><strong>Refund Before:</strong> <?php echo htmlspecialchars($refundDate); ?></li>
        </ul>
        <p>If you have any further questions, please contact our support team.</p> 
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
