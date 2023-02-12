<?php
    $id = $_GET['id'];
    if (!$id){
        header('Location: /');
    }
    require_once $_SERVER["DOCUMENT_ROOT"].'/src/header.php';
    if (!empty($_POST['coupon_name']) && !empty($_POST['coupon_value']) && !empty($_POST['coupon_category'])){
        $coupon_name = $_POST['coupon_name'];
        $coupon_value = $_POST['coupon_value'];
        $coupon_category = $_POST['coupon_category'];
        $query = "update `discount` set `name` = '".$coupon_name."', `value_discount` = ".$coupon_value.", `id_category` = ".$coupon_category." where `id` = ".$id.";";
        $result = mysqli_query($connection, $query);
    }
    $query = "select `discount`.`id`,`discount`.`name` as 'discount_name', `discount`.`value_discount`, `category`.`id` as 'category_id' from discount, category
    where `discount`.`id_category` = `category`.`id` and `discount`.`id` = ".$id.";";
    $result = mysqli_query($connection, $query);
    $coupon = mysqli_fetch_assoc($result);
?>
    <main>
      <h1>Редактировать купон</h1>
        <form class="all-form" action="" method="POST">
          <div class="form-info">
            <label class="input-form">Название</label>
            <textarea name="coupon_name"> <?= $coupon['discount_name']?> </textarea>
          </div>
          <div class="form-info">
            <label class="input-form">Скидка (в процентах)</label>
            <input type="number" name="coupon_value" value="<?= $coupon['value_discount']?>">
          </div>
          <div class="form-info">
            <label class="input-form">Категория</label>
            <select name="coupon_category">
              <?php foreach($categories as $key=> $category): ?>
                <option value="<?= $category['id']; ?>" <?= $category['id']==$coupon['category_id'] ? "selected" : "" ?>>
                  <?= $category['Name']; ?>
                </option>
              <?php endforeach; ?>
            </select>

          </div>
          <button class="add-coupon" type="submit">Редактировать</button>
        </form>
      </main>
</body>
</html>