<?php
echo "<pre>";
print_r($_SERVER['PHP_SELF']);
if(!empty($_POST))
print_r($_POST);
if(!empty($_GET))
print_r($_GET);
if(!empty($_SESSION))
print_r($_SESSION);
echo "</pre>";
phpinfo();

/*
$username="student1";
$companyname="bmw";
$jobname="automotive engg";
//$template="reject";
//$template="next_round";
$template="accept";

$free_comment="Slasjdlasdjwaijkscdl
ksadlasdjalsdjlasjd
asda;lsdka;dat
asdasdasd
sadasd";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
 function php_gmail_mailer($to_email,$to_name,$body)
{
	

	require_once __DIR__ . '/vendor/phpmailer/src/Exception.php';
	require_once __DIR__ . '/vendor/phpmailer/src/PHPMailer.php';
	require_once __DIR__ . '/vendor/phpmailer/src/SMTP.php';

	// passing true in constructor enables exceptions in PHPMailer
	$mail = new PHPMailer(true);

	try {
	    // Server settings
	    $mail->SMTPDebug = SMTP::DEBUG_SERVER; // for detailed debug output
	    $mail->isSMTP();
	    $mail->Host = 'smtp.gmail.com';
	    $mail->SMTPAuth = true;
	    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
	    $mail->Port = 587;

	    $mail->Username = 'aru.happy.tech@gmail.com'; // YOUR gmail email
	    $mail->Password = 'Aru@12345'; // YOUR gmail password

	    // Sender and recipient settings
	    $mail->setFrom('aru.happy.tech@gmail.com', 'Happy Tech');
	    $mail->addAddress($to_email, $to_name);
	    $mail->addReplyTo('aru.happy.tech@gmail.com', 'Happy Tech'); // to set the reply to

	    // Setting the email content
	    $mail->IsHTML(true);
	    $mail->Subject = "Happy Tech Mail Responce";
	    $mail->Body = $body;
	    $mail->AltBody = 'automatic-system-generated-email';

	    $mail->send();
	    echo "Email message sent.";
	} catch (Exception $e) {
	    echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
	}
}


//$email_temp=require 'view/email-templates.html';
function requireToVar($file){
	    ob_start();
	    $username="student1";
		$companyname="bmw";
		$jobname="automotive engg";
		//$template="reject";
		$template="next_round";
		//$template="accept";

		$free_comment="Slasjdlasdjwaijkscdl
		ksadlasdjalsdjlasjd
		asda;lsdka;dat
		asdasdasd
		sadasd";
	    require($file);
	    return ob_get_clean();
	}
$email_temp=requireToVar('view/email-templates.html');

//echo $email_temp;

$to_email_address="xyz@gmail.com";
$to_name='xyz';
$subject="automaic_feedback";
$message=$email_temp;
//$from = "aru.happy.tech@gmail.com";//password:Aru@12345

php_gmail_mailer($to_email_address,$to_name,$message);

*/
?>