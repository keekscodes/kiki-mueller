
<?php
// If you are using Composer
require 'vendor/autoload.php';

// If you are not using Composer (recommended)
// require("path/to/sendgrid-php/sendgrid-php.php");

{
	"personalizations": [{
		"to": [{
			"email": "kiki@kikimueller.com.com"
		}],
		"substitutions": {
			"%fname%": "recipient",
			"%CustomerID%": "CUSTOMER ID GOES HERE"
		},
		"subject": "YOUR SUBJECT LINE GOES HERE"
	}]
}

$from = new SendGrid\Email(null, "test@example.com");
$subject = "Hello World from the SendGrid PHP Library!";
$to = new SendGrid\Email(null, "test@example.com");
$content = new SendGrid\Content("text/plain", "Hello, Email!");
$mail = new SendGrid\Mail($from, $subject, $to, $content);

$apiKey = getenv('SENDGRID_API_KEY');
$sg = new \SendGrid($apiKey);

$response = $sg->client->mail()->send()->post($mail);
echo $response->statusCode();
echo $response->headers();
echo $response->body();

