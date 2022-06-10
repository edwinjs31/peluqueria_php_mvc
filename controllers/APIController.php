<?php

namespace Controllers;

use Model\Cita;
use Model\CitaServicio;
use Model\Servicio;
use Classes\Email;
use Model\Usuario;

class APIController
{
    public static function index()
    {
        $servicios = Servicio::all();
        echo json_encode($servicios);
    }

    public static function guardar()
    {
        define('CONFIRMAR_CITA', 3);
        $cita = new Cita($_POST);
        $usuarioIdBD = Cita::SQL("SELECT usuario_id FROM citas WHERE usuario_id = '{$cita->usuario_id}' LIMIT 1");

        if (empty($usuarioIdBD)) {

            // Almacena la Cita y devuelve el ID
            $resultado = $cita->guardar();

            $id = $resultado['id'];


            // Almacena la Cita y el Servicio

            // Almacena los Servicios con el ID de la Cita
            $idServicios = explode(",", $_POST['servicios']);
            foreach ($idServicios as $idServicio) {
                $args = [
                    'cita_id' => $id,
                    'servicio_id' => $idServicio
                ];
                $citaServicio = new CitaServicio($args);
                $citaServicio->guardar();
            }

            echo json_encode(['resultado' => $resultado]);

            // Enviar el Email
            $usuario = Usuario::find($cita->usuario_id);
            $email = new Email();
            $subject = "Confirmación cita";
            $body = [
                'nombre' => $usuario->nombre,
                'fecha' => $cita->fecha,
                'hora' => $cita->hora,
            ];
            $email->send($usuario->email, $subject, $body, CONFIRMAR_CITA);//TODO: debugear esto,debuelve que no se ha generado cita
            // $email = new Email($usuario->email, $body);
            // $email->enviarConfirmacionCita();
        } else {
            echo json_encode(['resultado' => 'Ya existe una cita para este usuario']);
        }
    }

    public static function eliminar()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $cita = Cita::find($id);
            $cita->eliminar();
            header('Location:' . $_SERVER['HTTP_REFERER']);
        }
    }
}
