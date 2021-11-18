<?php

use Slim\Http\Request;
use Slim\Http\Response;

class Middleware
{
    public function __invoke(Request $request, Response $response, $next)
    {
        $token = $request->getQueryParam('token');

        if ($token == '123') {
            echo "<br> middleware1 ok";
            return $next($request, $response);
        }

        $response->getBody()->write(json_encode(['error' => 'inválid token middleware 1']));
        return $response;
    }
}

class Middleware2
{
    public function __invoke(Request $request, Response $response, $next)
    {
        $token = $request->getQueryParam('token');

        if ($token == '123') {
            echo "<br> middleware2 ok";
            return $next($request, $response);
        }

        $response->getBody()->write(json_encode(['error' => 'inválid token middleware 2']));
        return $response;
    }
}

class Auth
{
    public function __invoke(Request $request, Response $response, $next)
    {
        $nome = $request->getParam('nome');
        $senha = $request->getParam('senha');

        if($nome == "admin" && $senha == "admin"){
            return $next($request, $response);
        }

        $response->getBody()->write(json_encode(['error' => "login inválid"]));
        return $response;
    }
}
