<?php
/**
 * Requires the "PHP Email Form" library
 * The "PHP Email Form" library is available only in the pro version of the template
 * The library should be uploaded to: vendor/php-email-form/php-email-form.php
 * For more info and help: https://bootstrapmade.com/php-email-form/
 */

// Replace contact@example.com with your real receiving email address
$receiving_email_address = 'solankipranay34@gmail.com';

// Check if the PHP Email Form library exists
if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
    include($php_email_form);
} else {
    die('Unable to load the "PHP Email Form" Library!');
}

// Create a new instance of the PHP_Email_Form class
$contact = new PHP_Email_Form;
$contact->ajax = true;

// Set the recipient email address and email details
$contact->to = $receiving_email_address;
$contact->from_name = isset($_POST['name']) ? $_POST['name'] : 'Unknown';
$contact->from_email = isset($_POST['email']) ? $_POST['email'] : 'no-reply@example.com';
$contact->subject = isset($_POST['subject']) ? $_POST['subject'] : 'No Subject';

// Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
/*
$contact->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
);
*/

// Add messages to the email
$contact->add_message($contact->from_name, 'From');
$contact->add_message($contact->from_email, 'Email');
$contact->add_message(isset($_POST['message']) ? $_POST['message'] : 'No message provided', 'Message', 10);

// Send the email and echo the result
echo $contact->send();
?>