<?php

namespace Source\Controllers;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Http\Request;
use Source\Models\Endereco;

class AddressController
{
    private Endereco $obEndereco;

    public function __construct()
    {
        $this->obEndereco = new Endereco();
    }

    public function getAllAddress(RequestInterface $request, ResponseInterface $response, array $args): ResponseInterface {
        $dadosJson = json_encode($this->obEndereco->getAllAndresses());
        $response->getBody()->write($dadosJson);
        return $response;
    }

    public function getAddressById(Request $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $id = $args['id'];
        $dadosJson = json_encode($this->obEndereco->getAddressById($id) ?? ['error' => "404 not found"]);
        $response->getBody()->write($dadosJson);

        return $response;
    }

    public function createAddress(Request $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $endereco = $request->getParsedBody()['endereco'];
        $obEndereco = json_encode($this->obEndereco->save($endereco));
        $response->getBody()->write($obEndereco);

        return $response;
    }

    public function updateAddressById(Request $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $id = $args['id'];
        $endereco = $request->getParsedBody()['endereco'];
        $obEndereco = json_encode($this->obEndereco->update($id, $endereco) ?? ['error' => "Não foi possível atualizar endereço"]);
        $response->getBody()->write($obEndereco);

        return $response;
    }

    public function deleteAddressById(Request $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $id = $args['id'];
        $obEndereco = json_encode($this->obEndereco->delete($id) ?? ['error' => "Não foi possível deletar endereço"]);
        $response->getBody()->write($obEndereco);

        return $response;
    }
}