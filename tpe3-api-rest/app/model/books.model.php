<?php

class BooksModel {
    private $db;

    public function __construct() {
       $this->db = new PDO('mysql:host=localhost;dbname=db_biblioteca;charset=utf8', 'root', '');
    }

    public function getBooks($orderBy = false, $sort = 'asc', $genero = null, ) {
        $sql = 'SELECT libros.*, genero.Nombre AS ID_genero FROM libros JOIN genero ON libros.ID_genero = ID_genero.ID_genero';

        if($genero != null) {
            $sql .= " WHERE ID_genero = $genero";
        }
        
        if($orderBy) {
            switch($orderBy) {
                case 'Titulo':
                    $sql .= ' ORDER BY Titulo';
                    break;
                case 'Autor':
                    $sql .= ' ORDER BY Autor';
                    break;
                case 'Reseña':
                    $sql .= ' ORDER BY Reseña';
                    break;
                case 'Año':
                    $sql .= ' ORDER BY Año';
                    break;
        }

        if ($sort == 'asc' || $sort == 'desc') {
            $sql .= " $sort";
        }

        $query = $this->db->prepare($sql);
        $query->execute();
    
        $books = $query->fetchAll(PDO::FETCH_OBJ); 
    
        return $books;
        }
    }

 
    public function getBook($id) {    
        $query = $this->db->prepare('SELECT * FROM libros WHERE ID_libro = ?');
        $query->execute([$id]);   
    
        $book = $query->fetch(PDO::FETCH_OBJ);
    
        return $book;
    }

    
    public function getBooksByGenre($id) {
        $query = $this->db->prepare('SELECT libros.*, genero.Nombre AS ID_generoNombre FROM libros JOIN genero ON libros.ID_genero = genero.ID_genero WHERE genero.ID_genero = ?');
        $query->execute([$id]);
    
        $books = $query->fetchAll(PDO::FETCH_OBJ);
    
        return $books;
    }
 
 
    public function insertBook($titulo, $autor, $reseña, $año, $genero) { 
        $query = $this->db->prepare('INSERT INTO libros(Titulo, Autor, Reseña, Año, ID_genero) VALUES (?, ?, ?, ?, ?)');
        $query->execute([$titulo, $autor, $reseña, $año, $genero]);
    
        $id = $this->db->lastInsertId();
    
        return $id;
    }

    function updateBook($id, $titulo, $autor, $reseña, $año, $genero) {    
        $query = $this->db->prepare('UPDATE libros SET Titulo = ?, Autor = ?, Reseña = ?, Año = ?, ID_genero = ? WHERE ID_libro = ?');
        $query->execute([$titulo, $autor, $reseña, $año, $genero, $id]);
    }
}