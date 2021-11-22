<?php

namespace Source\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;
use Source\Models\Endereco;

class AddressController
{
    private Endereco $obEndereco;

    public function __construct()
    {
        $this->obEndereco = new Endereco();
    }

    public function getAllAddress(Request $request, Response $response, array $args): Response {
        return $response->withJson($this->obEndereco->getAllAndresses(), 200);
    }

    public function getAddressById(Request $request, Response $response, array $args): Response
    {
        $id = $args['id'];
        $dados = $this->obEndereco->getAddressById($id) ?? ['error' => "404 not found"];
        return $response->withJson($dados, 200);
    }

    public function createAddress(Request $request, Response $response, array $args): Response
    {
        $endereco = $request->getParsedBody()['endereco'];
        $obEndereco = $this->obEndereco->save($endereco);
        return $response->withJson($obEndereco, 201);
    }

    public function updateAddressById(Request $request, Response $response, array $args): Response
    {
        $id = $args['id'];
        $endereco = $request->getParsedBody()['endereco'];
        $obEndereco = $this->obEndereco->update($id, $endereco) ?? ['error' => "Não foi possível atualizar endereço"];
        return $response->withJson($obEndereco, 200);
    }

    public function deleteAddressById(Request $request, Response $response, array $args): Response
    {
        $id = $args['id'];
        $obEndereco = $this->obEndereco->delete($id) ?? ['error' => "Não foi possível deletar endereço"];
        return $response->withJson($obEndereco, 200);
    }
}