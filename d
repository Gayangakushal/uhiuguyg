<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="icon" href="img/favicon.png">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap">
    <title>Watchlist | LushLanka</title>
</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <?php
            include "header2.php";
            require "connection.php";

            if (isset($_SESSION["u"])) {
            ?>
                <hr />

                <div class="col-12">
                    <div class="row">
                        <div class="col-12 border border-1 rounded mb-2">
                            <div class="row">
                                <div class="container frame">
                                    <a href="javascript:history.back()" class="btn btn-info back-link text-black">
                                        <i class="bi bi-arrow-left"></i> <b>Back</b></a> <!-- Back Link -->

                                    <div class="col-12">
                                        <label class="form-label fs-1 fw-bolder">Watchlist &hearts;</label>
                                    </div>

                                    <div class="col-12 col-lg-6">
                                        <hr />
                                    </div>

                                    <div class="col-12">
                                        <div class="row">
                                            <div class="offset-lg-2 col-12 col-lg-6 mb-3">
                                                <input type="text" class="form-control" placeholder="Search in Watchlist..." />
                                            </div>
                                            <div class="col-12 col-lg-2 mb-3 d-grid">
                                                <button class="btn btn-primary">Search</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <hr />
                                    </div>

                                    <div class="col-11 col-lg-2 border-0 border-end border-1 border-dark">
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
                                    $watch_rs = Database::search("SELECT * FROM watchlist WHERE user_id='" . $_SESSION["u"]["id"] . "'");
                                    $watch_num = $watch_rs->num_rows;

                                    if ($watch_num == 0) {
                                        echo "<p class='text-center'>No items in the watchlist</p>";
                                    } else {
                                    ?>
                                        <div class="col-12 col-lg-9">
                                            <div class="row">
                                                <?php
                                                for ($x = 0; $x < $watch_num; $x++) {
                                                    $watch_data = $watch_rs->fetch_assoc();
                                                    $product_rs = Database::search("SELECT * FROM product WHERE id='" . $watch_data["product_id"] . "'");
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
                                                                    $clr_rs = Database::search("SELECT * FROM color WHERE color_id='" . $product_data["color_id"] . "'");
                                                                    $clr_data = $clr_rs->fetch_assoc();
                                                                    ?>
                                                                    <span class="fs-5 fw-bold text-light-50">Colour: <?php echo $clr_data["color_name"]; ?></span>
                                                                    &nbsp;&nbsp; | &nbsp;&nbsp;
                                                                    <?php
                                                                    $condition_rs = Database::search("SELECT * FROM condition WHERE id='" . $product_data["Condition_id"] . "'");
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
                        </div>
                    </div>
                </div>
            <?php
            } else {
                header("Location:home.php");
            }
            ?>

           <?php include "footer.php"; ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7HbiX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="bootstrap/js/bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>