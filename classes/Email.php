<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email {

    public $email;
    public $nombre;
    public $token;
    
    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion() {

         // create a new object
         $mail = new PHPMailer();
         $mail->isSMTP();
		 $mail->SMTPDebug  = 0;
         $mail->Host = 'smtp.gmail.com';
         $mail->SMTPAuth = true;
		 $mail->SMTPSecure = "tls";
         $mail->Port = 587;
         $mail->Username = 'susicarlos4@gmail.com';
         $mail->Password = 'iabjcbitzwgqvjrq';
     
         $mail->setFrom('susicarlos4@gmail.com');
         $mail->addAddress('appsalonmvc@gmail.com', 'AppSalon.com');
         $mail->Subject = 'Confirma tu Cuenta';

         // Set HTML
         $mail->isHTML(TRUE);
         $mail->CharSet = 'UTF-8';

         $contenido = '<html>';
         $contenido .= "<p><strong>Hola " . $this->email .  "</strong> Has Creado tu cuenta en App Salón, solo debes confirmarla presionando el siguiente enlace</p>";
         $contenido .= "<p>Presiona aquí: <a href='https://arcane-stream-43691.herokuapp.com/confirmar-cuenta?token=" . $this->token . "'>Confirmar Cuenta</a>";        
         $contenido .= "<p>Si tu no solicitaste este cambio, puedes ignorar el mensaje</p>";
         $contenido .= '</html>';
         $mail->Body = $contenido;

         //Enviar el mail
         $mail->send();

    }

    public function enviarInstrucciones() {

        // create a new object
        $mail = new PHPMailer();
        $mail->isSMTP();
		$mail->SMTPDebug  = 0;
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
		$mail->SMTPSecure = "tls";
        $mail->Port = 2525;
        $mail->Username = 'susicarlos4@gmail.com';
        $mail->Password = 'iabjcbitzwgqvjrq';
    
        $mail->setFrom('susicarlos4@gmail.com');
        $mail->addAddress('appsalonmvc@gmail.com', 'AppSalon.com');
        $mail->Subject = 'Reestablece tu password';

        // Set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = '<html>';
        $contenido .= "<p><strong>Hola " . $this->nombre .  "</strong> Has solicitado reestablecer tu password, sigue el siguiente enlace para hacerlo.</p>";
        $contenido .= "<p>Presiona aquí: <a href='https://arcane-stream-43691.herokuapp.com/recuperar?token=" . $this->token . "'>Reestablecer Password</a>";        
        $contenido .= "<p>Si tu no solicitaste este cambio, puedes ignorar el mensaje</p>";
        $contenido .= '</html>';
        $mail->Body = $contenido;

            //Enviar el mail
        $mail->send();
    }
}
