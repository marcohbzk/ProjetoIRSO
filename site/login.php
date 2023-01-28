<?php

session_start();


if (isset($_POST)) {
    $username = $_POST['username'];
    $password = $_POST['password'];
}
// TODO: mudar a forma de autenticação para ser por ficheiro

$file = file("../files/users/user.txt");

foreach ($file as $line) {
    $output = explode(":", $line);

    // output[0] == palavra antes do ':'
    // output[1] == palavra depois do ':'
    // Exemplo
    // teste:teste123
    // output[0] == teste && output[1] == teste123

    if (trim($username) == trim($output[0]) && trim($password) == trim($output[1])) {
        $_SESSION['login'] = true;
        break;
    }
    $_SESSION['login'] = false;
}
if ($_SESSION['login']) {
    header('Location: ' . 'index.php');
} else {
    header('Location: ' . 'login_view.php');
}
