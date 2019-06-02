<?php
require 'PHPMailer/PHPMailerAutoload.php';

function sendMail($values)
{
	session_start();
	$user = $_SESSION['username'];
	include 'config.php';
	
	$mail = new PHPMailer(); // create a new object
	$mail->IsSMTP(); // enable SMTP
	$mail->SMTPAuth = true; // authentication enabled
	$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 465; // or 587
	$mail->IsHTML(true);
	//$mail->ContentType = 'text/plain';
	$mail->Username = "deskhelpphp@gmail.com";
	$mail->Password = "helpdesk123";
	$mail->SetFrom("deskhelpphp@gmail.com","Help Desk");
	$mail->Subject = "Help Desk Request";
	$mail->Body = "Greetings, <br><br>
	You have a new request from ".$values[1]." with the details showing below from Help Desk Software.<br><br>
	
	Request by: ".$values[1]."<br>
	Request description: ".$values[0]."<br>
	Priority: ".$values[2]."<br>
	Date requested: ".$values[3]."<br><br>
	<hr>
	<i>This email was generated from Help Desk Software. Please do not reply.<br><br>";
	
	$mail->AddAddress('deskhelpphp@gmail.com');
	
	$mail->send();
}
?>