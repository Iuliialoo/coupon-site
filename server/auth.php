<?php
print_r($_POST);

if (!empty($_POST['login']) && !empty($_POST['password'])) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/server/database.php';
    $login = $_POST['login'];
    $password = $_POST['password'];
    $query = "select * from `user` where `login` = '$login' and `password` = '$password';";
    $result = mysqli_query($connection, $query);
    $user = mysqli_fetch_assoc($result);
    if (!empty($user)) {
        setcookie('id', $user['id'], time() + 60 * 60 * 24 * 30, "/");
        // setcookie('login', $user['login'], time() + 60 * 60 * 24 * 30, "/");
        // setcookie('password', $user['password'], time() + 60 * 60 * 24 * 30, "/");
        header('Location: /');
    } else {
        echo 'Неверный логин или пароль';
    }
}

