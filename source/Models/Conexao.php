<?php

namespace Source\Models;

use mysqli;


/**
 * Classe de conexão
 */
final class Conexao
{
    /**
     * Construtor da classe utilitária de conexão
     */
    public static function get()
    {
        return new mysqli('desafioMovaSql', 'rafael', 'Rafinha@123', 'endereco', '3306');
    }

}
