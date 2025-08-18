<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastrar Séries</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="w-75 m-auto">
    <form action="actions/cadastro-serie.php" method="post" enctype="multipart/form-data">
        <h3 class="m-5">Formulário das Séries</h3>
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" required>
        </div>
        <div class="mb-3">
            <label for="categoria" class="form-label">Categoria</label>
            <select class="form-select" id="categoria" name="categoria" required>
                <option selected>Selecione</option>
                <?php
                require_once "src/CategoriaDAO.php";
                $categorias = CategoriaDAO::consultar();

                foreach ($categorias as $categoria) {
                    ?>
                    <option value="<?= $categoria['id_categoria'] ?>"><?= $categoria['nome'] ?></option>
                    <?php
                }

                ?>
            </select>
            
        </div>
        <div class="mb-3">
            <label for="diretor" class="form-label">Diretor</label>
            <input type="text" class="form-control" id="diretor" name="diretor" required>
        </div>
        <div class="mb-3">
            <label for="ano_inicio" class="form-label">Ano de Início</label>
            <input type="text" class="form-control" id="ano_inicio" name="ano_inicio" required>
        </div>
        <div class="mb-3">
            <label for="ano_encerramento" class="form-label">Ano de Encerramento</label>
            <input type="text" class="form-control" id="ano_encerramento" name="ano_encerramento" required>
        </div>
        <div class="mb-3">
            <label for="elenco" class="form-label">Elenco</label>
            <input type="text" class="form-control" id="elenco" name="elenco" required>
        </div>
        <div class="mb-3">
            <label for="premios" class="form-label">Prêmios</label>
            <input type="text" class="form-control" id="premios" name="premios" required>
        </div>
        <div class="mb-3">
            <label for="imagem" class="form-label">Imagem</label>
            <input type="file" class="form-control" id="imagem" name="imagem" required>
        </div>
        <div class="mb-3">
            <label for="temporada" class="form-label">Temporadas</label>
            <input type="text" class="form-control" id="temporadas" name="temporadas" required>
        </div>
        <div class="mb-3">
            <label for="episodios" class="form-label">Episódio</label>
            <input type="text" class="form-control" id="episodios" name="episodios" required>
        </div>
        <div class="mb-3">
            <label for="classificacao" class="form-label">Classificação</label>
            <select class="form-select" id="classificacao" name="classificacao" required>
                <option selected>Selecione</option>
                <?php
                    require_once 'src/ClassificacaoDAO.php';
                    $classificacoes = ClassificacaoDAO::consultar();
                    foreach($classificacoes as $classificacao) {
                ?>
                   <option value="<?= $classificacao['id_classificacao'] ?>"><?= $classificacao['nome'] ?></option> 
                <?php
                    }
                ?>
            </select>
        </div>

        <button type="submit" class="btn">Enviar</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>
</body>

</html>