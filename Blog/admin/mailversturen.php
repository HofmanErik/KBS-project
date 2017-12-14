<?php

$to = 'hofman.erik@outlook.com';
$from = "vindbaarin2212@gmail.com";
$subject = "Your password";
$message = "Hello Homer, thanks for registering. Your password is: springfield";
$headers = "From: $from";

// Send email
mail("hofman.erik@outlook.com", "subject", "message", $headers);

// Inform the user
echo "Thanks for registering! We have just sent you an email with your password.";
?>