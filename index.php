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
include 'matriz.php';
include 'componentes.php';


?>

<body class="container mt-5 w-75 m-auto">
    <?php include 'header.php' ?>
    <main>
        <div class="row m-auto container">
            <div id="carousel-destaques" class="carousel slide m-auto" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    $primeiro = true;
                    for ($i = 0; $i < count($filmes); $i++) {
                        for ($i = 0; $i < count($filmes); $i++) {
                            if (in_array($filmes[$i]["id"], $destaques)) {
                                ?>
                                <div class="carousel-item <?= $primeiro ? 'active' : '' ?>" data-bs-toggle="modal"
                                    data-bs-target="#modal<?= $filmes[$i]["id"] ?>">
                                    <img src="img/<?= $filmes[$i]["id"] ?>_horizontal.jpg" class="d-block w-100" alt="...">
                                </div>
                                <?php
                                modal("filmes", $i);
                            }
                        }

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
        <h3>Filmes Premiados</h3>
        <div class="position-relative">
            <!-- Botão Esquerda -->
            <button class="btn btn-dark position-absolute top-50 start-0 translate-middle-y z-3"
                onclick="scrollCarousel(-1, 'carousel-oscar')" style="opacity: 0.7;">
                &#8249;
            </button>

            <!-- Área do carrossel -->
            <div id="carousel-oscar" class="d-flex overflow-hidden gap-3 px-2" style="scroll-behavior: smooth;">
                <?php
                for ($i = 0; $i < count($filmes); $i++) {
                    if (in_array($filmes[$i]["id"], $ganhadoresOscar)) {
                        card($filmes, $i);
                        modal("filmes", $i);
                    }
                }
                ?>
            </div>
            <!-- Botão Direita -->
            <button class="btn btn-dark position-absolute top-50 end-0 translate-middle-y z-3"
                onclick="scrollCarousel(1, 'carousel-oscar')" style="opacity: 0.7;">
                &#8250;
            </button>
        </div>
        <h3>Lançamentos</h3>
        <div class="position-relative">
            <!-- Botão Esquerda -->
            <button class="btn btn-dark position-absolute top-50 start-0 translate-middle-y z-3"
                onclick="scrollCarousel(-1, 'carousel-lancamentos')" style="opacity: 0.7;">
                &#8249;
            </button>

            <div id="carousel-lancamentos" class="d-flex overflow-hidden gap-3 px-2" style="scroll-behavior: smooth;">
                <?php
                for ($i = 0; $i < count($filmes); $i++) {
                    if ($filmes[$i]["ano"] == 2025) {
                        card($filmes, $i);
                        modal("filmes", $i);
                    }
                }
                ?>
            </div>
            <!-- Botão Direita -->
            <button class="btn btn-dark position-absolute top-50 end-0 translate-middle-y z-3"
                onclick="scrollCarousel(1, 'carousel-lancamentos')" style="opacity: 0.7;">
                &#8250;
            </button>
        </div>
        <?php include 'footer.php' ?>
</body>

</html>