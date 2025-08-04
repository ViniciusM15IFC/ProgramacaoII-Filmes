<?php

class ConexaoBD{
    public static function conectar():PDO{
        $conexao = new PDO("pgsql:host=localhost;dbname=banco_filmes","postgres",
        "postgres");

        return $conexao;
    }
}