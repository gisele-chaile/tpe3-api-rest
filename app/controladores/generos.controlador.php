<?php

require_once 'app/modelos/generos.modelo.php';
require_once 'app/vistas/generos.vista.php';
require_once 'app/modelos/libros.modelo.php';


class GenerosControlador {

    private $modelo;
    private $vista;
    private $librosModelo;
    

    public function __construct($respuesta = null) {
        $this->modelo = new GenerosModelo();
        $this->vista = new GenerosVista($respuesta ? $respuesta->usuario: null);
        $this->librosModelo = new LibrosModelo();

    }
    
    function mostrarGeneros() {
        $generos = $this->modelo->obtenerGeneros();
        return $this->vista->mostrarGeneros($generos);
    } 
    function mostrarGenero($id) {
        $genero = $this->modelo->obtenerGenero($id);
        return $this->vista->mostrarGenero($genero);
    } 

    public function listarGeneros(){
        $generos= $this->modelo->obtenerGeneros();

        if(!empty($generos))
            return $this->vista->listarGeneros($generos);
        else
            return $this->vista->mostrarError('Error');
           
    }
    function agregarGenero(){
    
    // verifico los requeridos
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(!isset($_POST['Nombre']) || empty($_POST['Nombre'])){
                return $this->vista->mostrarError('Ingrese nombre del genero');

            }
            if(!isset($_POST['Descripcion']) || empty($_POST['Descripcion'])){
                return $this->vista->mostrarError('Ingrese una descripcion');

            }
            if(!isset($_POST['Relacionado']) || empty($_POST['Relacionado'])){
                return $this->vista->mostrarError('Ingrese genero relacionado');

            }

            // inserta un genero en el sistema
            $nombre = $_POST['Nombre'];
            $descripcion = $_POST['Descripcion'];
            $generosrelacionados = $_POST['Relacionado'];
    
            // inserto el genero

            $id = $this->modelo->agregarGenero($nombre,$descripcion,$generosrelacionados);
            header("location: ". BASE_URL.'listar-generos');
        }else{
            $this->mostrarFormulario();
        }
    }
    

    function eliminarGenero($id){

        $genero= $this->modelo->obtenerGenero($id);
        if (!$genero) {
            return $this->vista->mostrarError("No existe el genero");

        }
        $this->modelo->borrarGenero($id);
        header("location: " . BASE_URL. 'listar-generos');

    }

    function editarGenero($id) {
        $genero = $this->modelo->obtenerGenero($id);

        if (!$genero) {
            return $this->vista->mostrarError(" Genero inexistente");
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //Si el formulario ha sido enviado
            if (!isset($_POST['Nombre']) || empty($_POST['Nombre'])) {
                return $this->vista->mostrarError('Complete el genero');
            }
            if (!isset($_POST['Descripcion']) || empty($_POST['Descripcion'])) {
                return $this->vista->mostrarError('Complete la descripcion del genero');
            }
            if (!isset($_POST['Relacionado']) || empty($_POST['Relacionado'])) {
                return $this->vista->mostrarError('Complete el genero relacionado');
            }
         
            //Obtengo los nuevos valores
            $nombre = $_POST['Nombre'];
            $descripcion = $_POST['Descripcion'];
            $generosrelacionados = $_POST['Relacionado'];
        
            // actualiza el libro
            $this->modelo->actualizarGenero($id, $nombre, $descripcion, $generosrelacionados);

            header('Location: ' . BASE_URL . 'listar-generos');      
        }else{
            $this->mostrarFormulario($genero);
        }
    }
    function mostrarFormulario($genero = null){
        $libros = $this->librosModelo->obtenerLibros();
        $this->vista->mostrarFormulario($genero,$libros);
    }
}