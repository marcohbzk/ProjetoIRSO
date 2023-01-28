<?php
session_start();
if (!$_SESSION['login']) {
    header('Location: ' . 'login_view.php');
}
?>
<html>

<head>
    <title>Pagina inicial</title>
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
                <li class="nav-item"><a href="viewPhoto.php" class="nav-link">Ver foto</a></li>
                <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
            </ul>
        </header>
    </div>
    <div class="container px-4 py-5">
        <h2 class="pb-2 border-bottom">Painel Principal</h2>

        <div class="row row-cols-1 row-cols-md-2 align-items-md-center g-5 py-5">
            <div class="col d-flex flex-column align-items-start gap-2">
                <h3 class="fw-bold">Estatisticas</h3>
                <p class="text-muted">O sistema atualmente armazena todos os dados num historico para facilitar a visualizacao e controlo do sistema</p>
                <a href="history.php" class="btn btn-primary btn-lg">Ver historico</a>
            </div>

            <div class="col">
                <div class="row row-cols-1 row-cols-sm-2 g-4">
                    <div class="col d-flex flex-column gap-2">
                        <div class="feature-icon-small d-inline-flex p-3 align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
                            <i class="fa-solid fa-water"></i>
                        </div>
                        <h4 class="fw-semibold mb-0">Humidade</h4>
                        <p class="text-muted"><?= trim(file_get_contents("../files/global/humidity.txt")) ?>%</p>
                    </div>

                    <div class="col d-flex flex-column gap-2">
                        <div class="feature-icon-small d-inline-flex p-3 align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
                            <i class="fa-solid fa-temperature-low"></i>
                        </div>
                        <h4 class="fw-semibold mb-0">Temperatura</h4>
                        <p class="text-muted"><?= trim(file_get_contents("../files/global/temperature.txt")) ?>C</p>
                    </div>

                    <div class="col d-flex flex-column gap-2">
                        <div class="feature-icon-small d-inline-flex p-3 align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
                            <i class="fa-solid fa-bolt"></i>
                        </div>
                        <h4 class="fw-semibold mb-0">Energia gerada</h4>
                        <p class="text-muted"><?= trim(file_get_contents("../files/global/wind_turbine.txt")) ?>kW</p>
                    </div>

                    <div class="col d-flex flex-column gap-2">
                        <div class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary p-3 bg-gradient fs-4 rounded-3">
                            <i class="fa-solid fa-wind"></i>
                        </div>
                        <h4 class="fw-semibold mb-0">Niveis de vento</h4>
                        <?php if (trim(file_get_contents("../files/global/wind.txt") == "true")) { ?>
                            <p class="text-muted">Vento forte</p>
                        <?php } else { ?>
                            <p class="text-muted">Vento fraco</p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/969e538b19.js" crossorigin="anonymous"></script>
</body>

</html>
