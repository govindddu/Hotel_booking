<?php
require_once 'config.php';
session_start();
const NAME_REQUIRED = 'Please enter your name';
const EMAIL_REQUIRED = 'Please enter your email';
const AGE_REQUIRED = 'Please enter your age';
const PASSWORD_REQUIRED = 'Please enter your password';
const CONTACT_REQUIRED = 'Please enter your contact number';
const EMAIL_INVALID = 'Please enter a valid email';
const PASSWORD_INVALID = 'Please enter a valid password';
const CONTACT_INVALID = 'Please enter a valid contact number';
const AGE_INVALID = 'Please enter a valid age';


// sanitize and validate name
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$inputs['name'] = $name;

if ($name) {
    $name = trim($name);
    if ($name === '') {
        $errors['name'] = NAME_REQUIRED;
    }
} else {
    $errors['name'] = NAME_REQUIRED;
}


// sanitize & validate email
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$inputs['email'] = $email;
if ($email) {
    // validate email
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    if ($email === false) {
        $errors['email'] = EMAIL_INVALID;
    }
} else {
    $errors['email'] = EMAIL_REQUIRED;
}
$sql1="SELECT * FROM users WHERE Email = '$email'";
$result = mysqli_query($link, $sql1);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);
if($count >0)
{
$errors['email']="This E-mail address alredy registrate";
}
$_SESSION['Email']=$email;
$age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_NUMBER_INT);

$inputs['age'] =$age;
if ($age) {
    // validate email
    $age = filter_var($age, FILTER_VALIDATE_INT);
    if ($age === false) {
        $errors['age'] = AGE_INVALID;
    }
    if($age<18)
    {
        $errors['age']=" your are not aligible for registration ";
    }

} else {
    $errors['age'] = AGE_REQUIRED;
}
$regex = '/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,20}$/';
$password=$_POST['password'];
$inputs['password']=$_POST['password'];
if (empty(trim($_POST["password"]))) {
    $errors['password'] = PASSWORD_REQUIRED;
} elseif (strlen(trim($_POST["password"])) < 8) {
    $errors['password'] = "Password must be at least 8 characters long.";
} elseif (!preg_match($regex, trim($_POST["password"]))) {
    $errors['password'] = "Password must contain at least one letter and one digit, with no spaces.";
} else {
    $password = trim($_POST["password"]);
}
// $pattern = '/^\d{12}$/';
// $adhar=$_POST['adhar'];
// $inputs['adhar'] = $_POST['adhar'];
// if (!empty(trim($_POST["adhar"])) && strlen(trim($_POST["adhar"])) !== 12) {
//     $errors['adhar'] = "Aadhar card number must be 12 digits long.";
// }
// elseif($adhar==='')
// {
//     $errors['adhar']=ADHAR_REQUIRED;
// }
// elseif(!preg_match($pattern, trim($_POST["adhar"])))
// {
//     $errors['adhar']=ADHAR_INVALID;
// }
// else {
//     $adhar = trim($_POST["adhar"]);
// }
$pattern = '/^\d{10}$/';
$contact=$_POST['contact'];
$inputs['contact'] = $_POST['contact'];
if (!empty(trim($_POST["contact"])) && strlen(trim($_POST["contact"])) !== 10) {
    $errors['contact'] = "contact number must be 10 digits long.";
}
elseif($contact==='')
{
    $errors['contact']=CONTACT_REQUIRED;
}
elseif(!preg_match($pattern, trim($_POST["contact"])))
{
    $errors['contact']=CONTACT_INVALID;
}
else {
    $contact = trim($_POST["contact"]);
}
if(count($errors)===0)
{
   
    
    $sql = "INSERT INTO users (Name, Age, Email, Password, Contact) VALUES ('$name', $age, '$email', '$password', '$contact')";
    $link->query($sql);
    header("Location:home.php");

}
?>

<?php if (count($errors) === 0) : ?>
    <section>
        <h2>
            Thanks <?php echo $name ?> You register secussefull..
        </h2>
      
    </section>

<?php endif ?>