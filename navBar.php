<?php

include "connection.php";

?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Store</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
</head>

<body onload="loadProduct(0);">

    <!-- nav bar -->
    <?php include "navBar.php"; ?>
    <!-- nav bar  -->

    <!-- basic search  -->
    <div class="container d-flex justify-content-end mt-5">
        <div class="col-3 mt-3">
            <input type="text" class="form-control" placeholder="Search" onkeyup="searchProduct(0);" id="product">
        </div>
        <button class="btn btn-outline-info col-1 mt-3 ms-2" onclick="viewFilter();">Filter</button>
    </div>

    <!-- basic search  -->

    <!-- Advance Search  -->
    <div class="d-none" id="filterId">
        <div class="border border-light rounded-4 mt-4 p-5 col-10 offset-1">
            <div class="row col-12">

                <div class="col-6 ms-auto">
                    <label for="color-select" class="form-label">Color</label>
                    <select name="color" class="bg-dark form-select" id="color">
                        <option value="0">Select Color</option>
                  
                        <?php
                        $rs = Database::search("SELECT * FROM `color`");
                        $num = $rs->num_rows;

                        for ($i = 0; $i < $num; $i++) {
                            $d = $rs->fetch_assoc();
                        ?>

                            <option value="<?php echo $d['color_id']; ?>"><?php echo $d['color_name']; ?></option>
                        <?php
                        }
                        ?>

                        <!-- Add more color options as needed -->
                    </select>
                </div>


                <div class="col-6 ms-auto">
                    <label for="color-select" class="form-label">Category</label>
                    <select name="color" class="bg-dark form-select" id="cat">
                        <option value="0">Select Category</option>

                        <?php
                         $rs2 = Database::search("SELECT * FROM `category`");
                        $num2 = $rs2->num_rows;
                        for ($i = 0; $i < $num2; $i++) {
                            $d2 = $rs2->fetch_assoc();
                            ?>

                            <option value="<?php echo $d2['cat_id']; ?>"><?php echo $d2['cat_name']; ?></option>
                            <?php
                               }  
                            ?>
                                       
                     
                      
                        <!-- Add more color options as needed -->
                    </select>
                </div>
            </div>

            <div class="row col-12 mt-3">
                <div class="col-6 ms-auto">
                    <label for="color-select" class="form-label">Brand</label>
                    <select name="color" class="bg-dark form-select" id="brand">
                        <option value="0">Select Brand</option>
                       

                        <?php
                         $rs3 = Database::search("SELECT * FROM `brand`");
                        $num3 = $rs3->num_rows;
                        for ($i = 0; $i < $num3; $i++) {
                            $d3 = $rs3->fetch_assoc();
                            ?>

                            <option value="<?php echo $d3['brand_id']; ?>"><?php echo $d3['brand_name']; ?></option>
                            <?php
                               }  
                            ?>
                                       


                        <!-- Add more color options as needed -->
                    </select>
                </div>


                <div class="col-6 ms-auto">
                    <label for="color-select" class="form-label">Type</label>
                    <select name="color" class="bg-dark form-select" id="size">
                        <option value="0">Select Type</option>
                     

                        <?php
                         $rs4 = Database::search("SELECT * FROM `size`");
                        $num4 = $rs4->num_rows;
                        for ($i = 0; $i < $num4; $i++) {
                            $d4 = $rs4->fetch_assoc();
                            ?>

                            <option value="<?php echo $d4['size_id']; ?>"><?php echo $d4['size_name']; ?></option>
                            <?php
                               }  
                            ?>




                        <!-- Add more color options as needed -->
                    </select>
                </div>
            </div>

            <div class="mt-4 row col-12">
                <div class="col-5">
                    <input type="text" class="form-control" placeholder="Min Price" id="min" />
                </div>

                <div class="col-5">
                    <input type="text" class="form-control" placeholder="Max Price" id="max" />
                </div>

                <button class="btn btn-outline-info col-2" onclick="advSearchProduct(0);">Search</button>


            </div>

        </div>

    </div>


    <!-- load product  -->

    <div class="row col-10 offset-1" id="pid">



    </div>

    <!-- load product  -->



    <!-- Footer -->
    <div class=" col-12 mt-3">
        <p class="text-center">&copy; 2024 OnlineStore.lk || All Right Reserved</p>
    </div>
    <!-- Footer -->

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>