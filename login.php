<?php
require_once 'config.php';
session_start();
if ((isset($_SESSION['Email']))) {
    unset($_SESSION['Email']);
}
  $error=[];
  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
     $email = $_POST['email']; 
     $password = $_POST['password'];
     $_SESSION['email']=$email;
     $sql = "SELECT * FROM Users WHERE Email = '$email'";
     $result = $link->query($sql);
     
     if ($result->num_rows > 0) {
        
         $row = $result->fetch_assoc();
         if ($password==$row['Password']) {
            $_SESSION['Email']=$email;
            echo "Login successful!";
            header("Location:home.php");
         } else {
             // Passwords don't match
            unset($error['email']);

             $error['password']="Password is incorrect";
         }
     } else {
         // User not found
            unset($error['password']);
            $error['email']="user not found";
     } 
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Holiday Inn - Sign Up</title>
    <link rel="stylesheet" href="get.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="illustration">
            <img src="photos/7.jpg" alt="Holiday Inn Illustration">
        </div>
        <div class="login-form">
            <div class="logo">
                <img src="photos/logo.jpg" alt="Holiday Inn Logo">
             
            </div>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <h1 class="welcome">Welcome To Silver Hotel</h1>
            
         
            
            <div class="input-group">
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" placeholder="Email Address" value="<?php echo $inputs['email'] ?? '' ?>"><br>
                <small ><?php echo $errors['email'] ?? '' ?></small>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" placeholder="Password (8 characters, 1 letter, 1 number)" value="<?php echo $inputs['password'] ?? '' ?>"><br>
                <small><?php echo $error['password'] ?? '' ?></small>
            </div>
            
            
            <button type="submit" class="login-btn">Login</button>
            Don't have an account <a href="index.php" class="login-btn" style="text-decoration: none; background-color:#1e1e2f">Sign Up</a>
</form>
        </div>
    </div>
    
</body>
</html>
