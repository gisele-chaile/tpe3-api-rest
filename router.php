<?php
    
    require_once 'libs/router.php';

    require_once 'app/controllers/books.api.controller.php';
    // require_once 'app/controllers/user.api.controller.php';
    // require_once 'app/middlewares/jwt.auth.middleware.php';
    $router = new Router();

    // $router->addMiddleware(new JWTAuthMiddleware());

    #                 endpoint                   verbo      controller               metodo
    $router->addRoute('libros'      ,            'GET',     'BooksApiController',   'getAll');
    $router->addRoute('libros/:id'  ,            'GET',     'BooksApiController',   'get'   );
    $router->addRoute('libros'  ,                'POST',    'BooksApiController',   'create');
    $router->addRoute('libros/:id'  ,            'PUT',     'BooksApiController',   'update');

    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);