<?php

$to = "homer@example.com";
$subject = "Your password";
$message = "Hello Homer, thanks for registering. Your password is: springfield";
$from = "ian@example.com";
$headers = "From: $from";

// Send email
mail($to, $subject, $message, $headers);

// Inform the user;
echo"blabla"