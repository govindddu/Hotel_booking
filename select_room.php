<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Room</title>
    <link rel="stylesheet" href="select_room.css">
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

        <?php
        session_start();
        require_once 'config.php';
        $indate = $_SESSION['check_in_date'];
        $outdate = $_SESSION['check_out_date'];
        $room_type = $_SESSION['room_type'];
        $sql1 = "SELECT * FROM booking WHERE ((Check_in_date>='$indate' AND Check_out_date<='$outdate') OR (Check_in_date<='$indate' AND Check_out_date>='$indate') OR (Check_in_date<='$outdate' AND Check_out_date>='$outdate'))";
        $result = mysqli_query($link, $sql1);
        // $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        // $count = mysqli_num_rows($result);
        $rooms = array();
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $rooms[] = $row["Room_Number"];
            }
        }

        $sql = "SELECT Room_id,Status,Room_type,Price FROM room WHERE Room_type = '$room_type'AND Status='Available' ";
        $result = mysqli_query($link, $sql);
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $_SESSION['room_number'] = $_POST['room_number'];

            header("location:payment.php");
        }
      echo "<div class='servis-container'>";
        if (mysqli_num_rows($result) > 0) {
            
            while ($row = mysqli_fetch_assoc($result)) {
                $_SESSION['price'] = $row["Price"];
                if (in_array($row["Room_id"], $rooms)) {
                    // The integer variable exists in the array
                    continue;
                }
               
                echo "<form action='' method='POST'>";
                echo "<div class='servis-card'>";
                echo "<button class='servis-card' type='submit' name='room_number' value='" . $row["Room_id"] . "'>";
                echo "<h2>Room " . $row["Room_id"] . "</h2>";
                echo "<p>Price: " . $row["Price"] . "</p>";
                echo "<p>Status: " . $row["Status"] . "</p>";
                echo "<p>Room Type: " . $row["Room_type"] . "</p>";
                echo "</button>";
                echo "</form>";
                echo "</div>";
            }
        } else {
            echo "No rooms found";
        }
        echo "</div>";
        // Close the database connection
        mysqli_close($link);
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