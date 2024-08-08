<?php

session_start();
include "connection.php";

if (isset($_SESSION["a"])) {

?>

    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="style2.css" />
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css" />
        <link rel="icon" href="img/favicon.png" />
        <title>Admin Products | LushLanka</title>

    </head>

    <body class="adminBody">
        <?php
        include "adminNavBar.php";
        ?>

        <div class="container-fluid">
            <a href="javascript:history.back()" class="btn btn-info back-link">
                <i class="bi bi-arrow-left"></i> <b>Back</b>
            </a>
            <div class="row">
                <div class="col-12 col-md-5 offset-md-1">
                    <h2 class="text-center">Product Registration</h2>

                    <div class="mb-3">
                        <label class="form-label" for="pname">Product Name</label>
                        <input id="pname" type="text" class="form-control">
                    </div>

                    <div class="row">
                        <div class="mb-3 col-12 col-md-6">
                            <label class="form-label" for="brand">Brand</label>
                            <select class="form-select" id="brand">
                                <option value="0">Select</option>
                                <?php
                                $rs = Database::search("SELECT * FROM brand");
                                $num = $rs->num_rows;

                                for ($x = 0; $x < $num; $x++) {
                                    $data = $rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo $data['brand_id']; ?>"><?php echo $data['brand_name']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="mb-3 col-12 col-md-6">
                            <label class="form-label" for="cat">Category</label>
                            <select class="form-select" id="cat">
                                <option value="0">Select</option>
                                <?php
                                $rs = Database::search("SELECT * FROM category");
                                $num = $rs->num_rows;

                                for ($x = 0; $x < $num; $x++) {
                                    $data = $rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo $data['cat_id']; ?>"><?php echo $data['cat_name']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="mb-3 col-12 col-md-6">
                            <label class="form-label" for="color">Color</label>
                            <select class="form-select" id="color">
                                <option value="0">Select</option>
                                <?php
                                $rs = Database::search("SELECT * FROM color");
                                $num = $rs->num_rows;

                                for ($x = 0; $x < $num; $x++) {
                                    $data = $rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo $data['color_id']; ?>"><?php echo $data['color_name']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="mb-3 col-12 col-md-6">
                            <label class="form-label" for="size">Size</label>
                            <select class="form-select" id="size">
                                <option value="0">Select</option>
                                <?php
                                $rs = Database::search("SELECT * FROM size");
                                $num = $rs->num_rows;

                                for ($x = 0; $x < $num; $x++) {
                                    $data = $rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo $data['size_id']; ?>"><?php echo $data['size_name']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="desc">Description</label>
                        <textarea class="form-control" rows="5" id="desc"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="file">Upload Image</label>
                        <input type="file" class="form-control" id="file">
                    </div>

                    <div class="d-grid">
                        <button class="btn btn-info" onclick="regProduct();">Register Product</button>
                    </div>
                </div>

                <!-- Stock Update -->
                <div class="col-12 col-md-5">
                    <h2 class="text-center">Stock Update</h2>

                    <div class="mb-3">
                        <label class="form-label" for="selectProduct">Product Name</label>
                        <select class="form-select" id="selectProduct">
                            <?php
                            $rs = Database::search("SELECT * FROM product");
                            $num = $rs->num_rows;

                            for ($i = 0; $i < $num; $i++) {
                                $d = $rs->fetch_assoc();
                            ?>
                                <option value="<?php echo $d['id']; ?>"><?php echo $d['name']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="qty">Qty</label>
                        <input type="text" class="form-control" id="qty" required />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="unitPrice">Unit Price</label>
                        <input type="text" class="form-control" id="uprice" required />
                    </div>

                    <div class="d-grid mb-3">
                        <button class="btn btn-info" onclick="updateStock();">Update Stock</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="fixed-bottom text-white bold-1 py-2">
            <p class="text-center mb-0">&copy; 2024 NovoNex Software Solutions || All Rights Reserved</p>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="bootstrap/js/bootstrap.bundle.js"></script>
        <script src="script.js"></script>

    </body>

    </html>

<?php
} else {
    echo "You are not a Valid Admin";
}
?>