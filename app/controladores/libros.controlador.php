<?php
require_once 'app/modelos/libros.modelo.php';
require_once 'app/vistas/libros.vista.php';
require_once 'app/modelos/generos.modelo.php';


class LibrosControlador {
    private $modelo;
    private $vista;
    private $generosModelo;

    public function __construct($respuesta = null) {
        $this->modelo = new LibrosModelo();
        $this->vista = new LibrosVista($respuesta ? $respuesta->usuario:null);
        $this->generosModelo = new GenerosModelo();
        
    }

    public function mostrarLibros(){
        $libros = $this->modelo->obtenerLibros();
        $generos = $this->generosModelo->obtenerGeneros();


        foreach ($libros as $libro){
            foreach($generos as $aux){
                if($aux->ID_genero == $libro->ID_genero){
                    $libro->genero = $aux;
                }
            }
        }

        if(!empty($libros))
            return $this->vista->mostrarLibros($libros);
        else
        return $this->vista->mostrarError('No existe');
    }

    public function mostrarLibro($id){
        $libro = $this->modelo->obtenerLibro($id);
        return $this->vista->mostrarLibro($libro);
    }

    public function mostrarLibrosPorGenero($id){
        $libros= $this->modelo->librosPorGenero($id);
        $generos=$this->generosModelo->obtenerGeneros();

        foreach ($libros as $libro) {
            foreach($generos as $aux){
                if($aux->ID_genero == $libro->ID_genero){
                    $libro->genero = $aux;
                }
            }
        }
        return $this->vista->mostrarLibros($libros);
    }

    public function listarLibros(){
        $libros= $this->modelo->obtenerLibros();
        $generos = $this->generosModelo->obtenerGeneros();
        foreach ($libros as $libro){
            foreach($generos as $aux){
                if($aux->ID_genero == $libro->ID_genero){
                    $libro->genero = $aux;
                }
            }
        }
        
        if(!empty($libros))
            return $this->vista->listarLibros($libros);
        else
            return $this->vista->mostrarError('Error');
           
    }


    public function agregarLibro(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Si el formulario ha sido enviado
            if (empty($_POST['Titulo'])){
                return $this->vista->mostrarError('Por favor ingrese un nombre');
            }
            if (empty($_POST['Autor'])){
                return $this->vista->mostrarError('Por favor complete el autor');
            }
            if (empty($_POST['Reseña'])){
                return $this->vista->mostrarError('Por favor complete la reseña');
            }
            if (empty($_POST['Año'])){
                return $this->vista->mostrarError('Por favor complete el año de publicación');
            }


        $Titulo = $_POST['Titulo'];
        $Autor = $_POST['Autor'];
        $Reseña = $_POST['Reseña'];
        $Año = $_POST['Año'];
        $genero = $_POST['ID_genero'];

        $id=$this->modelo->agregarLibro($Titulo, $Autor, $Reseña, $Año, $genero);
        header('Location: ' . BASE_URL . 'listar-libros');
    }else{
        $this->mostrarFormulario();
    }
}

    public function editarLibro($id) {
        $libro = $this->modelo->obtenerLibro($id);

        if (!$libro) {
            return $this->vista->mostrarError("No existe el libro");
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //Si el formulario ha sido enviado
            if (empty($_POST['Titulo'])) {
                return $this->vista->mostrarError('Por favor ingrese el título');
            }
            if (empty($_POST['Autor'])) {
                return $this->vista->mostrarError('Por favor ingrese el autor');
            }
            if (empty($_POST['Reseña'])) {
                return $this->vista->mostrarError('Por favor ingrese la reseña');
            }
        
            if (empty($_POST['Año'])) {
                return $this->vista->mostrarError('Por favor ingrese el año');
            } 
            //Obtengo los nuevos valores
            $titulo = $_POST['Titulo'];
            $autor = $_POST['Autor'];
            $reseña = $_POST['Reseña'];
            $año = $_POST['Año'];
            $genero = $_POST['ID_genero'];

            $this->modelo->actualizarLibro($id, $titulo, $autor, $reseña, $año, $genero);

            header('Location: ' . BASE_URL . 'listar-libros');
        }
        else{
            $this->mostrarFormulario($libro); 
        }
    }

    public function mostrarFormulario($libros = null){
        //obtener la lista de generos disponibles 
        $generos = $this->generosModelo->obtenerGeneros();
        //mostrar el formulario con los generos y el libro si existe
        $this->vista->mostrarFormulario($generos, $libros);
    }


    public function eliminarLibro($id){
        //obtener el libro por id 
        $libro = $this->modelo->obtenerLibro($id);
        //verifico si el libro existe
        if (!$libro){
            return $this->vista->mostrarError("No existe el libro con el id=$id");
        }
        $this->modelo->eliminarLibro($id);
        header('Location: ' . BASE_URL . 'listar-libros');
    }

}