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
        <div class="container frame text-black">
            <a href="javascript:history.back()" class="btn btn-info back-link ">
                <i class="bi bi-arrow-left"></i> <b>Back</b>
            </a>

            <h2 class="text-center animated-text"><b>Product Management</b></h2>

            <div class="row mt-5">
                <!-- Brand Register -->
                <div class="col-4 offset-1 animated-form bordered">
                    <label for="brand" class="form-label">Brand Name :</label>
                    <input type="text" class="form-control mb-3" id="brand" />
                    <div class="d-none" id="msgDiv1" onclick="reload();">
                    <div class="alert alert-danger" id="msg1"></div>
                </div>
                <div class="mt-4 animated-button">
                    <button class="btn btn-outline-info col-12" onclick="brandReg();">Brand Register</button>
                </div>
                </div>
            <!-- Brand Register close -->

            <!-- Category Register -->
            <div class="col-4 offset-2 animated-form bordered">
                <label for="category" class="form-label">Category Name :</label>
                <input type="text" class="form-control mb-3" id="category" />
                <div class="d-none" id="msgDiv2" onclick="reload();">
                    <div class="alert alert-danger" id="msg2"></div>
                </div>
                <div class="mt-4 animated-button">
                    <button class="btn btn-outline-info col-12" onclick="categoryReg();">Category Register</button>
                </div>
            </div>
            <!-- Category Register close -->
        </div>

        <div class="row mt-5">
            <!-- Color Register -->
            <div class="col-4 offset-1 animated-form bordered">
                <label for="color" class="form-label">Color Name :</label>
                <input type="text" class="form-control mb-3" id="color" />
                <div class="d-none" id="msgDiv3" onclick="reload();">
                    <div class="alert alert-danger" id="msg3"></div>
                </div>
                <div class="mt-4 animated-button">
                    <button class="btn btn-outline-info col-12" onclick="colorReg();">Color Register</button>
                </div>
            </div>
            <!-- Color Register close -->

            <!-- Size Register -->
            <div class="col-4 offset-2 animated-form bordered">
                <label for="size" class="form-label">Size Name :</label>
                <input type="text" class="form-control mb-3" id="size" />
                <div class="d-none" id="msgDiv4" onclick="reload();">
                    <div class="alert alert-danger" id="msg4"></div>
                </div>
                <div class="mt-4 animated-button">
                    <button class="btn btn-outline-info col-12" onclick="sizeReg();">Size Register</button>
                </div>
            </div>
            <!-- Size Register close -->
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
    echo ("You are not a Valid Admin");
}
?>