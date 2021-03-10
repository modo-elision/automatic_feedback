<?php
/*use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once 'control/main_control.php';
$control=new Index();
echo "email.php";
print_r($_SESSION);	
if(!empty($_SESSION['type']))
{
	if($_SESSION['type']=='admin')
	{
		echo "<pre>";
		if(!empty($_POST))
		print_r($_POST);	
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


		function requireToVar($file){
			    ob_start();
			    $username=$_POST['username'];
				$companyname=$_POST['companyname'];
				$jobname=$_POST['jobname'];
				$template=$_POST['template'];
				$free_comment=$_POST['free_comment'];
			    require($file);
			    return ob_get_clean();
			}
		$email_temp=requireToVar('view/email-templates.html');

		echo $email_temp;

		$to_email_address=$_POST['to_add'];
		$to_name=$_POST['to_name'];
		$message=$email_temp;
		
		php_gmail_mailer($to_email_address,$to_name,$message);
	}
}*/
?>