
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Booking</title>
    <link rel="stylesheet" href="showing.css">
    
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
                <li><a  href="home.php">Home</a></li>
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


<div class="servis-continer">
<?php
    require_once 'config.php';
session_start();
    // Customer data
    if($_SERVER["REQUEST_METHOD"] == "POST"){
$name = $_SESSION['name'];
$aadhar = $_SESSION['aadhar'];
$email =$_SESSION['Email'];
$contact = $_SESSION['contact'];
$check_in_date = $_SESSION['check_in_date'];
$check_out_date =$_SESSION['check_out_date'];
$room_type = $_SESSION['room_type'];
$room_number =$_SESSION['room_number'];
$number_of_guest = $_SESSION['num_guest'];
$payment =$_POST['finalBill'];
$sql1 = "SELECT * FROM Booking 
        WHERE Email = '$email' 
        AND Contact = '$contact' 
        AND Name = '$name' 
        AND Check_in_date = '$check_in_date' 
        AND Check_out_date = '$check_out_date' 
        AND Room_Number = $room_number";

$result = mysqli_query($link, $sql1);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);
if(!$count)
{
$sql = "INSERT INTO Booking (Name, Aadhar, Email, Contact, Check_in_date, Check_out_date, Room_Type, Room_Number, Number_of_guest, Payment) 
        VALUES ('$name', '$aadhar', '$email', '$contact', '$check_in_date', '$check_out_date', '$room_type', $room_number, $number_of_guest, '$payment')";
    $link->query($sql);
    $sql1 = "SELECT * FROM Booking 
        WHERE Email = '$email' 
        AND Contact = '$contact' 
        AND Name = '$name' 
        AND Check_in_date = '$check_in_date' 
        AND Check_out_date = '$check_out_date' 
        AND Room_Number = $room_number";

$result = mysqli_query($link, $sql1);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
}
$indate=$_SESSION['check_in_date'];
    $outdate=$_SESSION['check_out_date'];
    // Customer data
    $diff_seconds = strtotime($outdate) - strtotime($indate);

// Convert the difference to days (1 day = 86400 seconds)
$diff_days = floor($diff_seconds / (60 * 60 * 24));
    $customer = array(
        "Booking Id" =>$row['Booking_ID'],
        "Name" => $_SESSION['name'],
        "Contact Number" => $contact,
        "AadharCard" => $aadhar,
        "Room Type" => $room_type,
        "Room Number" => $room_number,
        "Check-In-Date" => $check_in_date,
        "Check-Out-Date" => $check_out_date,
        "Nights" => $diff_days,
        "Payment" => $payment
    );

    // Function to print customer data
    function printCustomerData($customer) {
        echo '<table class="customer-table">';
        echo '<tr><th>Field</th><th>Value</th></tr>';
        foreach ($customer as $key => $value) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($key) . '</td>';
            if($key=="Payment")
            {
                echo '<td>' . htmlspecialchars($value) .' INR</td>';
            }
            else
            echo '<td>' . htmlspecialchars($value) . '</td>';
            echo '</tr>';
        }
       
    }
    echo "<div class='servis-card'>";
    
    printCustomerData($customer);

   echo "</div>";
       echo '</table>';
}
else{
    header("location:payment.php");
}
    ?>
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
 