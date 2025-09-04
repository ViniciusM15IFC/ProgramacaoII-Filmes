<?php
function modal($array, $tipo)
{
    if ($tipo == "filme") {
        ?>
        <div class="modal fade" id="modal<?= $array["id_filme"] ?>" tabindex="-1"
            aria-labelledby="modalLabel<?= $array["id_filme"] ?>" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content bg-dark text-white">
                    <div class="modal-header border-0">
                        <h5 class="modal-title" id="modalLabel<?= $array["id_filme"] ?>">
                            <?= $array["titulo"] ?>
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex flex-column flex-md-row gap-3">
                        <img src="uploads/<?= htmlspecialchars($array["imagem"]) ?>" class="card-img-top modal-img" alt="<?= htmlspecialchars($array["titulo"]) ?>">
                        <div>
                            <p><strong>Gênero:</strong>
                                <?= $array["nome_categoria"] ?>
                            </p>
                            <p><strong>Ano:</strong> <?= $array["ano"] ?></p>
                            <p><strong>Classificação:</strong> <?= $array["nome_classificacao"] ?></p>
                            <p><strong>Direção:</strong> <?= $array["diretor"] ?></p>
                            <p><strong>Elenco:</strong> <?= $array["elenco"] ?></p>
                            <p><strong>Premios:</strong> <?= $array["premios"] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } else if ($tipo == "serie") {
        ?>
            <div class="modal fade" id="modal<?= $array['id_serie'] ?>" tabindex="-1"
                aria-labelledby="modalLabel<?= $array['id_serie'] ?>" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content bg-dark text-white">
                        <div class="modal-header border-0">
                            <h5 class="modal-title" id="modalLabel<?= $array['id_serie'] ?>">
                            <?= $array["titulo"] ?>
                            </h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body d-flex flex-column flex-md-row gap-3">
                            <img src="uploads/<?= htmlspecialchars($array["imagem"]) ?>" class="card-img-top modal-img" alt="<?= htmlspecialchars($array["titulo"]) ?>">
                            <div>
                                <p><strong>Gênero:</strong>
                                <?= $array["nome_categoria"] ?>
                                </p>
                                <p><strong>Ano:</strong> <?= $array["ano_inicio"] ?> -
                                <?= $array["ano_encerramento"] ?>
                                </p>
                                <p><strong>Temporadas:</strong> <?= $array["temporadas"] ?></p>
                                <p><strong>Classificação:</strong> <?= $array["nome_classificacao"] ?></p>
                                <p><strong>Direção:</strong> <?= $array["diretor"] ?></p>
                                <p><strong>Elenco:</strong> <?= $array["elenco"] ?></p>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }
}
function card($array, $tipo)
{
    if($tipo == "filme") {
        $id = $array["id_filme"];
    }
    else if ($tipo == "serie" )
    {
        $id = $array["id_serie"];
    }
    else
    {
        $id = "Inválido";
    }
    ?>
    <div class="flex-shrink-0" data-bs-toggle="modal" 
     data-bs-target="#modal<?= $id ?>" style="width: calc(100% / 3 - 1rem);">
        <div class="card bg-dark text-white border-0" id="<?= strtolower(str_replace(' ', '-', $array['titulo'])) ?>">
            <img src="uploads/<?= htmlspecialchars($array["imagem"]) ?>" class="card-img-top" alt="<?= htmlspecialchars($array["titulo"]) ?>">
            <div class="card-img-overlay d-flex flex-column justify-content-end p-2"
                style="background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);">
                <h5 class="card-title mb-1"><?= $array["titulo"] ?></h5>
            </div>
        </div>
    </div>
    <?php

}

