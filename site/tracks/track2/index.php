<?php
session_start();
if (!$_SESSION['login']) {
    header('Location: ' . 'login_view.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pista 1</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://kit.fontawesome.com/969e538b19.css" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <header class="d-flex justify-content-center py-3">
            <ul class="nav nav-pills">
                <li class="nav-item"><a href="../../index.php" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="../track1/index.php" class="nav-link">Pista 1</a></li>
                <li class="nav-item"><a href="../track2/index.php" class="nav-link active" aria-current="page">Pista 2</a></li>
                <li class="nav-item"><a href="../../viewPhoto.php" class="nav-link">Ver foto</a></li>
                <li class="nav-item"><a href="../../logout.php" class="nav-link">Logout</a></li>
            </ul>
        </header>
    </div>
    <?php
    $file = trim(file_get_contents("../../../files/track2/available.txt"));
    if ($file == "false")
        $img = "../../../files/images/traffic_red.png";
    elseif ($file == "true")
        $img = "../../../files/images/traffic_green.png";
    ?>
    <div class="justify-content-center d-flex">
        <div class="px-4 py-5 my-5 text-center w-50">
            <img class="d-block mx-auto mb-4" src="<?= $img ?>" alt="" style="width:60px">
            <?php
            if (file_get_contents("../../../files/track2/available.txt") == "true")
                echo '<h1 class="display-5 fw-bold text-success">Aberta</h1>';
            else
                echo '<h1 class="display-5 fw-bold text-danger">Fechada</h1>';

            ?>
            <h3>Luz de rua:
                <?php
                if (file_get_contents("../../../files/track2/light.txt") == "2")
                    echo '<span class="text-success">Ligada</span>';
                else
                    echo '<span class="text-danger">Desligada</span>';

                ?>
            </h3>
            <div class="row row-cols-1 row-cols-sm-2 g-4">
                <div class="col d-flex flex-column gap-2">
                    <div class="feature-icon-small p-3 d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
                        <i class="fa-solid fa-gauge"></i>
                    </div>
                    <h4 class="fw-semibold mb-0">Tempo mais recente</h4>
                    <p class="text-muted"><?= file_get_contents("../../../files/track2/latestTime.txt") ?>s</p>
                </div>

                <div class="col d-flex flex-column gap-2">
                    <div class="feature-icon-small d-inline-flex p-3 align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
                        <i class="fa-solid fa-gauge-simple-high"></i>
                    </div>
                    <h4 class="fw-semibold mb-0">Recorde</h4>
                    <p class="text-muted"><?= file_get_contents("../../../files/track2/recordTime.txt") ?>s</p>
                </div>

            </div>
            <div class="container px-4 py-5">
                <h2 class="pb-2 border-bottom">Historico</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Data</th>
                            <th scope="col">Tempo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $x = 0;
                        foreach (file("../../../files/logs/track2.txt") as $linha) {
                            $linha = explode(';', $linha); ?>
                            <tr>
                                <th scope="row"><?= $x ?></th>
                                <td><?= $linha[0] ?></td>
                                <td><?= $linha[1] ?></td>
                            </tr>
                        <?php $x++;
                        } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/969e538b19.js" crossorigin="anonymous"></script>
</body>

</html>
