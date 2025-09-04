<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="js/script.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/logo-preto.png" type="image/x-icon">
    <title>Caribéflix Filmes</title>
</head>
<?php
require_once 'src/FilmesDAO.php';
require_once 'src/CategoriaDAO.php';
$generos = CategoriaDAO::consultar();
$filmes = FilmeDAO::consultar();
require 'componentes.php';

?>

<body>
    <?php include 'header.php'; ?>
    <div class="container mt-5 w-75 m-auto">
        <h3>Todos os Filmes</h3>
        <div class="position-relative sec" id="todos">
            <!-- Botão Esquerda -->
            <button class="btn btn-dark position-absolute top-50 start-0 translate-middle-y z-3"
                onclick="scrollCarousel(-1, 'carousel-todos')" style="opacity: 0.7;">
                &#8249;
            </button>

            <div id="carousel-todos" class="d-flex overflow-hidden gap-3 px-2" style="scroll-behavior: smooth;">
                <?php
                foreach ($filmes as $filme) {
                        card($filme, "filme");
                        modal($filme, "filme");
                    }
                ?>
            </div>
            <!-- Botão Direita -->
            <button class="btn btn-dark position-absolute top-50 end-0 translate-middle-y z-3"
                onclick="scrollCarousel(1, 'carousel-todos')" style="opacity: 0.7;">
                &#8250;
            </button>
        </div>
        <?php
        foreach ($generos as $genero) {
            $filmesPorGenero = FilmeDAO::consultarPorCategoria($genero['id_categoria']);
            if (count($filmesPorGenero) === 0) {
                continue; // Pula gêneros sem filmes
            }
        ?>
        <h3><?= htmlspecialchars($genero['nome_categoria']) ?></h3>
        <div class="position-relative sec" id="<?= htmlspecialchars($genero['nome_categoria']) ?>">
            <!-- Botão Esquerda -->
            <button class="btn btn-dark position-absolute top-50 start-0 translate-middle-y z-3"
                onclick="scrollCarousel(-1, 'carousel-<?= htmlspecialchars($genero['nome_categoria']) ?>')" style="opacity: 0.7;">
                &#8249;
            </button>

            <div id="carousel-<?= htmlspecialchars($genero['nome_categoria']) ?>" class="d-flex overflow-hidden gap-3 px-2" style="scroll-behavior: smooth;">
                <?php
                foreach ($filmesPorGenero as $filme) {
                        card($filme, "filme");
                        modal($filme, "filme");
                    }
                ?>
            </div>
            <!-- Botão Direita -->
            <button class="btn btn-dark position-absolute top-50 end-0 translate-middle-y z-3"
                onclick="scrollCarousel(1, 'carousel-<?= htmlspecialchars($genero['nome_categoria']) ?>')" style="opacity: 0.7;">
                &#8250;
            </button>
        </div>
        <?php
        }
    ?>
    </div>
    <?php include 'footer.php' ?>
</body>

</html>