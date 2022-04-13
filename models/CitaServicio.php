<?php

namespace Model;

class CitaServicio extends ActiveRecord {
    protected static $tabla = 'citas_servicios';
    protected static $columnasDB = ['id', 'cita_id', 'servicio_id'];

    public $id;
    public $citaId;
    public $servicioId;
    //TODO: Revisar campos de la tabla
    public function __construct($args = [])
    {
       $this->id = $args['id'] ?? null;
       $this->citaId = $args['cita_id'] ?? '';
       $this->servicioId = $args['servicio_id'] ?? ''; 
    }
}