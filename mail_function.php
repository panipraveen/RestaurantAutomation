<?php
	require("config.php");
?>
<html>
	<head>
	
	</head>
</html>
<?php
	function sendOTP($email_id,$otp,$name) {
		/*require_once("C:/xampp/htdocs/Php_Composer/vendor/phpmailer/phpmailer/src/PHPMailer.php");
		require("C:/xampp/htdocs/Php_Composer/vendor/autoload.php");
		require_once("C:/xampp/htdocs/Php_Composer/vendor/phpmailer/phpmailer/src/SMTP.php");
		//require_once('phpmailer/PHPMailerAutoload.php');


		$message_body = "One Time Password for Restaurant login is:<br><br><b>".$otp."<b><br><br>This is a system generated email please don't reply";
		$mail = new PHPMailer\PHPMailer\PHPMailer();
		
			//$mail->AddReplyTo('panipraveen845@gmail.com','Pani Praveen');
			$mail->isSMTP();
			$mail->Host = 'smtp.gmail.com';
			$mail->Port = 587;
			$mail->SMTPSecure = 'tls';
			$mail->SMTPAuth = true;
			$mail->Username = 'panipraveen845@gmail';
			$mail->Password = 'wilfred843976193@';
			$mail->SetFrom('panipraveen845@gmail.com','Pani Praveen');
			$mail->AddAddress($email_id);
			$mail->Subject = "Recovery OTP to Login";
			$mail->MsgHTML($message_body);
			$result = $mail->Send();
			if(!$result){
				echo "Mailer Error:".$mail->ErrorInfo;
			}
			else{
				return $result;
			}*/
			
			$to_email = $email_id;
			$subject = 'Your Recovery Otp is';
			$message = 'This mail is sent using the PHP mail function. Your Username is: "'.$name.'" and  Your One time password is: '.$otp.'. please do not reply to that message';
			$headers = 'From: panipraveen845@restaura';
			$result = mail($to_email,$subject,$message);
			if(!$result){
				//echo "Mailer Error:---".$result->ErrorInfo;
				echo $result;
			}
			else{
				echo "Mail Sent";
				return $result;
			}
	}
	
	
	
	
	
	function deleted_order($id_email){
		$to_email = $id_email;
		$subject = 'Order Deleted';
		$message = 'We are SORRY to inform you that your ORDER has been Cancelled by our ADMIN';
		$headers = 'From: panipraveen845@restaura';
		$result = mail($to_email,$subject,$message);
		if(!$result){
			//echo "Mailer Error:---".$result->ErrorInfo;
			echo $result;
		}
		else{
			echo "Mail Sent";
			return $result;
		}
	}
?>