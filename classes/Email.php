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
         $mail->Host = '108.177.15.109';
         $mail->SMTPAuth = true;
         $mail->Port = 587;
         $mail->Username = 'susicarlos4';
         $mail->Password = 'iabjcbitzwgqvjrq';
     
         $mail->setFrom('susicarlos4@gmail.com');
         $mail->addAddress('susicarlos4@gmail.com', 'AppSalon.com');
         $mail->Subject = 'Confirma tu Cuenta';

         // Set HTML
         $mail->isHTML(TRUE);
         $mail->CharSet = 'UTF-8';

         $contenido = '<html>';
         $contenido .= "<p><strong>Hola " . $this->email .  "</strong> Has Creado tu cuenta en App Salón, solo debes confirmarla presionando el siguiente enlace</p>";
         $contenido .= "<p>Presiona aquí: <a href='https://safe-beach-77372.herokuapp.com/views/auth/confirmar-cuenta?token=" . $this->token . "'>Confirmar Cuenta</a>";        
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
        $mail->Host = '108.177.15.109';
        $mail->SMTPAuth = true;
        $mail->Port = 587;
        $mail->Username = 'susicarlos4';
        $mail->Password = 'iabjcbitzwgqvjrq';
    
        $mail->setFrom('susicarlos4@gmail.com');
        $mail->addAddress('susicarlos4@gmail.com', 'AppSalon.com');
        $mail->Subject = 'Reestablece tu password';

        // Set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = '<html>';
        $contenido .= "<p><strong>Hola " . $this->nombre .  "</strong> Has solicitado reestablecer tu password, sigue el siguiente enlace para hacerlo.</p>";
        $contenido .= "<p>Presiona aquí: <a href='https://safe-beach-77372.herokuapp.com/views/auth/recuperar?token=" . $this->token . "'>Reestablecer Password</a>";        
        $contenido .= "<p>Si tu no solicitaste este cambio, puedes ignorar el mensaje</p>";
        $contenido .= '</html>';
        $mail->Body = $contenido;

            //Enviar el mail
        $mail->send();
    }
}
