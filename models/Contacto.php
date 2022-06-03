<?php

namespace Model;

class Contacto extends ActiveRecord
{
    public $nombre;
    public $email;
    public $mensaje;

    public function __construct($nombre = '', $email = '',$asunto='', $mensaje = '')
    {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->asunto = $asunto;
        $this->mensaje = $mensaje;
    }

    // Mensajes de validación para el formulario de contacto
    public function validarFormularioContacto()
    {
        if(empty($this->nombre) || empty($this->email) || empty($this->asunto) || empty($this->mensaje)){
           self::$alertas['error'][] = 'Todos los campos son obligatorios';
        }
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            self::$alertas['error'][] = 'El Email no es válido';
        }
        if (!$this->mensaje) {
            self::$alertas['error'][] = 'El mensaje es obligatorio';


            return self::$alertas;
        }
    }
}
