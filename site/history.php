<?php
session_start();
if (!$_SESSION['login']) {
    header('Location: ' . 'login_view.php');
}
?>
<html>

<head>
    <title>Historico Sensores</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="30">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://kit.fontawesome.com/969e538b19.css" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <header class="d-flex justify-content-center py-3">
            <ul class="nav nav-pills">
                <li class="nav-item"><a href="index.php" class="nav-link active" aria-current="page">Home</a></li>
                <li class="nav-item"><a href="tracks/track1/index.php" class="nav-link">Pista 1</a></li>
                <li class="nav-item"><a href="tracks/track2/index.php" class="nav-link">Pista 2</a></li>
                <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
            </ul>
        </header>
    </div>
    <div class="container px-4 py-5">
        <h2 class="pb-2 border-bottom">Historico</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Data</th>
                    <th scope="col">Temperatura (ºC)</th>
                    <th scope="col">Humidade (%)</th>
                    <th scope="col">Energia (kW)</th>
                    <th scope="col">Vento Forte</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $x = 0;
                foreach (file("../files/logs/sensores.txt") as $linha) {
                    $linha = explode(';', $linha); ?>
                    <tr>
                        <th scope="row"><?= $x ?></th>
                        <td><?= $linha[0] ?></td>
                        <td><?= $linha[1] ?></td>
                        <td><?= $linha[2] ?></td>
                        <td><?= $linha[3] ?></td>
                        <td><?= $linha[4] ?></td>
                    </tr>
                <?php $x++; } ?>
            </tbody>
        </table>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/969e538b19.js" crossorigin="anonymous"></script>
</body>

</html>
