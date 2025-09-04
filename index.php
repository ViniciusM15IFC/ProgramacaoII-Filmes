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
    <title>Caribéflix</title>
</head>
<?php
include 'componentes.php';
require "src/FilmesDAO.php";
require "src/SeriesDAO.php";
require "src/CategoriaDAO.php";
require "src/CatalogoDAO.php";

$destaquesIndex = [
    [
        "titulo" => "Ainda Estou Aqui",
        "tipo" => "filme",
        "imagem" => "img\ainda-estou-aqui_horizontal.jpg"
    ],
    [
        "titulo" => "Loki",
        "tipo" => "serie",
        "imagem" => "img\loki_horizontal.jpg"
    ],
    [
        "titulo" => "My Little Pony: O Filme",
        "tipo" => "filme",
        "imagem" => "img\my-little-pony-o-filme_horizontal.jpg"
    ],
];

?>

<body>
    <?php include 'header.php' ?>
    <main class="container mt-5 w-75 m-auto">
        <div class="row m-auto container">
            <div id="carousel-destaques" class="carousel slide m-auto" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    $primeiro = true;
                    foreach ($destaquesIndex as $destaqueIndex) {
                        $destaque = CatalogoDAO::consultarUnicoPorTitulo($destaqueIndex["tipo"], $destaqueIndex["titulo"]);
                        $id = $destaqueIndex["tipo"] === "filme" ? $destaque["id_filme"] : $destaque["id_serie"];
                        ?>
                        <div class="carousel-item <?= $primeiro ? 'active' : '' ?>" data-bs-toggle="modal"
                            data-bs-target="#modal<?= $id ?>">
                            <img src="<?= $destaqueIndex["imagem"] ?>" class="d-block w-100 img-destaque" alt="...">
                        </div>
                        <?php
                        modal($destaque, $destaqueIndex["tipo"]);
                        $primeiro = false;
                    }
                    ?>
                </div>

                <!-- Controles do carrossel -->
                <button class="carousel-control-prev" type="button" data-bs-target="#carousel-destaques"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carousel-destaques"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Próximo</span>
                </button>
            </div>


        </div>
        <h3>Lançamentos</h3>
        <div class="position-relative">
            <!-- Botão Esquerda -->
            <button class="btn btn-dark position-absolute top-50 start-0 translate-middle-y z-3"
                onclick="scrollCarousel(-1, 'carousel-lancamentos')" style="opacity: 0.7;">
                &#8249;
            </button>

            <div id="carousel-lancamentos" class="d-flex overflow-hidden gap-3 px-2 sec"
                style="scroll-behavior: smooth;">
                <?php
                $filmes = FilmeDAO::consultarPorAno('>', 2021);
                foreach ($filmes as $filme) {
                    card($filme, "filme");
                    modal($filme, "filme");
                }
                ?>
            </div>
            <!-- Botão Direita -->
            <button class="btn btn-dark position-absolute top-50 end-0 translate-middle-y z-3"
                onclick="scrollCarousel(1, 'carousel-lancamentos')" style="opacity: 0.7;">
                &#8250;
            </button>
        </div>
        <h3>Para toda a Família</h3>
        <div class="position-relative">
            <!-- Botão Esquerda -->
            <button class="btn btn-dark position-absolute top-50 start-0 translate-middle-y z-3"
                onclick="scrollCarousel(-1, 'carousel-lancamentos')" style="opacity: 0.7;">
                &#8249;
            </button>

            <div id="carousel-lancamentos" class="d-flex overflow-hidden gap-3 px-2 sec"
                style="scroll-behavior: smooth;">
                <?php
                $array = CatalogoDAO::consultarPorCondicao('id_classificacao', 1);
                foreach ($array as $item) {
                    card($item, $item['tipo']);
                    modal($item, $item['tipo']);
                }
                ?>
            </div>
            <!-- Botão Direita -->
            <button class="btn btn-dark position-absolute top-50 end-0 translate-middle-y z-3"
                onclick="scrollCarousel(1, 'carousel-lancamentos')" style="opacity: 0.7;">
                &#8250;
            </button>
        </div>
    </main>
</body>
<?php include 'footer.php' ?>

</html>