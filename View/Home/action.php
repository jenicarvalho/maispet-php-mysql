<?php

if (isset($_POST))
{
	$return = array('type' => 'error');
	
	$name = isset($_POST['name']) ? trim($_POST['name']) : '';
	$email = isset($_POST['email']) ? trim($_POST['email']) : '';
	$message = isset($_POST['message']) ? trim($_POST['message']) : '';
	$phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
	$empresa = isset($_POST['pet']) ? trim($_POST['pet']) : '';
	$subject = isset($_POST['subject']) && $_POST['subject'] ? trim($_POST['subject']) : 'Contact Form Submission';
	
	if($name && $email && $message && filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$body = ' <br /> Nome: ' . $name;
		$body .= '<br /> Email: ' . $email;
		$body .= '<br /> Telefone:' . $phone;
		$body .= '</br /> pet:' . $pet;
		$body .= '<br /><br />';
		$body .= $message;
			
		require 'PHPMailer/PHPMailerAutoload.php';

		$To = 'flp.r.moura@gmail.com';		
		$Subject = '[Contato do Site - MAIS PET] ' . $subject;

		$Host = 'smtp-relay.gmail.com';
		$Port = "587";

		$mail = new PHPMailer();
		$mail->IsSMTP(); 
		$mail->SMTPDebug = 2;
		$mail->CharSet = "UTF-8";
		$mail->SMTPSecure = 'tls';

		$mail->Host = $Host; 
		$mail->Port = $Port;

		$mail->SetFrom("flp.r.moura@gmail.com", "Contato do Site");
		$mail->Subject = $Subject;
		$mail->MsgHTML($body);
		$mail->AddAddress($To, "");

		if(!$mail->send()) {
        	echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=contato.php'>";
        	echo "Mensagem Enviada com Sucesso!";
    	} 
    	else {
        	echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=contato.php'>";
        	echo "Mensagem Enviada com Sucesso";

    	}	
	}
	else
	{
		echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=contato.php'>";
		echo "Mensagem Enviada com Sucesso";
		die();
	}
}

?>