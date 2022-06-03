<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email
{

    public $email;
    public $body = [];

    public function __construct($email, $body)
    {
        $this->email = $email;
        $this->body = $body;
    }

    public function enviarConfirmacion()
    {
        $nombre = $this->body['nombre'];
        $token = $this->body['token'];
        // create a new object
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '4f4b5e29cde87b';
        $mail->Password = '49f982815fa101';

        $mail->setFrom('cuentas@appsalon.com');
        $mail->addAddress('cuentas@appsalon.com', 'AppSalon.com');
        $mail->Subject = 'Confirma tu Cuenta';

        // Set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = '<html>';
        $contenido .= "<p><strong>Hola " . $nombre .  "</strong>, gracias por registrarte en AppSalón, para confirmar tu cuenta pincha en el siguiente enlace:</p>";
        $contenido .= "<p><a href='http://localhost:3000/confirmar-cuenta?token=" . $token . "'>Confirmar Cuenta</a></p>";
        $contenido .= "<p>Te esperamos en nuestra web!!</p>";
        $contenido .= "<p>Si tu no solicitaste este cambio, puedes ignorar el mensaje</p>";
        $contenido .= '</html>';
        $mail->Body = $contenido;

        //Enviar el mail
        $mail->send();
    }

    public function enviarInstrucciones()
    {
        $nombre = $this->body['nombre'];
        $token = $this->body['token'];
        // create a new object
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '4f4b5e29cde87b';
        $mail->Password = '49f982815fa101';

        $mail->setFrom('cuentas@appsalon.com');
        $mail->addAddress('cuentas@appsalon.com', 'AppSalon.com');
        $mail->Subject = 'Reestablece tu password';

        // Set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = '<html>';
        $contenido .= "<p><strong>Hola " .  $nombre .  "</strong> Has solicitado reestablecer tu contraseña, sigue el siguiente enlace:</p>";
        $contenido .= "<p>Presiona aquí: <a href='http://localhost:3000/recuperar?token=" . $token . "'>Reestablecer contraseña</a>";
        $contenido .= "<p>Si tu no solicitaste este cambio, puedes ignorar el mensaje</p>";
        $contenido .= '</html>';
        $mail->Body = $contenido;

        //Enviar el mail
        $mail->send();
    }
    public function enviarConfirmacionCita()
    {
        $nombre = $this->body['nombre'];
        $fecha = $this->body['fecha'];
        $hora = $this->body['hora'];
        // create a new object
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '4f4b5e29cde87b';
        $mail->Password = '49f982815fa101';

        $mail->setFrom('cuentas@appsalon.com');
        $mail->addAddress('cuentas@appsalon.com', 'AppSalon.com');
        $mail->Subject = 'Confirmacion de cita';

        // Set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = '<html>';
        $contenido .= "<p><strong>Hola " . $nombre .  "</strong>, tu cita para AppSalon está programada para el dia:</p>";
        $contenido .= "<p><strong>" . $fecha . "</strong> a las <strong>" . $hora . "</strong> horas.</p>";
        $contenido .= "<p>Si necesitas cambiar tu cita, llamanos al 90456897. Por favor, ten en cuenta nuestras políticas de cancelación en <a href='http://appSalon.com'>appSalon.com</a></p>";
        $contenido .= "<p>Gracias. ¡Esperamos verte pronto!</p>";
        $contenido .= '</html>';
        $mail->Body = $contenido;

        //Enviar el mail
        $mail->send();
    }
    public function enviarFormularioContacto()
    {
        $nombre = $this->body['nombre'];
        $email = $this->body['email'];
        $asunto= $this->body['asunto'];
        $mensaje = $this->body['mensaje'];
        // create a new object
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '4f4b5e29cde87b';
        $mail->Password = '49f982815fa101';

        $mail->setFrom($email);
        $mail->addAddress('cuentas@appsalon.com', 'AppSalon.com');
        $mail->Subject = 'Formulario de contacto';

        // Set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = '<html>';
        $contenido .= "<p><strong>De: " . $nombre .  "</strong>, <a href='mailto: $email'>$email</a></p>";
        $contenido .= "<p><strong>Asunto:</strong> $asunto</p>";
        $contenido .= "<p><strong>Cuerpo del mensaje:</strong></p>";
        $contenido .= "<p>$mensaje</p>";
        $contenido .= "<p>Este mensaje se ha enviado desde el formulario de contacto de AppSalon.</p>";
        $contenido .= '</html>';
        $mail->Body = $contenido;

        //Enviar el mail
        $mail->send();
        // $respuesta='Mensaje enviado';
    }
}
