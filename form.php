<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Banco de Dados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body class="w-75 m-auto">
    <?php include 'header.php' ?>
    <form action="cadastro.php">
        <h3 class="m-5 text-primary">Formulário das Comidas</h3>
        <div class="mb-3">
            <label for="nomeComida" class="form-label">Comida</label>
            <input type="text" class="form-control" id="nomeTurma" name="nome_comida" required>
        </div>
        <div class="mb-3">
            <label for="curso" class="form-label">Curso</label>
            <select class="form-select" id="curso" name="curso" required>
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
            <label for="quantidadeComida" class="form-label">Quantidade</label>
            <input type="number" class="form-control" id="quantidadeComida" name="quantidade_comida" min="1" required>
        </div>
        <div class="mb-3">
            <label for="valorComida" class="form-label">Valor Unitário</label>
            <input type="number" class="form-control" id="valorComida" name="valor_comida" min="1" step="1" required>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>
</body>

</html>