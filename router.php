<?php
    
    require_once 'libs/router.php';

    require_once 'app/controller/books.api.controller.php';

    $router = new Router();

    #                 endpoint                   verbo      controller               metodo
    $router->addRoute('libros'      ,            'GET',     'BooksApiController',   'getAll');
    $router->addRoute('libros/:id'  ,            'GET',     'BooksApiController',   'get'   );
    $router->addRoute('libros'  ,                'POST',    'BooksApiController',   'create');
    $router->addRoute('libros/:id'  ,            'PUT',     'BooksApiController',   'update');

    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);
