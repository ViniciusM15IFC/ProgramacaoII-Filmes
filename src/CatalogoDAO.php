<?php

class CatalogoDAO
{
    public static function consultarUnicoPorId($tipo = 'filme', $id = null)
    {
        $conexao = ConexaoBD::conectar();

        if ($tipo === 'filme') {
            $sql = "SELECT f.*, c.nome_categoria, cl.nome_classificacao
                FROM filme f
                INNER JOIN categoria c ON f.id_categoria = c.id_categoria
                INNER JOIN classificacao cl ON f.id_classificacao = cl.id_classificacao
                WHERE f.id_filme = ?";
        } elseif ($tipo === 'serie') {
            $sql = "SELECT s.*, c.nome_categoria, cl.nome_classificacao
                FROM serie s
                INNER JOIN categoria c ON s.id_categoria = c.id_categoria
                INNER JOIN classificacao cl ON s.id_classificacao = cl.id_classificacao
                WHERE s.id_serie = ?";
        } else {
            // Caso o tipo seja inválido
            return []; // ou `throw new InvalidArgumentException("Tipo inválido: $tipo");`
        }

        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(1, $id, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public static function consultarUnicoPorTitulo($tipo = 'filme', $titulo = null)
    {
        $conexao = ConexaoBD::conectar();

        if ($tipo === 'filme') {
            $sql = "SELECT f.*, c.nome_categoria, cl.nome_classificacao
                FROM filme f
                INNER JOIN categoria c ON f.id_categoria = c.id_categoria
                INNER JOIN classificacao cl ON f.id_classificacao = cl.id_classificacao
                WHERE f.titulo = ?";
        } elseif ($tipo === 'serie') {
            $sql = "SELECT s.*, c.nome_categoria, cl.nome_classificacao
                FROM serie s
                INNER JOIN categoria c ON s.id_categoria = c.id_categoria
                INNER JOIN classificacao cl ON s.id_classificacao = cl.id_classificacao
                WHERE s.titulo = ?";
        } else {
            // Caso o tipo seja inválido
            return []; // ou `throw new InvalidArgumentException("Tipo inválido: $tipo");`
        }

        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(1, $titulo, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public static function consultarPorCondicao($chave, $valor): array
    {
        $conexao = ConexaoBD::conectar();


        $sql = "SELECT 
                    'filme' as tipo, 
                    id_filme as id
                FROM filme 
                WHERE $chave = ?
                
                UNION ALL
                
                SELECT 
                    'serie' as tipo, 
                    id_serie as id
                FROM serie 
                WHERE $chave = ?";

        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(1, $valor);
        $stmt->bindParam(2, $valor);
        $stmt->execute();

        $busca = $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
        $resultado = [];
        foreach ($busca as $item) {
            $conteudo = self::consultarUnicoPorId($item['tipo'], $item['id']);
            if ($conteudo) {
                // ADICIONA MANUALMENTE O TIPO SE PRECISAR
                $conteudo['tipo'] = $item['tipo'];
                $resultado[] = $conteudo;
            }
        }

        return $resultado;
    }
    public static function pesquisar($termo): array
    {
        $conexao = ConexaoBD::conectar();

        $sql = "SELECT 
                'filme' as tipo, 
                f.*, 
                c.nome_categoria, 
                cl.nome_classificacao
                FROM filme f
                INNER JOIN categoria c ON f.id_categoria = c.id_categoria
                INNER JOIN classificacao cl ON f.id_classificacao = cl.id_classificacao
                WHERE f.titulo LIKE ?
            
                UNION ALL
                
                SELECT 
                    'serie' as tipo, 
                    s.*, 
                    c.nome_categoria, 
                    cl.nome_classificacao
                FROM serie s
                INNER JOIN categoria c ON s.id_categoria = c.id_categoria
                INNER JOIN classificacao cl ON s.id_classificacao = cl.id_classificacao
                WHERE s.titulo LIKE ?";

        $stmt = $conexao->prepare($sql);
        $termoBusca = "%$termo%";
        $stmt->bindParam(1, $termoBusca, PDO::PARAM_STR);
        $stmt->bindParam(2, $termoBusca, PDO::PARAM_STR);
        $stmt->execute();

        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];

        return $resultados;
    }
}