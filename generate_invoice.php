 <?php
session_start();
$Booking_id = $_SESSION['name'].bin2hex(random_bytes(8));
$invoice_date = date("Y-m-d");
$due_date = date("Y-m-d", strtotime("+7 days"));

$hotel_name = "Luxury Inn";
$hotel_address = "123 Hotel Street, City, Country";
$hotel_email = "info@luxuryinn.com";

$customer_name = "John Doe";
$customer_address = "456 Customer Ave, City, Country";
$customer_email = "john.doe@example.com";

$room_description = "Deluxe Room (2 Nights)";
$room_price = "$400";

$total_price = "$400";

// Load the template content
$template = file_get_contents("invoice_template.html");

// Replace placeholders with actual data
$placeholders = [
    "<?php echo \$Booking Id; ?>" => $Booking_id,
    "<?php echo \$invoice_date; ?>" => $invoice_date,
    "<?php echo \$due_date; ?>" => $due_date,
    "<?php echo \$hotel_name; ?>" => $hotel_name,
    "<?php echo \$hotel_address; ?>" => $hotel_address,
    "<?php echo \$hotel_email; ?>" => $hotel_email,
    "<?php echo \$customer_name; ?>" => $customer_name,
    "<?php echo \$customer_address; ?>" => $customer_address,
    "<?php echo \$customer_email; ?>" => $customer_email,
    "<?php echo \$room_description; ?>" => $room_description,
    "<?php echo \$room_price; ?>" => $room_price,
    "<?php echo \$total_price; ?>" => $total_price,
];

foreach ($placeholders as $placeholder => $value) {
    $template = str_replace($placeholder, $value, $template);
}

// Output the invoice
echo $template;
?>
