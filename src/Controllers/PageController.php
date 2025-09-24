<?php
namespace Eclipse972\DossiersTechniques\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Twig\Environment;

class PageController
{
    private Environment $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function accueil(Response $response): Response
    {
        $response->getBody()->write(
            $this->twig->render('accueil.twig')
        );
        return $response;
    }
}
