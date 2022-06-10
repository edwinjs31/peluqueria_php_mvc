<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class Email
{

    private $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);
        $this->mail->isSMTP();
        $this->mail->Host = $_ENV['MAIL_HOST'];
        $this->mail->SMTPAuth = true;
        $this->mail->Username = $_ENV['MAIL_USERNAME'];
        $this->mail->Password = $_ENV['MAIL_PASSWORD'];
        $this->mail->SMTPSecure = 'tls';
        $this->mail->Port = 587;
        $this->mail->setFrom($_ENV['MAIL_DEFAULT_FROM'], 'Blue Velvet Peluquería');
        $this->mail->isHTML(true);
        $this->mail->CharSet = 'UTF-8';
    }

    public function send($to, $subject, $body, $opc)
    {
        switch ($opc) {
            case 1:
                $bodyMessage = $this->contenidoConfirmacionCuenta($body);
                break;
            case 2:
                $bodyMessage = $this->contenidoRestablecerPassword($body);
                break;
            case 3:
                $bodyMessage = $this->contenidoConfirmacionCIta($body);
                break;
            case 4:
                $bodyMessage = $this->contenidoFormularioContacto($body);
                $this->mail->setFrom($body['email']); //TODO: Cambiar el nombre del remitente
                break;

            default:
                $bodyMessage = '';
                break;
        }
        try {
            $this->mail->addAddress($to);
            $this->mail->Subject = $subject;
            $this->mail->Body = $bodyMessage;
            $this->mail->send();
        } catch (Exception $e) {
            echo "Error al enviar el email: {$this->mail->ErrorInfo}";
        }
    }

    private function contenidoConfirmacionCuenta($body)
    {
        $contenido = '<html>';
        $contenido .= "<p><strong>Hola " . $body['nombre'] .  "</strong>, gracias por registrarte en <strong>Blue Velvet peluqueria</strong>, para confirmar tu cuenta pincha en el siguiente enlace:</p>";
        $contenido .= "<p><a href='http://localhost:3000/confirmar-cuenta?token=" . $body['token'] . "'>Confirmar Cuenta</a></p>";
        $contenido .= "<p>Te esperamos en nuestra web!!</p>";
        $contenido .= "<p>Si tu no solicitaste este cambio, puedes ignorar el mensaje</p>";
        $contenido .= '</html>';

        return $contenido;
    }
    private function contenidoRestablecerPassword($body)
    {
        $contenido = '<html>';
        $contenido .= "<p><strong>Hola " .  $body['nombre'] .  "</strong> Has solicitado reestablecer tu contraseña, sigue el siguiente enlace:</p>";
        $contenido .= "<p>Presiona aquí: <a href='http://localhost:3000/recuperar?token=" . $body['token'] . "'>Reestablecer contraseña</a>";
        $contenido .= "<p>Si tu no solicitaste este cambio, puedes ignorar el mensaje</p>";
        $contenido .= '</html>';
        return $contenido;
    }
    private function contenidoConfirmacionCIta($body)
    {

        $contenido = '<html>';
        $contenido .= "<p><strong>Hola " . $body['nombre'] .  "</strong>, tu cita para Blue Velvet Peluquería está programada para el dia:</p>";
        $contenido .= "<p><strong>" . $body['fecha'] . "</strong> a las <strong>" . $body['hora'] . "</strong> horas.</p>";
        $contenido .= "<p>Si necesitas cambiar tu cita, llamanos al 90456897. Por favor, ten en cuenta nuestras políticas de cancelación en <a href='http://appSalon.com'>appSalon.com</a></p>";
        $contenido .= "<p>Gracias. ¡Esperamos verte pronto!</p>";
        $contenido .= '</html>';
        return $contenido;
    }
    private function contenidoFormularioContacto($body)
    {

        $nombreContacto = $body['nombre'];
        $emailConacto = $body['email'];
        $asuntoContacto = $body['asunto'];
        $mensajeContacto = $body['mensaje'];

        $contenido = '<html>';
        $contenido .= "<p><strong>De: " .   $nombreContacto .  "</strong>, <a href='mailto: $emailConacto'>$emailConacto</a></p>";
        $contenido .= "<p><strong>Asunto:</strong> $asuntoContacto</p>";
        $contenido .= "<p><strong>Cuerpo del mensaje:</strong></p>";
        $contenido .= "<p>$mensajeContacto</p>";
        $contenido .= "<p>Este mensaje se ha enviado desde el formulario de contacto de Blue Velvet Peluquería.</p>";
        $contenido .= '</html>';
        return $contenido;
    }
}
