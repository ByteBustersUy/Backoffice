<?php

class Persona {
    private $nombre, $apellido, $cedula, $email;
    public function __construct(string $nombre, string $apellido, string $cedula) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->cedula = $cedula;
    }

    public function getNombre() {
        return $this->nombre;   
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getCedula() {
        return $this->cedula;
    }

    

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function setCedula($cedula) {
        $this->cedula = $cedula;
    }
}


?>