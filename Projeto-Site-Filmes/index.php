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
$filmes = [
    [
        "nome" => "Thunderbolts*",
        "ano" => 2025,
        "genero" => "Ação",
        "duracao" => "2h30m",
        "id" => "thunderbolts",
    ],
    [
        "nome" => "A Fuga das galinhas",
        "ano" => 2017,
        "genero" => "Animação",
        "duracao" => "2h30m",
        "id" => "A_Fuga_das_Galinhas",
    ],
    [
        "nome" => "Ainda Estou Aqui",
        "ano" => 2024,
        "genero" => "Drama",
        "duracao" => "2h30m",
        "id" => "ainda_estou_aqui",
    ],
    [
        "nome" => "My Little Poney: O Filme",
        "ano" => 2017,
        "genero" => "Fantasia",
        "duracao" => "2h30m",
        "id" => "mlpfilme",
    ],
    [
        "nome" => "Cidade de Deus",
        "ano" => 2002,
        "genero" => "Crime/Drama",
        "duracao" => "2h10m",
        "id" => "CidadedeDeus",
    ],
    [
        "nome" => "Conclave",
        "ano" => 2024,
        "genero" => "Thriller/Mistério",
        "duracao" => "2h1",
        "id" => "Conclave",
    ],
    [
        "nome" => "Coraline e o Mundo Secreto",
        "ano" => 2009,
        "genero" => "Infatil/Terror",
        "duracao" => "1h40",
        "id" => "coraline",
    ],
    [
        "nome" => "Deu a Louca na Chapeuzinho",
        "ano" => 2005,
        "genero" => "Infatil/Comédia",
        "duracao" => "1h40",
        "id" => "coraline",
    ],

];

$series = [
    [
        "nome" => "Loki",
        "ano de inicio" => 2023,
        "ano de encerramento" => 2025,
        "genero" => "Ação",
        "numero de temporadas" => 2,
        "id" => "loki",
    ],
    [
        "nome" => "Anne with an E",
        "ano de inicio" => 2017,
        "ano de encerramento" => 2019,
        "genero" => "Drame",
        "numero de temporadas" => 3,
        "id" => "anne",
    ],
];

$destaques = ["thunderbolts", "mlpfilme", "loki"];
$filmesOscar = [];

?>

<body class="container mt-5 w-75 m-auto">
    <header>
        <nav class="navbar navbar-dark fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand fw-bold" href="#">UEEEEEEE</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasDarkNavbar"
                    aria-labelledby="offcanvasDarkNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Dark offcanvas</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Link</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Dropdown
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                        <form class="d-flex mt-3" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                            <button class="btn btn-success" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <h1>Destaques</h1>
        <div class="row m-auto text-center container">
            <div id="carouselFilmes" class="carousel slide m-auto" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    $primeiro = true;
                    for ($i = 0; $i < count($destaques); $i++) {
                        ?>
                        <div class="carousel-item <?= $primeiro ? 'active' : '' ?>">
                            <a href="#<?= $destaques[$i] ?>">
                                <img src="img/<?= $destaques[$i] ?>_horizontal.jpg" class="d-block w-100" alt="...">
                            </a>

                        </div>
                        <?php
                        $primeiro = false;
                    }
                    ?>
                </div>

                <!-- Controles do carrossel -->
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselFilmes"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselFilmes"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Próximo</span>
                </button>
            </div>


        </div>
        <h1>Todos Os Filmes</h1>
        <div class="position-relative">
            <!-- Botão Esquerda -->
            <button class="btn btn-dark position-absolute top-50 start-0 translate-middle-y z-3"
                onclick="scrollCarousel(-1, 'carousel-filmes')" style="opacity: 0.7;">
                &#8249;
            </button>

            <!-- Área do carrossel -->
            <div id="carousel-filmes" class="d-flex overflow-hidden gap-3 px-2" style="scroll-behavior: smooth;">
                <?php foreach ($filmes as $filme): ?>
                    <div class="flex-shrink-0" style="width: calc(100% / 3 - 1rem);">
                        <div class="card bg-dark text-white border-0" id="<?= $filme["id"] ?>" style="position: relative;">
                            <img src="img/<?= $filme["id"] ?>.jpg" class="card-img-top" alt="...">
                            <div class="card-img-overlay d-flex flex-column justify-content-end p-2"
                                style="background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);">
                                <h5 class="card-title mb-1"><?= $filme["nome"] ?></h5>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <!-- Botão Direita -->
            <button class="btn btn-dark position-absolute top-50 end-0 translate-middle-y z-3"
                onclick="scrollCarousel(1, 'carousel-filmes')" style="opacity: 0.7;">
                &#8250;
            </button>
        </div>
        <h1>Todos as Séries</h1>
        <div class="position-relative">
            <!-- Botão Esquerda -->
            <button class="btn btn-dark position-absolute top-50 start-0 translate-middle-y z-3"
                onclick="scrollCarousel(-1, 'carousel-series')" style="opacity: 0.7;">
                &#8249;
            </button>

            <!-- Área do carrossel -->
            <div id="carousel-series" class="d-flex overflow-hidden gap-3 px-2" style="scroll-behavior: smooth;">
                <?php foreach ($series as $serie): ?>
                    <div class="flex-shrink-0" style="width: calc(100% / 3 - 1rem);">
                        <div class="card bg-dark text-white border-0" id="<?= $serie["id"] ?>" style="position: relative;">
                            <img src="img/<?= $serie["id"] ?>.jpg" class="card-img-top" alt="...">
                            <div class="card-img-overlay d-flex flex-column justify-content-end p-2"
                                style="background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);">
                                <h5 class="card-title mb-1"><?= $serie["nome"] ?></h5>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <!-- Botão Direita -->
            <button class="btn btn-dark position-absolute top-50 end-0 translate-middle-y z-3"
                onclick="scrollCarousel(1, 'carousel-series')" style="opacity: 0.7;">
                &#8250;
            </button>
        </div>



</body>

</html>
