<?php

class GenerosVista {
    //public $generos = null;
    private $usuario = null;
    
    public function __construct($usuario){
        $this->usuario = $usuario;
    }

    public function mostrarGeneros($generos){
        
        require 'templates/lista.generos.phtml';

    }
    public function mostrarGenero($genero){
        require 'templates/mostrar.genero.phtml';
    }

    public function listarGeneros($generos){
        require 'templates/generos.login.phtml';
    }
    
    public function mostrarFormulario($genero = null){
        require 'templates/formulario.genero.phtml';
    }

    public function mostrarError($error){
        require 'templates/error.phtml';
    }

}




