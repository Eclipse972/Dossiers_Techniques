<?php

use DI\Container;
use Slim\Views\Twig;

$conteneur = new Container();

$conteneur->set(Twig::class, function () {
    return Twig::create(
        __DIR__ . '/../Vue',
        ['cache' => false]
    );
});

return $conteneur;