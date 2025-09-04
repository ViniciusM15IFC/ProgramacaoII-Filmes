<header>
    <nav class="navbar navbar-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold titulo" href="index.php">CaribéFlix</a>
            <img class="img-navbar" src="img/logo.png" alt="logo">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasDarkNavbar"
                aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Menu</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Início</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="filmes.php">Ver Filmes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="series.php">Ver Séries</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="form-filme.php">Cadastrar Filme</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="form-serie.php">Cadastrar Série</a>
                        </li>
                    </ul>
                    <form class="d-flex mt-3" role="search" onsubmit="buscar(event)">
                        <input id="searchInput" class="form-control me-2" type="search"
                            placeholder="Buscar filme/série..." aria-label="Search" />
                        <button class="btn btn-success" type="submit">Buscar</button>
                    </form>

                </div>
            </div>
        </div>
    </nav>
</header>