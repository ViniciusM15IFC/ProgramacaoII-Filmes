<?php
require_once "ConexaoBD.php";
require_once __DIR__ . "/Util.php";

class SerieDAO
{
    public static function inserir(array $dados)
    {
        $conexao = ConexaoBD::conectar();

        // Upload da imagem
        $imagem = Util::salvarArquivo();
        if (!$imagem) {
            throw new RuntimeException("Erro ao salvar a imagem da Série.");
        }

        $sql = "INSERT INTO serie 
            (titulo, diretor, ano_inicio, ano_encerramento, elenco, premios, imagem, temporadas, episodios, id_categoria, id_classificacao) 
            VALUES 
            (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        try {
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(1, $dados['titulo']);
            $stmt->bindParam(2, $dados['diretor']);
            $stmt->bindParam(3, $dados['ano_inicio']);
            $stmt->bindParam(4, $dados['ano_encerramento']);
            $stmt->bindParam(5, $dados['elenco']);
            $stmt->bindParam(6, $dados['premios']);
            $stmt->bindParam(7, $imagem);
            $stmt->bindParam(8, $dados['temporadas']);
            $stmt->bindParam(9, $dados['episodios']);
            $stmt->bindParam(10, $dados['categoria']);      // id_categoria
            $stmt->bindParam(11, $dados['classificacao']);   // id_classificacao
            $stmt->execute();
        } catch (PDOException $e) {
            error_log("Erro ao inserir série: " . $e->getMessage());
            throw $e;
        }
    }

    public static function consultar(): array
    {
        $conexao = ConexaoBD::conectar();
        $sql = "SELECT * FROM serie ORDER BY titulo ASC";
        $stmt = $conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
    }
}
