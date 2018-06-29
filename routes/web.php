<?php

/** @var $router \Laravel\Lumen\Routing\Router */
$router->get('/', function () use ($router) {
    return $router->app->version();
});
