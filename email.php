<?php
	if($_POST["name"]==""||$_POST["phone"]==""||$_POST["email"]==""){
		echo "Lo sentimos, no llenaste toda la información";
	} else {
		$email= $_POST['email'];
		// Sanitize E-mail Address
		$email =filter_var($email, FILTER_SANITIZE_EMAIL);

		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$company = $_POST['company'];

		if (!$email){
			echo "Error al enviar el formulario";
		}
		else{
			$subject = 'Nuevo usuario interesado en Rinoff';

			$headers = 'From:'. 'brisincol.web@gmail.com' ."\r\n".
						'Reply-To: '.$email."\r\n" .
						'X-Mailer: PHP/' . phpversion(); // Sender's Email

			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

			
			//$headers .= 'Cc:'. $email2 . "rn"; // Carbon copy to Sender

			$message = 'Hola Rinoff! '. $name . ' con el número telefónico ' . $phone . ' y con el correo electrónico ' . $email . ', de la empresa: ' .  $company . ' desea recibir más información sobre el producto.';

			// Send Mail By PHP Mail Function
			mail("brayanangarita11@gmail.com", $subject, $message, $headers);
			header('Location: wow');
			//echo "Gracias, ahora eres parte de nuestra lista";
		}
	}
