<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="style2.css" />
    <link rel="stylesheet" href="style3.css" />

    <link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css" />
    <link rel="icon" href="img/favicon.png" />

</head>

<body>
    <div class="col-12">
        <div class="row mt-2 mb-1">
            <div class="offset-lg-1 col-12 col-lg-3 align-self-start mt-2">
                <?php
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }

                if (isset($_SESSION["u"])) {
                    $data = $_SESSION["u"];
                ?>
                    <span class="text-lg-start"><b>Welcome </b><?php echo htmlspecialchars($data["fname"]); ?></span>
                <?php
                } else {
                ?>
                    <a href="signin.php" class="text-decoration-none fw-bold">Sign In or Register</a>
                <?php
                }
                ?>
            </div>

            <div class="col-12 col-lg-6 offset-lg-2 align-self-end " style="text-align: center; ">
                <div class="row">

                    <div class="col-12 col-lg-2">
                        <button class="btn btn-white  text-start fw-bold" style="font-size: 15px;" aria-current="page"><i class="bi bi-house-door"></i> Home</button>
                    </div>



                    <div class="col-12 col-lg-3">
                        <button class="btn btn-white fw-bold" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop" style="font-size: 15px;">
                            <i class="bi bi-person"></i> My Account</button>





                        <div class="offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title  title01" id="staticBackdropLabel"></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <div>
                                    <div class="text-text-lg-center fw-bold title01">


                                    </div>



                                    <br />
                                    <?php
                                    if (isset($_SESSION["u"])) {
                                        $session_data = $_SESSION["u"];
                                    ?>

                                        <span class="text-text-lg-center fw-bold">Hi,
                                            <?php echo $session_data["fname"]; ?>
                                        </span>

                                        <hr />
                                        <div class="list-group">
                                            <button type="button" class="list-group-item list-group-item-action" onclick="window.location='userprofile.php'">Profile</button>
                                            <button type="button" class="list-group-item list-group-item-action" onclick="window.location='watchlist.php'">Watchlist</button>
                                            <button type="button" class="list-group-item list-group-item-action">Purchased History</button>
                                            <button type="button" class="list-group-item list-group-item-action" onclick="window.location='messages.php'">Messages</button>


                                        </div>

                                        <br />
                                        <hr />
                                        <button class="btn btn-danger text-text-lg-center fw-bold" onclick="signOut();">Sign Out</button>
                                    <?php
                                    } else {
                                    ?>

                                        <hr />


                                        <br />
                                        <hr />
                                        <button class="btn btn-outline-primary fw-bold" onclick="window.location='index.php'">
                                            Sign In or Register
                                        </button>

                                    <?php
                                    }
                                    ?>

                                    <hr />
                                    <br />


                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-12 col-lg-2 ">

                        <button class="btn  btn-white text-start fw-bold" type="button" data-bs-toggle="dropdown" aria-expanded="false" onclick="window.location='cart.php'">
                            <i class="bi bi-cart4"></i> Cart

                        </button>



                    </div>








                    <div class="col-12 col-lg-4 ">
                        <button class="btn btn-white  text-start fw-bold">
                            <i class="bi bi-question-lg"></i> Help and contact</button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="col-12 justify-content-center">
        <div class="row mb-3">
            <div class="offset-4 offset-lg-1 col-4 col-lg-1 logo" style="height: 60px;"></div>
            <div class="col-12 col-lg-6">
                <div class="input-group mt-3 mb-3">
                    <input type="text" class="form-control" aria-label="Text input with dropdown button" id="basic_search_txt">
                    <select class="form-select" style="max-width: 250px;" id="basic_search_select">
                        <option value="0">All Categories</option>

                        <?php
                        require "connection.php";

                        $category_rs = Database::search("SELECT * FROM category");
                        $category_num = $category_rs->num_rows;

                        for ($x = 0; $x < $category_num; $x++) {
                            $category_data = $category_rs->fetch_assoc();

                        ?>

                            <option value="<?php echo $category_data["id"]; ?>"><?php echo $category_data["cat_name"]; ?></option>

                        <?php

                        }

                        ?>

                    </select>
                </div>
            </div>

            <div class="col-12 col-lg-2 d-grid">
                <button class="btn btn-info mt-3 mb-3" onclick="basicSearch(0);">Search</button>
            </div>



            <div class="col-12 col-lg-2 mt-2 mt-lg-3 text-center text-lg-start">
                <a href="advancedSearch.php" class="text-decoration-none text-white link-secondary fw-bold btn btn-outline-success">Advanced</a>
            </div>
            <hr class="border border-1 border-white" />

        </div>

    </div>


    <section class="image-section clearfix">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mt-5 md-3 ms-1 text-center">
                    <div class="gif-player-container">
                        <img src="img/slider images/enjoy a limited time.gif" alt="Main Image" class="img-fluid main-image">
                    </div>
                </div>
            </div>
        </div>
    </section>



    </div>
    <!--site-main end-->



    <!-- carousel -->


    </div>


    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="bootstrap\js\bootstrap.bundle.js"></script>
    <script src="script.js"></script>
    <script src="script2.js"></script>


</body>

</html>