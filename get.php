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
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" placeholder="Full Name" value="<?php echo $inputs['name'] ?? '' ?>"><br>
                <small><?php echo $errors['name'] ?? '' ?></small>
            </div>
            <div class="input-group">
                <label for="age">Age:</label>
                <input type="number" name="age" id="age" placeholder="Your age" value="<?php echo $inputs['age'] ?? '' ?>"><br>
                <small><?php echo $errors['age'] ?? '' ?></small>
            </div>
            <div class="input-group">
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" placeholder="Email Address" value="<?php echo $inputs['email'] ?? '' ?>"><br>
                <small ><?php echo $errors['email'] ?? '' ?></small>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" placeholder="Password (8 characters, 1 letter, 1 number)" value="<?php echo $inputs['password'] ?? '' ?>"><br>
                <small><?php echo $errors['password'] ?? '' ?></small>
            </div>
            <div class="input-group">
                <label for="a">Contact Number:</label>
                <input type="text" name="contact" id="contact" placeholder="Contact Number" value="<?php echo $inputs['contact'] ?? '' ?>"><br>
                <small><?php echo $errors['contact'] ?? '' ?></small>
            </div>
            
            <button type="submit" class="login-btn">Sign Up</button>
            If you alredy registrate <a href="login.php" class="login-btn" style="text-decoration: none; background-color:#1e1e2f">Log In</a>
</form>
        </div>
    </div>
    
</body>
</html>
