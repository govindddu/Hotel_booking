<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment Refund</title>
</head>
<body>
  <h2>Payment Refund</h2>
  
  <div>
  <?php
    // Initialize $originalAmount using data from POST method
   require_once 'config.php';
    if($_SERVER["REQUEST_METHOD"] == "GET")
    {
        $booking_id=$_GET['booking_id'];
        $sql="DELETE FROM `booking` WHERE `Booking_ID`='$booking_id'";
        $link->query($sql);
        header("Location:home.php");
    }
    $booking_id=$_POST['booking_id'];
    $originalAmount = isset($_POST['amount']) ? $_POST['amount'] : 0; // Assuming default value is 0 if not provided
    
    // Calculate deduction (10%)
    $deduction = $originalAmount * 0.1;
    
    // Calculate refund amount
    $refundAmount = $originalAmount - $deduction;
    
    // Calculate refund date
    $refundDate = date('F j, Y', strtotime('+3 days'));
?>
    
    <p>You Successfully canceling your booking. Your refund has been processed.</p>
    <p>Refund Details:</p>
    <ul>
      <li><strong>Booking ID:</strong> <?php echo $booking_id;?></li>
      <li><strong>Original Payment Amount:</strong> <?php echo $originalAmount; ?> INR</li>
      <li><strong>Deduction (10%):</strong> -<?php echo $deduction; ?> INR</li>
      <li><strong>Refund Amount:</strong> <?php echo $refundAmount; ?> INR</li>
      <li><strong>Refund Before:</strong> <?php echo $refundDate; ?> INR</li>
    </ul>
        
    <p>If you have any further questions, please contact our support team.</p>
  </div>
  <form action="" method="get">
  <input type="hidden" name="booking_id" value=<?php echo $booking_id;?>>
        <button type="submit">Refund Money</button>
    </form>
</body>
</html>