<?php
require_once "ConexaoBD.php";
require_once __DIR__ . "/Util.php";


class FilmeDAO
{
    public static function inserir(array $dados)
    {
        $conexao = ConexaoBD::conectar();

        // Upload da imagem
        $imagem = Util::salvarArquivo();
        if (!$imagem) {
            throw new RuntimeException("Erro ao salvar a imagem do filme.");
        }

        $sql = "INSERT INTO filme 
            (titulo, diretor, ano, elenco, premios, imagem, id_categoria, id_classificacao) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        try {
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(1, $dados['titulo']);
            $stmt->bindParam(2, $dados['diretor']);
            $stmt->bindParam(3, $dados['ano']);
            $stmt->bindParam(4, $dados['elenco']);
            $stmt->bindParam(5, $dados['premios']);
            $stmt->bindParam(6, $imagem);
            $stmt->bindParam(7, $dados['categoria']); // id_categoria no banco
            $stmt->bindParam(8, $dados['classificacao']); // id_classificacao no banco
            $stmt->execute();
        } catch (PDOException $e) {
            error_log("Erro ao inserir filme: " . $e->getMessage());
            throw $e;
        }
    }


    public static function consultar()
    {
        $sql = "SELECT f.*, c.nome_categoria, cl.nome_classificacao
        FROM filme f, categoria c, classificacao cl
        WHERE f.id_categoria = c.id_categoria
        AND f.id_classificacao = cl.id_classificacao;";
        $conexao = ConexaoBD::conectar();
        $resultado = $conexao->query($sql);

        return $resultado->fetchAll(PDO::FETCH_ASSOC);
    }


}
