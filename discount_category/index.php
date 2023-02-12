<?php
    $category_id = $_GET['id'];
    
    require_once $_SERVER["DOCUMENT_ROOT"].'/src/header.php';

    if (!empty($_GET['update_id'])){
        $update_id = $_GET['update_id'];
        $query = "update `discount` set `likes` = `likes` + 1 where `id` = ".$update_id.";";
        $result = mysqli_query($connection, $query);
    }

    if (!empty($_GET['delete_id'])){
        $delete_id = $_GET['delete_id'];
        $query = "delete from `discount` where `id` = ".$delete_id.";";
        $result = mysqli_query($connection, $query);
    }

    $query = "select `discount`.`id`,`discount`.`name` as 'discount_name', `discount`.`value_discount`, `category`.`Name` as 'category_name', `discount`.`likes` as 'likes', `discount`.`img` as 'img' from discount, category
    where `discount`.`id_category` = `category`.`id` and `discount`.`id_category` = ".$category_id.";";
    $result = mysqli_query($connection, $query);
    $coupons = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $count_coupons = "select count(`discount`.`id`) as count from `discount`, `category`
    where `discount`.`id_category` = `category`.`id` and `discount`.`id_category` = ".$category_id.";";
    $result = mysqli_query($connection, $count_coupons);
    $count_coupons = mysqli_fetch_assoc($result);

    $count_likes = "select sum(`discount`.`likes`) as count from `discount`, `category`
    where `discount`.`id_category` = `category`.`id` and `discount`.`id_category` = ".$category_id.";";
    $result = mysqli_query($connection, $count_likes);
    $count_likes = mysqli_fetch_assoc($result);

?>
        <main>
            <?php
                if (empty($coupons)) {
                    echo '<h1>Категория не найдена</h1>';
                }
            ?>
            <div class="coupons">
                <?php 
                    foreach ($coupons as $coupon) {
                    $likes = $coupon["likes"] == null ? 0 : $coupon["likes"];
                    ?>
                    <!-- <pre><?php print_r($coupon);?></pre> -->
                    <div class="coupon-item">
                        <img class="img-coupon" src="/src/img/discount.jpg" alt="" width="240" height="140"/>
                        <div class="info">
                            <p class="name-coupon"><?=$coupon["discount_name"]?></p>
                            <p class="value-coupon"><?=$coupon["value_discount"]?>%</p>
                            <p class="category-coupon"><?=$coupon["category_name"]?></p>
                            <p class="category-likes like"><?=$likes?></p>
                            <a class="like-button" href="/discount_category/?update_id=<?= $coupon['id'] ?>&id=<?= $category_id?>">Лайкнуть</a>
                            <a class="delete-button-main" href="/discount_category/?delete_id=<?= $coupon['id'] ?>&id=<?= $category_id?>">Delete</a>
                            <!-- <a class="like-button" href="/discount_category/?update_id=<?= $coupon['id'] ?>">Лайкнуть</a>
                            <a class="delete-button-main" href="/discount_category/?delete_id=<?= $coupon['id'] ?>">Delete</a> -->
                            <a class="edit_btn" href="/edit/?id=<?=$coupon['id']?>">Редактировать</a>
                        </div>
                    </div>
                <?php }
                ?> 
            </div>
        </main>
    </body>
</html>