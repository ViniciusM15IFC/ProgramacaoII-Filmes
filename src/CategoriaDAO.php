<?php
require_once "ConexaoBD.php";
require_once __DIR__ . "/Util.php";


class CategoriaDAO
{
    public static function consultar()
    {
        $conexao = ConexaoBD::conectar();
        $sql = "SELECT * FROM categoria";
        $stmt = $conexao->prepare($sql);
        $stmt->execute();
        $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $categorias;
    }

}