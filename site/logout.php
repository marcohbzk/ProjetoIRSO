<?php

session_start();
$_SESSION['login'] = false;
header('Location: ' . 'login_view.php');
