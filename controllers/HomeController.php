<?php

namespace Controllers;

use Classes\Email;
use Model\Contacto;
use MVC\Router;

class HomeController
{
    public static function contacto(Router $router)
    {

        // Alertas vacias
        $alertas = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre= $_POST['nombre'];
            $email= $_POST['email'];
            $asunto= $_POST['asunto'];
            $mensaje= $_POST['mensaje'];

            // Crear un nuevo objeto Contacto
            $contacto = new Contacto($nombre, $email, $asunto, $mensaje);
            $alertas = $contacto->validarFormularioContacto();
            $email_dominio='dominio@gemail.com';

            // Revisar que alerta este vacio
            if (empty($alertas)) {
                // Enviar el Email
                $body = [
                    'nombre' => $contacto->nombre,
                    'asunto' => $contacto->asunto,
                    'mensaje' => $contacto->mensaje,
                    'email' => $contacto->email
                ];
                $email = new Email($email_dominio, $body);
                //$email->enviarFormularioContacto();
                if($email->enviarFormularioContacto()){
                    Contacto::setAlerta('exito', "Gracias por contactar con nosotros, $nombre. Nos pondremos en contacto en 24 horas");
                }
                
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
