<?php

use Slim\Http\Request;
use Slim\Http\Response;

class None
{
    public function __invoke(Request $request, Response $response, array $args)
    {
        $response->getBody()->write('None chamada');
    }
}

class Action
{
    public function __invoke(Request $request, Response $response, array $args)
    {
        $response->getBody()->write('Action1 chamada');
    }
}

class Action2
{
    public function __invoke(Request $request, Response $response, array $args)
    {
        $response->getBody()->write('Action2 chamada');
    }
}