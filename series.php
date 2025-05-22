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
    <title>Caribéflix Séries</title>
</head>
<?php
include 'matriz.php';
include 'componentes.php';

?>

<body class="container mt-5 w-75 m-auto">
    <?php include 'header.php';
    for ($j = 0; $j < count($generos); $j++) {
        ?>
        <h3><?= $generos[$j] ?></h3>
        <div class="position-relative" id="<?= $generos[$j] ?>">
            <!-- Botão Esquerda -->
            <button class="btn btn-dark position-absolute top-50 start-0 translate-middle-y z-3"
                onclick="scrollCarousel(-1, 'carousel-<?= $generos[$j] ?>')" style="opacity: 0.7;">
                &#8249;
            </button>

            <div id="carousel-<?= $generos[$j] ?>" class="d-flex overflow-hidden gap-3 px-2"
                style="scroll-behavior: smooth;">
                <?php
                for ($i = 0; $i < count($series); $i++) {
                    if ($series[$i]["genero"] == $generos[$j] || $series[$i]["genero2"] == $generos[$j]) {
                        card($series, $i);
                        modal("series", $i);
                    }
                }
                ?>
            </div>
            <!-- Botão Direita -->
            <button class="btn btn-dark position-absolute top-50 end-0 translate-middle-y z-3"
                onclick="scrollCarousel(1, 'carousel-<?= $generos[$j] ?>')" style="opacity: 0.7;">
                &#8250;
            </button>
        </div>


        <?php
    }
    ?>
    <h3>Todos as Séries</h3>
    <div class="position-relative" id="todos">
        <!-- Botão Esquerda -->
        <button class="btn btn-dark position-absolute top-50 start-0 translate-middle-y z-3"
            onclick="scrollCarousel(-1, 'carousel-todos')" style="opacity: 0.7;">
            &#8249;
        </button>

        <div id="carousel-todos" class="d-flex overflow-hidden gap-3 px-2" style="scroll-behavior: smooth;">
            <?php
            for ($i = 0; $i < count($series); $i++) {
                card($series, $i);
                modal("series", $i);
            }
            ?>
        </div>
        <!-- Botão Direita -->
        <button class="btn btn-dark position-absolute top-50 end-0 translate-middle-y z-3"
            onclick="scrollCarousel(1, 'carousel-todos')" style="opacity: 0.7;">
            &#8250;
        </button>
    </div>
 <?php include 'footer.php' ?>
</body>

</html>