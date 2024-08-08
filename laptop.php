<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Laptop</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="icon" href="img/favicon.png">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap">

</head>

<body>

    <?php include "header2.php"; ?>
    <hr />

    <div class="text-center mt-4 bg-dark">
        <h1 style="font-size: 3rem; font-family: 'Roboto', sans-serif;">Laptop</h1>
    </div>


    <!-- basic search  -->
    <div class="container d-flex justify-content-end mt-5">
        <div class="col-3 mt-3">
            <input type="text" class="form-control" placeholder="Search" onkeyup="searchProduct(0);" id="product">
        </div>
        <button class="btn btn-outline-info col-1 mt-3 ms-2" onclick="viewFilter();">Filter</button>
    </div>

    <!-- basic search  -->

    <div class="container mt-5">
        <div class="row">
            <?php
            include "connection.php";

            $pageno = isset($_POST["p"]) ? (int)$_POST["p"] : 1;

            $q = "SELECT * FROM stock INNER JOIN product ON stock.product_id = product.id ORDER BY stock.stock_id ASC";
            $rs = Database::search($q);
            $num = $rs->num_rows;
            $results_per_page = 8;
            $num_of_pages = ceil($num / $results_per_page);

            $page_results = ($pageno - 1) * $results_per_page;

            $q2 = $q . " LIMIT $results_per_page OFFSET $page_results";
            $rs2 = Database::search($q2);
            $num2 = $rs2->num_rows;

            if ($num2 == 0) {
                echo "<div class='col-12 text-center'>No Products Here..</div>";
            } else {
                for ($i = 0; $i < $num2; $i++) {
                    $d = $rs2->fetch_assoc();
            ?>
                    <div class="col-md-3 mt-3 d-flex justify-content-center">
                        <div class="card card-custom position-relative bg-body-tertiary border-0 bg-light" style="width: 18rem;">
                            <div class="badge badge-custom">In Stock</div>
                            <div class="badge badge-new">New Arrival</div>
                                <img src="<?php echo $d["path"]; ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-center text-success"><?php echo $d["name"]; ?></h5>
                                <p class="card-text text-center"><?php echo $d["description"]; ?></p>
                                <p class="card-text card-price text-center">Cash Price : Rs. <?php echo $d["price"]; ?> .00</p>
                                <div class="d-grid gap-2">
                                    <button class="btn btn-secondary btn-custom">Add to Cart</button>
                                    <a href="singleProductView.php?s=<?php echo $d["stock_id"]; ?>" class="btn btn-secondary gap-2">
                                        View Product
                                    </a>
                                    <button class="btn btn-info btn-custom">Buy Now / මිලදී ගන්න</button>
                                </div>
                            </div>

                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>

    <script src="bootstrap/js/bootstrap.bundle.js"></script>
    <script src="script.js"></script>
    <script src="script2.js"></script>
</body>

</html>