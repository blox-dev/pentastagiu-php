<?php
    $routes = require 'routes.php';

    require 'Router.php';

    $uri = explode('?',trim($_SERVER['REQUEST_URI'],'/'))[0];
    $router = new Router($routes);

    try {
        $router->direct($uri);
    } catch(Exception $exception){
        require 'views/errors/404.error.php';
    }