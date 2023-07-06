<?php

class Usuario extends Persona {
    private $email, $pass, $rolesIds;
    public function __construct(string $nombre, string $apellido, string $cedula, string $email, string $pass, array $rolesIds) {
        parent::__construct($nombre, $apellido, $cedula);
        $this->email = $email;
        $this->pass = $pass;
        $this->rolesIds = $rolesIds;
    }

    public function getEmail() {
        return $this->email;   
    }

    public function getPass() {
        return $this->pass;
    }

    public function getRolesIds() {
        return $this->rolesIds;
    }

    

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPass($pass) {
        $this->pass = $pass;
    }

    public function setRolesIds($rolesIds) {
        $this->rolesIds = $rolesIds;
    }
}



?>