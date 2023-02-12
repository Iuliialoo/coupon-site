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

    <form action="/server/reg.php" method="POST" class="reg_form form hidden" enctype="multipart/form-data">
        <input name="login" type="login" placeholder="Логин"><label for="login"></label>
        <input name="password" type="password" placeholder="Пароль" class="pswd"><label for="password"></label>
        <input name="mail" type="mail" placeholder="почта" id="mail"><label for="mail"></label>
        <button type="submit" class="go_reg">
            Зарегистрироваться
        </button>
        <input name="avatar" type="file" id="avatar">
    </form>

    <a id="registration" href="/auth/">
        Войти
    </a>
</main>
</body>

</html>