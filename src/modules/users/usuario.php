<?php

class Usuario extends Persona {
    private $email, $pass, $roles;
    public function __construct(string $nombre, string $apellido, string $cedula, string $email, string $pass, array $roles) {
        parent::__construct($nombre, $apellido, $cedula);
        $this->email = $email;
        $this->pass = $pass;
        $this->roles = $roles;
    }

    public function getEmail() {
        return $this->email;   
    }

    public function getPass() {
        return $this->pass;
    }

    public function getRoles() {
        return $this->roles;
    }

    

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPass($pass) {
        $this->pass = $pass;
    }

    public function setRoles($roles) {
        $this->roles = $roles;
    }
}



?>