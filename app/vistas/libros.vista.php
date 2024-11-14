<?php
class LibrosVista {
    //public $libros = null;
    private $usuario = null;

    public function __construct($usuario){
        //$this->libros = $libros;
        $this->usuario =$usuario;
    }

    public function mostrarLibros($libros){
       
        require 'templates/lista.libros.phtml';
    }

    public function mostrarLibro($libro){
        require 'templates/mostrar.libro.phtml';
    }

    public function listarLibros($libros){
        require 'templates/libros.login.phtml';
    }

    public function mostrarFormulario($generos, $libro = null){ //si libro es null se muestra el formulario vacío 
        require 'templates/formulario.libro.phtml';
    }
    
    public function mostrarError($error){
        require 'templates/error.phtml';
    }


}