

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cancel Room</title>
  <link rel="stylesheet" href="cancel.css">
  <link rel="stylesheet" href="stylel.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>
<body>
<header>
        <nav>
            <ul class="nav-left">
                <img src="photos/logo.jpg" alt="" class="logo">
                <li><a  href="home.php">Home</a></li>
                <li><a  href="room_type.php">Book</a></li>
                <li><a class="active" href="canceling.php">Cancel Booking</a></li>
                <li><a href="showing.php">View Booking</a></li>

            </ul>
            <ul class="nav-right">
                <li><a href="index.php">Sign Up</a></li>
                <li><a href="login.php">log out</a></li>
            </ul>
        </nav>
    </header>
  

<main>

<?php
    // Assume $bookingData is an array containing booking information
    session_start();
    if (!(isset($_SESSION['Email']))) {
        unset($_SESSION[$uname]);
        header("Location:login.php");
    }
    require_once 'config.php';
    $email=$_SESSION['Email'];
    $sql1 = "SELECT * FROM Booking WHERE Email = '$email'";
        $today= time();
      
    $result = mysqli_query($link, $sql1);

    echo "<div class='servis-container'>";
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
{
    $date=$row['Check_out_date'];
    $outdate = strtotime($date);
    if($today<$outdate)
    {
      echo "<div class='servis-card'>";
      echo '<p><strong>Booking ID:</strong> ' . $row['Booking_ID'] . '</p>';
      echo '<p><strong>Room Type:</strong> ' . $row['Room_Type'] . '</p>';
      echo '<p><strong>Room Number:</strong> ' . $row['Room_Number'] . '</p>';
      echo '<p><strong>Payment:</strong> ' . $row['Payment'] . '</p>';
      echo '<form action="refund.php" method="post">';
      echo '<input type="hidden" name="booking_id" value='. $row['Booking_ID'] .'>';
      echo '<input type="hidden" name="amount" value='. $row['Payment'] .'>';
      echo '<button class="login-btn"type="submit">Cancel Booking</button>';
      echo '</form>';
      echo '</div>';
    }
}
echo "</div>";
  ?>




</main>



<footer>
        <div class="contact-info">
            <h3>Contact Us</h3>
            <p>Phone: +91-123-456-7890</p>
            <p>Email: info@hotel.com</p>
            <p>Address: Fertilizer Nagar, Dashrath, Vadodara, Gujarat 391750•096873 44833</p>
        </div>
        <ul>
            <li>

                <div class="copyright">
                    <p>&copy; 2023 Hotel Management System. All rights reserved.</p>
                </div>
    </footer>


</body>
</html>