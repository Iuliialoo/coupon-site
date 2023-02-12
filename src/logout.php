<?php

setcookie('id', NULL, time() - 60, "/");
// setcookie('login', NULL, time() - 60, "/");
// setcookie('password', NULL, time() - 60, "/");
header('Location: /');
?>