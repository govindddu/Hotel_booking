
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
<link rel="stylesheet" href="payment.css">
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
   
</head>
<body>
    <?php
    session_start();
    $indate=$_SESSION['check_in_date'];
    $outdate=$_SESSION['check_out_date'];
    // Customer data
    $diff_seconds = strtotime($outdate) - strtotime($indate);

// Convert the difference to days (1 day = 86400 seconds)
$diff_days = floor($diff_seconds / (60 * 60 * 24));

    $customer = array(
        "Name" => $_SESSION['name'],
        "Contact Number" => $_SESSION['contact'],
        "Total Nights" => $diff_days,
        "Per Night Price" => $_SESSION['price'],
    );

    // Calculate initial bill
    $initialBill = (int)$customer["Total Nights"] * (int)$customer["Per Night Price"];
    // Calculate GST (2%)
    $gst = $initialBill * 0.02;
    // Calculate final bill including GST
    $finalBill = $initialBill + $gst;
    ?>

    <div class="invoice-container">
        
        <div class="customer-details">
        <h2>Payment Invoice</h2>
            <div>Name: <?php echo htmlspecialchars($customer["Name"]); ?></div>
            <div>Contact Number: <?php echo htmlspecialchars($customer["Contact Number"]); ?></div>
        </div>
        <table class="invoice-table">
            <tr>
                <th>Field</th>
                <th>Details</th>
            </tr>
            <tr>
                <td>Total Nights</td>
                <td><?php echo htmlspecialchars($customer["Total Nights"]); ?></td>
            </tr>
            <tr>
                <td>Per Night Price</td>
                <td><?php echo htmlspecialchars($customer["Per Night Price"]); ?> INR</td>
            </tr>
            <tr>
                <td>Initial Bill</td>
                <td><?php echo htmlspecialchars($initialBill); ?> INR</td>
            </tr>
            <tr>
                <td>GST (2%)</td>
                <td><?php echo htmlspecialchars($gst); ?> INR</td>
            </tr>
        </table>
        <div class="invoice-total">
            Final Bill: <?php echo htmlspecialchars($finalBill); ?> INR
        </div>
        <div class="payment-button">
            <form action="viewbooking.php" method="post">
                <input type="hidden" name="finalBill" value="<?php echo htmlspecialchars($finalBill); ?>">
                <button type="submit">Pay Now</button>
            </form>
        </div>
    </div>
</body>
</html>

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
