<?php
include 'matriz.php';

$busca = strtolower($_GET['q'] ?? '');

$resultados = [];

foreach ($filmes as $filme) {
    if (str_contains(strtolower($filme['nome']), $busca)) {
        $resultados[] = $filme;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Resultados da Busca</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h1>Resultados para "<?= htmlspecialchars($busca) ?>"</h1>

    <?php if (count($resultados) > 0): ?>
        <div class="row">
            <?php foreach ($resultados as $filme): ?>
                <div class="col-md-4 mb-3">
                    <div class="card bg-dark text-white">
                        <img src="img/<?= $filme['id'] ?>.jpg" class="card-img-top" alt="<?= $filme['nome'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $filme['nome'] ?></h5>
                            <p class="card-text"><?= $filme['genero'] ?> - <?= $filme['ano'] ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>Nenhum resultado encontrado.</p>
    <?php endif; ?>
</body>
</html>
