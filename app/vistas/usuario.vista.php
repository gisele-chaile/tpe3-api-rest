<?php

class UsuarioVista {
    public $usuario = null; 

    public function mostrarLogin($error= '') {
        require 'templates/formulario.login.phtml';
    }

    
}
