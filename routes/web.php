<?php

/** @var $router \Laravel\Lumen\Routing\Router */
$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('tracks', 'TrackController@index');
$router->post('tracks', 'TrackController@store');
//$router->get('artists', 'ArtistController@index');
