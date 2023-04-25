<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Verify the user's reCAPTCHA response
  $secretKey = "YOUR_SECRET_KEY"; // Replace with your reCAPTCHA secret key
  $responseKey = $_POST['g-recaptcha-response'];
  $userIP = $_SERVER['REMOTE_ADDR'];
  $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP";
  $response = file_get_contents($url);
  $response = json_decode($response, true);

  if ($response['success']) {
    // Process the form data here
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Send an email to the desired address
    $to = "https://formsubmit.co/mygraceproduct@gmail.com"; // Replace with your desired email address
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
    // Display an error message if reCAPTCHA verification failed
    echo "reCAPTCHA verification failed. Please try again.";
  }
} else {
  // Redirect to the form page if the script is accessed directly
  header('Location: marketing.html');
  exit();
}
?>
<div class="col-12 col-lg-6 pt-4 pt-lg-0">
  <!-- Contact Box -->
  <div class="contact-box text-center">
    <!-- Contact Form -->
    <form id="contact-form" method="POST" action="res.php">
      <div class="row">
        <div class="col-12">
          <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Name" required="required">
          </div>
          <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email" required="required">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="subject" placeholder="Phone" required="required">
          </div>
        </div>
        <div class="col-12">
          <div class="form-group">
            <textarea class="form-control" name="message" placeholder="Message" required="required"></textarea>
          </div>
        </div>
        <div class="col-12">
          <!-- Add reCAPTCHA to the form -->
          <div class="g-recaptcha" data-sitekey="YOUR_SITE_KEY"></div>
          <button type="submit" class="btn btn-bordered active btn-block mt-3"><span class="text-white pr-3"><i class="fas fa-paper-plane"></i></span>Send Message</button>
        </div>
