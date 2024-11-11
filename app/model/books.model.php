<?php

class BooksModel {
    private $db;

    public function __construct() {
       $this->db = new PDO('mysql:host=localhost;dbname=db_biblioteca;charset=utf8', 'root', '');
    }
  
    public function getBooks($orderBy = false) {
        $sql = 'SELECT * FROM libros';

        if($orderBy) {
            switch($orderBy) {
                case 'titulo':
                    $sql .= ' ORDER BY Titulo';
                    break;
                case 'autor':
                    $sql .= ' ORDER BY Autor';
                    break;
                case 'año':
                    $sql .= ' ORDER BY Año';
                    break;
            }
        }

        // 2. Ejecuto la consulta
        $query = $this->db->prepare($sql);
        $query->execute();
    
        // 3. Obtengo los datos en un arreglo de objetos
        $libros = $query->fetchAll(PDO::FETCH_OBJ); 
    
        return $libros;
    }
 
    public function getBook($id) {    
        $query = $this->db->prepare('SELECT * FROM libros WHERE ID_libro = ?');
        $query->execute([$id]);   
    
        $book = $query->fetch(PDO::FETCH_OBJ);
    
        return $book;
    }
    public function getBooksByGenre($id) {
        $query = $this->db->prepare('SELECT libros.*, genero.Nombre AS ID_generoNombre FROM libros JOIN genero ON libros.ID_genero = genero.ID_genero WHERE genero.Id_genero = ?');
        $query->execute([$id]);
    
        $books = $query->fetchAll(PDO::FETCH_OBJ);
    
        return $books;
    }
 
    public function insertBook($titulo, $autor, $reseña, $año,$genero) { 
        $query = $this->db->prepare('INSERT INTO libros(Titulo, Autor, Reseña, Año, ID_genero) VALUES (?, ?, ?, ?,?)');
        $query->execute([$titulo, $autor, $reseña, $año, $genero]);
    
        $id = $this->db->lastInsertId();
    
        return $id;
    }


    function updateBook($id, $titulo, $autor, $reseña, $año,$genero) {    
        $query = $this->db->prepare('UPDATE libros SET Titulo = ?, Autor = ?, Reseña = ?, Año = ?, ID_genero=? WHERE ID_libro = ?');
        $query->execute([$titulo, $autor, $reseña, $año,$genero, $id]);
    }


}
