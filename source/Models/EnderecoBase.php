<?php

namespace Source\Models;

use mysqli;
use mysqli_result;

/**
 * Classe utilitária para Modelo Endereco
 */
class EnderecoBase extends EnderecoModel
{
    /**
     * obj de conexão
     *
     * @var mysqli
     */
    private mysqli $obCon;

    /**
     * construtor
     */
    public function __construct()
    {
       $this->obCon = Conexao::get();
    }

    /**
     * Executa uma query
     *
     * @param string $query
     * @return mysqli_result|boolean
     */
    public function exec(string $query)
    {
        return mysqli_query($this->obCon, $query);
    }

    /**
     * Obtém o ID da última query
     *
     * @return integer|string
     */
    public function getIdByLastQuery(): int
    {
        return mysqli_insert_id($this->obCon);
    }
}
