<?php
require_once './app/models/books.model.php';
require_once './app/views/json.view.php';

class BooksApiController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new BooksModel();
        $this->view = new JSONView();
    }
    // obtengo todos los libros
    public function getAll($req, $res) {
        $orderBy = false;
        if(isset($req->query->orderBy))
            $orderBy = $req->query->orderBy;

        $genero = null;
        if(isset($req->query->ID_genero)) {
            $genero = $req->query->ID_genero;
        }

        $books = $this->model->getBooks($genero, $orderBy);

        return $this->view->response($books);
    }

    // obtengo libro por id
    public function get($req, $res) {
        // obtengo el id del libro desde la ruta
        $id = $req->params->id;

        // obtengo el libro de la DB
        $book = $this->model->getBook($id);

        if(!$book) {
            return $this->view->response(" El libro con el id=$id no existe", 404);
        }

        // mando el libro a la vista
        return $this->view->response($book);
    }

    // api/libros (POST)
    public function create($req, $res) {

        // valido los datos
        if (empty($req->body->Titulo) || empty($req->body->Autor)|| empty($req->body->Reseña)|| empty($req->body->Año)) {
            return $this->view->response('Faltan completar datos', 400);
        }

        // obtengo los datos
        $titulo = $req->body->Titulo;       
        $autor = $req->body->Autor;       
        $reseña = $req->body->Reseña;
        $año = $req->body->Año;
        $genero = $req->body->ID_genero;      

        // inserto los datos
        $id = $this->model->insertBook($titulo, $autor, $reseña,$año,$genero);

        if (!$id) {
            return $this->view->response("Error al insertar libro", 500);
        }

        $book = $this->model->getBook($id);
        return $this->view->response($book, 201);
    }

    // api/libros/:id (PUT)
    public function update($req, $res) {
        $id = $req->params->id;

        // verifico que exista
        $book = $this->model->getBook($id);
        if (!$book) {
            return $this->view->response("El libro con el id=$id no existe", 404);
        }

         // valido los datos
         if (empty($req->body->Titulo) || empty($req->body->Autor)|| empty($req->body->Reseña)|| empty($req->body->Año)) {
            return $this->view->response('Faltan completar datos', 400);
        }

        // obtengo los datos
        $titulo = $req->body->Titulo;       
        $autor = $req->body->Autor;       
        $reseña = $req->body->Reseña;
        $año = $req->body->Año;
        $genero = $req->body->ID_genero;

        // actualiza el libro
        $this->model->updateBook($id,$titulo, $autor, $reseña,$año,$genero);

        // obtengo el libro modificad y lo devuelvo en la respuesta
        $book = $this->model->getBook($id);
        $this->view->response($book, 200);
    }


}


