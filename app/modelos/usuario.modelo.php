<?php

class UsuarioModelo {
    private $db;

    public function __construct() {
       $this->db = new PDO('mysql:host=localhost;dbname=db_biblioteca;charset=utf8', 'root', '');
    }
 
    public function obtenerUsuario($usuario) {    
        $query = $this->db->prepare("SELECT * FROM usuario WHERE usuario = ?");
        $query->execute([$usuario]);
    
        $usuario = $query->fetch(PDO::FETCH_OBJ);
    
        return $usuario;
    }
}