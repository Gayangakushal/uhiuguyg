<?php

require "connection.php";

$txt = $_POST["search_text"];
$cat_id = $_POST["cat_id"];



if (!empty($txt)) {

 ?>

<div class="row">
    <div class="offset-lg-1 col-12 col-lg-10 text-center">
        <div class="row">

            <?php


        

            $product_rs = Database::search(" SELECT * FROM `product` WHERE `category_id` = '" . $cat_id . "' AND `name` LIKE '%" . $txt . "%'");
            $product_num = $product_rs->num_rows;


            for ($x = 0; $x < $product_num; $x++) {
                $product_data = $product_rs->fetch_assoc();

            ?>

                <div class="col-md-4 mb-4 d-flex justify-content-center">
                    <div class="card card-custom bg-dark text-light border-0" style="width: 18rem;">
                        <img src="<?php echo $product_data["path"]; ?>" class="card-img-top" alt="Product Image">
                        <div class="card-body">
                            <h5 class="card-title text-center text-success"><?php echo $product_data["name"]; ?></h5>
                            <p class="card-text text-center"><?php echo $product_data["description"]; ?></p>
                            <p class="card-text card-price text-center">Cash Price: Rs. <?php echo $product_data["price"]; ?> .00</p>
                            <?php if ($product_data["qty"] > 0) { ?>
                                <div class="d-flex justify-content-center align-items-center badge badge-custom">
                                    <span class="card-text text-white fw-bold">In Stock</span>
                                </div>
                                <div class="d-flex justify-content-center align-items-center">
                                    <span class="card-text text-primary fw-bold"><?php echo $product_data["qty"]; ?> Items Available</span><br /><br />
                                </div>
                                <div class="d-grid gap-2">
                                    <button class="btn btn-secondary btn-custom" onclick="addToCart(<?php echo $product_data['id']; ?>);">Add to Cart</button>
                                    <a href="singleProductView.php?s=<?php echo $product_data["id"]; ?>" class="btn btn-secondary disabled">View Product</a>
                                    <button class="btn btn-info btn-custom">Buy Now / මිලදී ගන්න</button>
                                </div>
                            <?php } else { ?>
                                <div class="d-flex justify-content-center align-items-center badge badge-custom">
                                    <span class="card-text text-white fw-bold">Out Of Stock</span>
                                </div>
                                <div class="d-flex justify-content-center align-items-center">
                                    <span class="card-text text-danger fw-bold">00 Items Available</span><br /><br />
                                </div>
                                <button class="col-12 btn btn-info text-black disabled">Buy Now</button>
                                <button class="col-12 btn btn-dark mt-2 disabled"></button>
                            <?php
                            }
                            

    
                            ?>
                        </div>
                    </div>
                </div>

            <?php

            }
            ?>



        </div>
    </div>
</div>
<?php
}
?>

<?php

if (empty($txt)) {
    
 ?>

<div class="row">
    <div class="offset-lg-1 col-12 col-lg-10 text-center">
        <div class="row">

            <?php



            $product_rs = Database::search(" SELECT * FROM `product` WHERE `category_id` = '" . $cat_id . "'");
            $product_num = $product_rs->num_rows;


            for ($x = 0; $x < $product_num; $x++) {
                $product_data = $product_rs->fetch_assoc();

            ?>

                <div class="col-md-4 mb-4 d-flex justify-content-center">
                    <div class="card card-custom bg-dark text-light border-0" style="width: 18rem;">
                        <img src="<?php echo $product_data["path"]; ?>" class="card-img-top" alt="Product Image">
                        <div class="card-body">
                            <h5 class="card-title text-center text-success"><?php echo $product_data["name"]; ?></h5>
                            <p class="card-text text-center"><?php echo $product_data["description"]; ?></p>
                            <p class="card-text card-price text-center">Cash Price: Rs. <?php echo $product_data["price"]; ?> .00</p>
                            <?php if ($product_data["qty"] > 0) { ?>
                                <div class="d-flex justify-content-center align-items-center badge badge-custom">
                                    <span class="card-text text-white fw-bold">In Stock</span>
                                </div>
                                <div class="d-flex justify-content-center align-items-center">
                                    <span class="card-text text-primary fw-bold"><?php echo $product_data["qty"]; ?> Items Available</span><br /><br />
                                </div>
                                <div class="d-grid gap-2">
                                    <button class="btn btn-secondary btn-custom" onclick="addToCart(<?php echo $product_data['id']; ?>);">Add to Cart</button>
                                    <a href="singleProductView.php?s=<?php echo $product_data["id"]; ?>" class="btn btn-secondary disabled">View Product</a>
                                    <button class="btn btn-info btn-custom">Buy Now / මිලදී ගන්න</button>
                                </div>
                            <?php } else { ?>
                                <div class="d-flex justify-content-center align-items-center badge badge-custom">
                                    <span class="card-text text-white fw-bold">Out Of Stock</span>
                                </div>
                                <div class="d-flex justify-content-center align-items-center">
                                    <span class="card-text text-danger fw-bold">00 Items Available</span><br /><br />
                                </div>
                                <button class="col-12 btn btn-info text-black disabled">Buy Now</button>
                                <button class="col-12 btn btn-dark mt-2 disabled"></button>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>

            <?php

            }
            ?>



        </div>
    </div>
</div>

<?php
}
?>


