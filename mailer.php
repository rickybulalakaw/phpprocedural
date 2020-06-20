<?php 
// defined('BASEPATH') OR exit('No direct script access allowed');
require_once(dirname(__FILE__).'/PHPMailer-master/src/Exception.php');
require_once(dirname(__FILE__).'/PHPMailer-master/src/PHPMailer.php');
require_once(dirname(__FILE__).'/PHPMailer-master/src/SMTP.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mailer
{
	/**
	 * Get an instance of CodeIgniter
	 *
	 * @access	protected
	 * @return	void
	 */
	protected function ci()
	{
		return get_instance();
	}


	public function send($subject,$message,$sendto = array(),$ccto = array(), $bccto = array()){

		echo "test here";

		$mail = new  PHPMailer(true);

		try {
		    //Server settings
		    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
		    $mail->isSMTP();                                            // Send using SMTP
		    $mail->Host       = 'smtp.gmail.com';                   // Set the SMTP server to send through
		    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
		    $mail->Username   = 'bayambangsystems@gmail.com';                   // SMTP username
		    $mail->Password   = '&hnxyzttdtlbxgjor';                               		// SMTP password
		    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
		    $mail->Port       = 587;                                    // TCP port to connect to

		    //Recipients
		    $mail->setFrom('bayambangsystems@gmail.com', 'LGU-Bayambang Systems Mailer (DO NOT REPLY)');
		    // $mail->addAddress('james.angub@pms.gov.ph', 'James Angub');     // Add a recipient sample
		    foreach($sendto as $s){
		    	$mail->addAddress($s['email'], $s['name']);     // Add a recipient
		    }

		    foreach($ccto as $cc){
		    	$mail->addCC($cc['email'], $cc['name']);     // Add a recipient
		    }

		     foreach($bccto as $bc){
		    	$mail->addCC($bc['email'], $bc['name']);     // Add a recipient
		    }
		    
		    // $mail->addAddress('ellen@example.com');               // Name is optional
		    // $mail->addReplyTo('info@example.com', 'Information');
		    // $mail->addCC('cc@example.com');
		    // $mail->addBCC('bcc@example.com');

		    // Attachments
		    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

		    // Content
		    $mail->isHTML(true);                                  // Set email format to HTML
		    $mail->Subject = $subject;
			$mail->Body    = $message;
			
		    $mail->AltBody = strip_tags($message);

		    $mail->send();
		    echo 'Message has been sent';
		} catch (Exception $e) {
		    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
	}

}