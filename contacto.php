<?php


// Se imprime $_POST para saber que es lo que envia el formulario serializado

if ($_POST['oculto']) {
	$nombre  = limpiar($_POST['nombre']);
	$mail    = limpiar($_POST['email']);
	$mensaje = limpiar($_POST['mensaje']);

	$header = 'From: ' . $mail . " \r\n";
	$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
	$header .= "Mime-Version: 1.0 \r\n";
	$header .= "Content-Type: text/plain";
	
	$mensaje = "Este mensaje fue enviado por " . $nombre . " \r\n";
	$mensaje .= "Su e-mail es: " . $mail . " \r\n";
	$mensaje .= "Mensaje: " . $_POST['mensaje'] . " \r\n";
	$mensaje .= "Enviado el " . date('d/m/Y', time());
	
	$para = 'mail@gmail.com';
	$asunto = 'Enviado desde Curriculum Web';
	
	mail($para, $asunto, utf8_decode($mensaje), $header);

	// Esta es la respuesta que espera la el function de la funcion $.post (ejemplo: function(data))
	echo "ok";
} else {
	echo "fallo";
}

function limpiar($text){
	return str_replace("\r","",str_replace("\n","",$text));
}
?>
