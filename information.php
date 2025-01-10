<?php
require_once 'config.php';
session_start();
$errors=[];
$input=[];
 if($_SERVER["REQUEST_METHOD"] == "POST")
 {
   unset($errors['name']);
   unset($errors['aadhar']);
   unset($errors['contact']);
   unset($errors['num_guests']);
   unset($errors['check_in_date']);
   unset($errors['check_out_date']);
   unset($errors['num_guests']);
   $name=$_POST['name'];
   $contact=$_POST['contact'];
   $num_guests=$_POST['num_guests'];
   $aadhar=$_POST['aadhar'];
   $check_in_date=$_POST['check_in_date'];
   $check_out_date=$_POST['check_out_date'];

   $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$inputs['name'] = $name;

if ($name) {
    $name = trim($name);
    if ($name === '') {
        $errors['name'] = "Please enter a name";
    }
} else {
    $errors['name'] = "Please enter a name";
}

   $pattern = '/^\d{12}$/';
$inputs['aadhar'] = $_POST['aadhar'];
if (!empty(trim($_POST["aadhar"])) && strlen(trim($_POST["aadhar"])) !== 12) {
    $errors['aadhar'] = "Aadhar card number must be 12 digits long.";
}
elseif($aadhar==='')
{
    $errors['aadhar']="Please Enter you Aadhar card number";
}
elseif(!preg_match($pattern, trim($_POST["aadhar"])))
{
    $errors['aadhar']="You Enter a wrong Aadharcard Number";
}
else {
    $adhar = trim($_POST["aadhar"]);
}
$pattern = '/^\d{10}$/';

$inputs['contact'] = $_POST['contact'];
if (!empty(trim($_POST["contact"])) && strlen(trim($_POST["contact"])) !== 10) {
    $errors['contact'] = "contact number must be 10 digits long.";
}
elseif($contact==='')
{
    $errors['contact']="Please enter contact number";
}
elseif(!preg_match($pattern, trim($_POST["contact"])))
{
    $errors['contact']="You enter wrong number";
}
else {
    $contact = trim($_POST["contact"]);
}
$inputs['num_guests']=$num_guests;
 if($num_guests<1 or $num_guests>2)
 {
    $errors['num_guests']="Please enter a appropiate number min 1 or max 2";
 }  
 $today= time();
 $indate = strtotime($check_in_date);
 $outdate = strtotime($check_out_date);
 $inputs['check_in_date']=$check_in_date;
 if ($indate<=$today) {
    $errors['check_in_date'] = "Please enter an appropriate check-in date";
}

// Check if the check-out date is later than today, and not the same as today, and later than the check-in date
if ( $outdate <= $today || $outdate <= $indate) {
    $errors['check_out_date'] = "Please enter an appropriate check-out date";
}


// Assuming $inputs['check_out_date'] needs to be set
$inputs['check_out_date'] = $check_out_date;
 if(count($errors)===0)
 {

$_SESSION['name'] = $_POST['name'];
$_SESSION['contact'] = $_POST['contact'];
$_SESSION['num_guests'] = $_POST['num_guests'];
$_SESSION['aadhar'] = $_POST['aadhar'];
$_SESSION['check_in_date'] = $_POST['check_in_date'];
$_SESSION['check_out_date'] = $_POST['check_out_date'];
$_SESSION['num_guest']= $num_guests;
    header("Location:select_room.php");


 }}


?>
<!DOCTYPE html>
<html>
<head>
    <title>Guest Information</title>
    <link rel="stylesheet" href="information.css">
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

<div class="container">
<div class="login-form">
    <h2>Provide Guest Information</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
    <div class="input-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" placeholder="Full Name" value="<?php echo $inputs['name'] ?? '' ?>" required><br>
        <small><?php echo $errors['name'] ?? '' ?></small><br>
        </div>
         
        <div class="input-group">
        <label for="contact">Contact Number:</label>
        <input type="text" id="contact" name="contact" placeholder="Contact Number" value="<?php echo $inputs['contact'] ?? '' ?>" required><br>
        <small><?php echo $errors['contact'] ?? '' ?></small><br>
        </div>
 
        <div class="input-group">
        <label for="num_guests">Number of Guests:</label>
        <input type="number" id="num_guests" name="num_guests" placeholder="(Min 1)(Max 2)" value="<?php echo $inputs['num_guests'] ?? '' ?>" required><br>
        <small><?php echo $errors['num_guests'] ?? '' ?></small><br>
        </div>

        <div class="input-group">
        <label for="aadhar">Aadhar Card Number:</label>
        <input type="text" id="aadhar" name="aadhar" placeholder="Aadhar Card Number" value="<?php echo $inputs['aadhar'] ?? '' ?>" required><br>
        <small><?php echo $errors['aadhar'] ?? '' ?></small><br>
        </div>

        <div class="input-group">
        <label for="check_in_date">Check-in Date:</label>
        <input type="date" id="check_in_date" name="check_in_date" value="<?php echo $inputs['check_in_date'] ?? '' ?>" required><br>
        <small><?php echo $errors['check_in_date'] ?? '' ?></small><br>
        </div>


        <div class="input-group">
        <label for="check_out_date">Check-out Date:</label>
        <input type="date" id="check_out_date" name="check_out_date" value="<?php echo $inputs['check_out_date'] ?? '' ?>" required><br>
        <small><?php echo $errors['check_out_date'] ?? '' ?></small><br>
        </div>

        <button class="login-btn" type="submit">Submit</button>
    </form>
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


