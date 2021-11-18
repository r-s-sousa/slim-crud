<?php

namespace Source\Models;

/**
 * DAO endereço
 */
class Endereco extends EnderecoBase
{
    /**
     * Contrutor DAO endereço
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Função responsável por salvar um endereço no banco de dados
     *
     * @param string $endereco
     * @return EnderecoModel
     */
    public function save(string $endereco): EnderecoModel
    {
        $this->exec("INSERT INTO enderecos (endereco) values ('$endereco');");
        return new EnderecoModel($this->getIdByLastQuery(), $endereco);
    }

    /**
     * Função responsável por atualizar um endereço no banco de dados
     *
     * @param integer $id
     * @param string $endereco
     * @return EnderecoModel|null
     */
    public function update(int $id, string $endereco): ?EnderecoModel
    {
        if(!$this->getAddressById($id)) return null;
        $this->exec("UPDATE enderecos SET id='$id', endereco = '$endereco' WHERE id = '$id'");
        return new EnderecoModel($id, $endereco);
    }

    /**
     * Função responsável por deletar um endereço no banco de dados
     *
     * @param integer $id
     * @return EnderecoModel|null
     */
    public function delete(int $id): ?EnderecoModel
    {
        $obResult = $this->getAddressById($id);
        if(!$obResult) return null;
        $this->exec("DELETE FROM enderecos WHERE id = '$id'");
        return new EnderecoModel($obResult->id, $obResult->endereco);
    }

    /**
     * Função responsável por retornar um endereço a partir de seu ID
     *
     * @param integer $id
     * @return EnderecoModel|null
     */
    public function getAddressById(int $id): ?EnderecoModel
    {
        $result = $this->exec("SELECT * FROM enderecos WHERE id = '$id';")->fetch_object();
        if (!$result) return null;
        return new EnderecoModel($id, $result->endereco);
    }

    /**
     * Função responsável por retornar todos endereços
     *
     * @return array
     */
    public function getAllAndresses(): array
    {
        $obAddress = [];
        $addresses = $this->exec("SELECT * FROM enderecos;")->fetch_all(MYSQLI_ASSOC) ?? [];
        foreach ($addresses as $address) {
            $obAddress[] = new EnderecoModel($address['id'], $address['endereco']);
        }
        return $obAddress;
    }
}
