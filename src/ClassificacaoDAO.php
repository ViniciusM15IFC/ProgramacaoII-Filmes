<?php
require_once "ConexaoBD.php";

class ClassificacaoDAO
{
    public static function consultar()
    {
        $conexao = ConexaoBD::conectar();
        $sql = "SELECT * FROM classificacao";
        $stmt = $conexao->prepare($sql);
        $stmt->execute();
        $classificacoes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $classificacoes;
    }

}