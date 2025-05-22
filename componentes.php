<?php
function modal($array, $i)
{
    include 'matriz.php';
    if ($array == "filmes") {
        ?>
        <div class="modal fade" id="modal<?= $filmes[$i]["id"] ?>" tabindex="-1"
            aria-labelledby="modalLabel<?= $filmes[$i]["id"] ?>" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content bg-dark text-white">
                    <div class="modal-header border-0">
                        <h5 class="modal-title" id="modalLabel<?= $filmes[$i]["id"] ?>">
                            <?= $filmes[$i]["nome"] ?>
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex flex-column flex-md-row gap-3">
                        <img src="img/<?= $filmes[$i]["id"] ?>.jpg" class="img-fluid rounded" style="max-width: 300px;"
                            alt="<?= $filmes[$i]["nome"] ?>">
                        <div>
                            <p><strong>Gênero:</strong>
                                <?= $filmes[$i]["genero"] ?>
                                <?= !empty($filmes[$i]["genero2"]) ? ' / ' . $filmes[$i]["genero2"] : '' ?>
                            </p>
                            <p><strong>Ano:</strong> <?= $filmes[$i]["ano"] ?></p>
                            <p><strong>Duração:</strong> <?= $filmes[$i]["duracao"] ?></p>
                            <p><strong>Classificação:</strong> <?= $filmes[$i]["classificacao"] ?></p>
                            <p><strong>Produtora:</strong> <?= $filmes[$i]["produtora"] ?></p>
                            <p><strong>Direção:</strong> <?= $filmes[$i]["direcao"] ?></p>
                            <p><strong>Elenco:</strong> <?= $filmes[$i]["elencoPrincipal"] ?></p>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } else if ($array == "series") {
        ?>
            <div class="modal fade" id="modal<?= $series[$i]["id"] ?>" tabindex="-1"
                aria-labelledby="modalLabel<?= $series[$i]["id"] ?>" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content bg-dark text-white">
                        <div class="modal-header border-0">
                            <h5 class="modal-title" id="modalLabel<?= $series[$i]["id"] ?>">
                            <?= $series[$i]["nome"] ?>
                            </h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body d-flex flex-column flex-md-row gap-3">
                            <img src="img/<?= $series[$i]["id"] ?>.jpg" class="img-fluid rounded" style="max-width: 300px;"
                                alt="<?= $series[$i]["nome"] ?>">
                            <div>
                                <p><strong>Gênero:</strong>
                                <?= $series[$i]["genero"] ?>
                                <?= !empty($series[$i]["genero2"]) ? ' / ' . $series[$i]["genero2"] : '' ?>
                                </p>
                                <p><strong>Ano:</strong> <?= $series[$i]["ano_de_inicio"] ?> -
                                <?= $series[$i]["ano_de_encerramento"] ?>
                                </p>
                                <p><strong>Temporadas:</strong> <?= $series[$i]["numero_de_temporadas"] ?></p>
                                <p><strong>Classificação:</strong> <?= $series[$i]["classificacao"] ?></p>
                                <p><strong>Produtora:</strong> <?= $series[$i]["produtora"] ?></p>
                                <p><strong>Direção:</strong> <?= $series[$i]["direcao"] ?></p>
                                <p><strong>Elenco:</strong> <?= $series[$i]["elencoPrincipal"] ?></p>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }
}
function card($array, $i)
{
    include 'matriz.php';
    ?>
    <div class="flex-shrink-0" style="width: calc(100% / 3 - 1rem);">
        <div class="card bg-dark text-white border-0" id="<?= strtolower(str_replace(' ', '-', $array[$i]['nome'])) ?>"
            data-genero="<?= strtolower($array[$i]['genero'] . ' ' . $array[$i]['genero2']) ?>"
            style="position: relative; cursor: pointer;" data-bs-toggle="modal"
            data-bs-target="#modal<?= $array[$i]["id"] ?>">
            <img src="img/<?= $array[$i]["id"] ?>.jpg" class="card-img-top" alt="...">
            <div class="card-img-overlay d-flex flex-column justify-content-end p-2"
                style="background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);">
                <h5 class="card-title mb-1"><?= $array[$i]["nome"] ?></h5>
            </div>
        </div>
    </div>
    <?php

}

