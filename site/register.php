<?php

session_start();

$file = file("../files/users/user.txt");


if (isset($_POST)) {
    $username = $_POST['username'];
    $password = $_POST['password'];
}


foreach ($file as $line) {
    $output = explode(":", $line);

    // output[0] == palavra antes do ':'
    // output[1] == palavra depois do ':'
    // Exemplo
    // teste:teste123
    // output[0] == teste && output[1] == teste123

    if (trim($username) == trim($output[0])) {
        header('Location: ' . 'register_view.php');
    }
}

file_put_contents("../files/users/user.txt", $username . ':' . $password . PHP_EOL, FILE_APPEND);

header('Location: ' . 'login_view.php');
