<?php

require_once "PHPMailerAutoload.php";

class automail {


public function sendMail($data){

	$d = $data['dusun'];
	$m = $data['malay'];
	$n = $data['added_by'];
		

//PHPMailer Object
$mail = new PHPMailer;

//From email address and name
$mail->From = "info@kamusdusun.16mb.com";
$mail->FromName = "KAMUS[KD]";

//To address and name
$mail->addAddress("froxtreldoren@gmail.com", "Recepient Name");
$mail->addAddress("froxtreldoren@gmail.com"); //Recipient name is optional

//Address to which recipient will reply
$mail->addReplyTo("froxtreldoren@gmail.com", "Reply");

//CC and BCC
$mail->addCC("cc@example.com");
$mail->addBCC("bcc@example.com");

//Send HTML or Plain Text email
$mail->isHTML(true);

$mail->Subject = "New term added on KAMUS[kdp]";
$mail->Body = 

"

<i>KAMUS KDP</i>

<table width='100%' border='1'>

<tr>
	<td>DUSUN:</td>
	<td>$d</td>
</tr>

<tr>
	<td>MALAY:</td>
	<td>$m</td>
</tr>

<tr>
	<td>USERNAME:</td>
	<td>$n</td>
</tr>

</table>

";



$mail->AltBody = "This is the plain text version of the email content";

if(!$mail->send()) {

    echo "Mailer Error: " . $mail->ErrorInfo;


} else {

    // echo success message here
}

}	
}

?> 