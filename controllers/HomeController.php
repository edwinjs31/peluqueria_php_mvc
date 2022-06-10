<?php

namespace Controllers;

use Classes\Email;
use Model\Contacto;
use MVC\Router;

class HomeController
{
    public static function contacto(Router $router)
    {
        define('ENVIAR_FORMULARIO_CONTACTO', 4);
        // Alertas vacias
        $alertas = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $asunto = $_POST['asunto'];
            $mensaje = $_POST['mensaje'];

            // Crear un nuevo objeto Contacto
            $contacto = new Contacto($nombre, $email, $asunto, $mensaje);
            $alertas = $contacto->validarFormularioContacto();
            $email_dominio = $_ENV['MAIL_DEFAULT_FROM'];

            // Revisar que alerta este vacio
            if (empty($alertas)) {
                // Enviar el Email
                $email = new Email();
                $subject = 'Mensaje de contacto';
                $body = [
                    'nombre' => $contacto->nombre,
                    'asunto' => $contacto->asunto,
                    'mensaje' => $contacto->mensaje,
                    'email' => $contacto->email
                ];
                $email->send($email_dominio, $subject, $body, ENVIAR_FORMULARIO_CONTACTO);

            }
        }
        $alertas = Contacto::getAlertas();
        $router->render('templates/formulario-contacto', [
            'alertas' => $alertas
        ]);
    }

    public static function nosotros(Router $router)
    {
        $alertas = [];
        $router->render('templates/nosotros', [
            'alertas' => $alertas
        ]);
    }
}
