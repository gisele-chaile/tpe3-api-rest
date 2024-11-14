<?php

class LibrosModelo {
    //atributo privado de la clase para que sea interno a la misma
    private $db;

    public function __construct() { 
        $this->db = $this->conectarse();
    }

    private function conectarse(){ //abro la conexión
        $db = new PDO('mysql:host=localhost;dbname=db_biblioteca;charset=utf8', 'root', '');
        return $db;
    }

    public function obtenerLibros() {
        //Hago la consulta
        $query = $this->db->prepare('SELECT * FROM libros');
        $query->execute();

        //Obtengo los datos en un arreglo de objetos
        $libros =$query->fetchAll(PDO::FETCH_OBJ);

        return $libros;  
    }

    public function obtenerLibro($id){
        //obtengo un objeto del arreglo, pasando por parámetro el id que corresponda
        $query = $this->db->prepare('SELECT * FROM libros WHERE ID_libro = ?');
        //id=? para evitar inyección sql
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function librosPorGenero($id){
        $query = $this->db->prepare('SELECT * FROM libros WHERE ID_genero = ?');
        $query->execute([$id]);

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function agregarLibro($titulo, $autor, $reseña, $año, $genero){
        $query = $this->db->prepare('INSERT INTO libros(Titulo, Autor, Reseña, Año, ID_genero) VALUES (?, ?, ?, ?, ?)');
        $query->execute([$titulo, $autor, $reseña, $año, $genero]);

        $id = $this->db->lastInsertId(); //para obtener el último id

        return $id; 
    }

    public function actualizarLibro($id,$titulo, $autor, $reseña, $año, $genero) {
        $query = $this->db->prepare('UPDATE libros SET Titulo = ?, Autor = ?, Reseña = ?, Año = ?, ID_genero = ? WHERE ID_libro = ?');
        //revisar si agrego imágenes para pasar el parámetro
        $query->execute([$titulo, $autor, $reseña, $año, $genero,$id]);  
    }

    public function eliminarLibro($id){
        $query = $this->db->prepare('DELETE FROM libros WHERE ID_libro = ?');
        $query->execute([$id]);
    }
}
