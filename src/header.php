<?php
    require_once $_SERVER["DOCUMENT_ROOT"].'/server/database.php';

    $query_category = "select * from category";
    $result_category = mysqli_query($connection, $query_category);
    $categories = mysqli_fetch_all($result_category, MYSQLI_ASSOC);

    if (!empty($_COOKIE['id'])){
        $query_user = "select `login` from `user` where `id` = ".$_COOKIE['id'].";";
        $result_user = mysqli_query($connection, $query_user);
        $users = mysqli_fetch_assoc($result_user);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/src/css/reseter.css">
    <link rel="stylesheet" href="/src/css/header.css">
    <link rel="stylesheet" href="/src/css/style.css">
    <link rel="stylesheet" href="/src/css/coupon_add.css">
    <title>Coupon</title>
</head>
<body>
    <header>
        <div class="header-first-line">
            <a href="/index.php"><img class="logo-img" src="/src/img/logo.png" alt="" width="150" height="38"></a>
            <div class="search">
                <input class="input-field" type="text" placeholder="Type">
                <button type="submit" class="searchButton"></button>
            </div>
            <div class="header_menu">
                <img class="photo-lk" src="/src/img/lk.png" alt="" width="38" height="38">
                <ul class="header-menu-list">
                    <?php if (!empty($_COOKIE['id'])) { ?>
                        <li class="header-menu-item"><a href="/lk/"><?php echo $users["login"];?></a></li>
                        <li class="header-menu-item"><a href="/src/logout.php">Выйти</a></li>
                    <?php } else { ?>
                    <li class="header-menu-item"><a href="/auth/">Авторизация</a></li>
                    <li class="header-menu-item"><a href="/reg/">Регистрация</a></li>
                    <?php }?>
                </ul>
            </div>
        </div>
        <div class="header_second-line">
          <ul class="category">
              <li class="category-item"><a href="/">Все</a></li>
              <?php foreach ($categories as $category) {?>
                    <li class="category-item"><a href="/discount_category/?id=<?=$category["id"]?>"><?=$category["Name"]?></a></li>
                <?php } ?>
          </ul>
          <a class="add-coupon" href="/add/">Добавить купон</a>
        </div>
    </header>