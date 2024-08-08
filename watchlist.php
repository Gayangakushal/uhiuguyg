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
    <title>Watchlist | LushLanka</title>
    <style>
        body {
            background-color: #212529;
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
    </style>
</head>

<body>
    <?php
    include "header2.php";
    require "connection.php";

    if (isset($_SESSION["u"])) {
    ?>
        <hr />

        <div class="container mt-4">
            <a href="javascript:history.back()" class="btn btn-info back-link text-black mb-3">
                <i class="bi bi-arrow-left"></i> <b>Back</b>
            </a>

            <div class="text-center">
                <h1 class="header-title">Watchlist &hearts;</h1>
            </div>

            <div class="container d-flex justify-content-end search-container">
                <div class="col-3 mt-3">
                    <input type="text" class="form-control" placeholder="Search in Watchlist..." id="searchWatchlist">
                </div>
                <button class="btn btn-outline-info col-1 mt-3 ms-2" onclick="searchInWatchlist();">Search</button>
            </div>

            <div class="row mt-4">
                <div class="col-lg-2 border-0 border-end border-1 border-dark">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Watchlist</li>
                        </ol>
                    </nav>
                    <nav class="nav nav-pills flex-column">
                        <a class="nav-link active" aria-current="page" href="#">My Watchlist</a>
                        <a class="nav-link" href="cart.php">My Cart</a>
                        <a class="nav-link" href="#">Recents</a>
                    </nav>
                </div>

                <?php
                $watch_rs = Database::search("SELECT * FROM `watchlist` WHERE `user_id`='" . $_SESSION["u"]["id"] . "'");
                $watch_num = $watch_rs->num_rows;

                if ($watch_num == 0) {
                    echo "<p class='text-center'>No items in the watchlist</p>";
                } else {
                ?>
                    <div class="col-lg-10">
                        <div class="row">
                            <?php
                            for ($x = 0; $x < $watch_num; $x++) {
                                $watch_data = $watch_rs->fetch_assoc();
                                $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $watch_data["product_id"] . "'");
                                $product_data = $product_rs->fetch_assoc();
                            ?>
                                <div class="card mb-3 mx-0 mx-lg-2 col-12 text-light">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="<?php echo $product_data["path"]; ?>" class="card-img-top" alt="Product Image">
                                        </div>
                                        <div class="col-md-5">
                                            <div class="card-body">
                                                <h5 class="card-title fs-2 fw-bold text-primary"><?php echo $product_data["name"]; ?></h5>
                                                <?php
                                                $clr_rs = Database::search("SELECT * FROM `color` WHERE `color_id`='" . $product_data["color_id"] . "'");
                                                $clr_data = $clr_rs->fetch_assoc();
                                                ?>
                                                <span class="fs-5 fw-bold text-light-50">Colour: <?php echo $clr_data["color_name"]; ?></span>
                                                &nbsp;&nbsp; | &nbsp;&nbsp;
                                                <?php
                                                $condition_rs = Database::search("SELECT * FROM `condition` WHERE `id`='" . $product_data["id"] . "'");
                                                if ($condition_rs->num_rows > 0) {
                                                    $condition_data = $condition_rs->fetch_assoc();
                                                    $condition_name = $condition_data["name"];
                                                } else {
                                                    $condition_name = "N/A";
                                                }
                                                ?>
                                                <span class="fs-5 fw-bold text-light-50">Condition: <?php echo $condition_name; ?></span>
                                                <br />
                                                <span class="fs-5 fw-bold text-light-50">Price:</span>&nbsp;&nbsp;
                                                <span class="fs-5 fw-bold text-light">Rs. <?php echo $product_data["price"]; ?>.00</span>
                                                <br />
                                                <span class="fs-5 fw-bold text-light-50">Quantity:</span>&nbsp;&nbsp;
                                                <span class="fs-5 fw-bold text-light"><?php echo $product_data["qty"]; ?> Items available</span>
                                                <br />
                                                <span class="fs-5 fw-bold text-light-50">Seller:</span>
                                                <br />
                                                <span class="fs-5 fw-bold text-light">Gayanga</span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mt-5">
                                            <div class="card-body d-lg-grid">
                                                <a href="#" class="btn btn-outline-success mb-2">Buy Now</a>
                                                <a href="#" class="btn btn-outline-warning mb-2">Add to Cart</a>
                                                <a href="#" class="btn btn-outline-danger" onclick='removeFromWatchlist(<?php echo $watch_data["id"]; ?>);'>Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    <?php
    } else {
        header("Location: home.php");
    }
    ?>

    <?php include "footer.php"; ?>

    <script src="bootstrap/js/bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>
