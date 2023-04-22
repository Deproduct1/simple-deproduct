<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Process the form data here
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  // Send an email to the desired address
  $to = 'mygraceproduct@gmail.com'; // Replace with your desired email address
  $subject = 'New message from website contact form';
  $headers = 'From: ' . $name . ' <' . $email . '>' . "\r\n" .
             'Reply-To: ' . $email . "\r\n" .
             'X-Mailer: PHP/' . phpversion();
  $message = "Name: " . $name . "\r\n" .
             "Email: " . $email . "\r\n" .
             "Phone: " . $subject . "\r\n" .
             "Message: " . $message;
  mail($to, $subject, $message, $headers);

  // Display the success message
  echo "Your details have been submitted successfully. Thank you!";
} else {
  // Redirect to the form page if the script is accessed directly
  header('Location: marketing.html');
  exit();
}
?>
