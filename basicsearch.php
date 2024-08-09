<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="icon" href="img/favicon.png">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap">
    <style>
        body {
            background-color: #212529;
            /* Dark background for the body */
        }

        .card-custom {
            border-radius: 15px;
            overflow: hidden;
            transition: transform 0.3s ease;
            position: relative;
        }

        .card-custom:hover {
            transform: scale(1.05);
        }

        .badge-custom,
        .badge-new {
            position: absolute;
            top: 10px;
            left: 10px;
            z-index: 10;
            padding: 0.5rem 1rem;
            /* Adjust padding to make badges shorter */
            font-size: 0.75rem;
            /* Adjust font size */
        }

        .badge-new {
            background-color: #28a745;
            color: white;
            border-radius: 0.5rem;
            /* Rounded corners */
        }

        .badge-custom {
            background-color: #17a2b8;
            color: white;
            border-radius: 0.5rem;
            /* Rounded corners */
        }

        .product-card-container {
            margin-top: 30px;
        }

        .btn-custom {
            border-radius: 20px;
        }

        .header-title {
            font-size: 3rem;
            font-family: 'Roboto', sans-serif;
            color: #f8f9fa;
        }

        .search-container input {
            border-radius: 20px;
        }

        .search-container button {
            border-radius: 20px;
        }

        .back-button {
            font-size: 1.5rem;
            color: #f8f9fa;
            text-decoration: none;
            margin-top: 20px;
            display: flex;
            align-items: center;
        }

        .back-button i {
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <?php include "header2.php"; ?>
    <hr />

    <?php
    require "connection.php";

    $cat_id = $_GET["id"];
    $category_rs = Database::search("SELECT * FROM category WHERE id='" . $cat_id . "'");
    $category_data = $category_rs->fetch_assoc();
    $category_name = $category_data["cat_name"];
    ?>

    <div class="container">
        <a href="javascript:history.back()" class="back-button">
            <i class="bi bi-arrow-left-circle"></i> Back
        </a>
    </div>

    <div class="text-center mt-4">
        <h1 class="header-title"><?php echo htmlspecialchars($category_name); ?></h1>
    </div>


    <div class="container product-card-container">
        <div class="row">
            <?php
            $product_rs = Database::search("SELECT * FROM product WHERE category_id='" . $cat_id . "'");
            $product_num = $product_rs->num_rows;

            for ($i = 0; $i < $product_num; $i++) {
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
                            $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE `product_id`='" . $product_data["id"] . "' AND 
                            `user_id`='" . $_SESSION["u"]["id"] . "'");
                            $watchlist_num = $watchlist_rs->num_rows;

                            if ($watchlist_num == 1) {
                            ?>
                                <button class="col-12 btn btn-outline-light mt-2 border border-primary" onclick='addToWatchlist(<?php echo $product_data["id"]; ?>); '>
                                    <i class="bi bi-heart-fill text-danger fs-5" id="heart<?php echo $product_data["id"]; ?>"></i>
                                </button>
                            <?php
                            } else {
                            ?>
                                <button class="col-12 btn btn-outline-light mt-2 border border-primary" onclick='addToWatchlist(<?php echo $product_data["id"]; ?>); '>
                                    <i class="bi bi-heart-fill text-light fs-5" id="heart<?php echo $product_data["id"]; ?>"></i>
                                </button>
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

    <script src="bootstrap/js/bootstrap.bundle.js"></script>
    <script src="script.js"></script>
    <script src="script2.js"></script>
</body>

</html>
