<?php

namespace Source\Models;

class EnderecoModel
{
    /**
     * Id do endereço
     *
     * @var integer
     */
    public int $id;

    /**
     * Endereço
     *
     * @var string
     */
    public string $endereco;

    /**
     * Define a propriedade de ID
     *
     * @param integer $id
     * @return EnderecoModel
     */
    public function setId(int $id): EnderecoModel
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Define a propriedade de endereço
     *
     * @param string $endereco
     * @return EnderecoModel
     */
    public function setEndereco(string $endereco): EnderecoModel
    {
        $this->endereco = $endereco;
        return $this;
    }

    /**
     * Construtor
     *
     * @param integer|null $id
     * @param string|null $endereco
     */
    public function __construct(int $id = null, string $endereco = null)
    {
       $this->id = $id;
       $this->endereco = $endereco;
    }
}
