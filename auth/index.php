<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/src/header.php';
?>
<main>
    <h1>
        Авторизация
    </h1>

    <?php
    print_r(json_decode($_COOKIE['errors'], true)['error']);
    ?>

    <form action="/server/auth.php" method="POST" class="auth_form form">
        <input name="login" type="login" placeholder="Логин"><label for="login"></label>
        <input name="password" type="password" placeholder="Пароль" class="pswd"><label for="password"></label>
        <button type="submit" class="go_enter">
            Войти
        </button>
    </form>

    <a id="registration" href="/reg/">
        Зарегистрироваться
    </a>
</main>
</body>

</html>