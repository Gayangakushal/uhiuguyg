<?php
include "connection.php";
session_start();
$user = $_SESSION["u"];

if (isset($_SESSION["u"])) {

    $rs = Database::search("SELECT * FROM `user` WHERE `id` = '" . $user["id"] . "'");
    $d = $rs->fetch_assoc();
?>

    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profile Page</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap\css\bootstrap.css">
        <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">


    </head>

    <body class="adminBody">
        <!-- nav bar  -->
        <!-- nav bar  -->

        <div class="container mt-5">
            <div class="col-12 bg-dark text-light py-2">
                <a href="index.php" class="text-decoration-none text-light">
                    <i class="bi bi-arrow-left-circle"></i> Back to Page
                </a>
            </div>
            <div class="row">
                 <!-- Back to Page Tab -->
            
                <div class="col-md-4 text-center">
                    <img src="<?php

                                if (!empty($d["img_path"])) {

                                    echo $d["img_path"];
                                } else {
                                    echo ("img\profile img\profile.png");
                                }

                                ?>" class="img-fluid rounded-circle" height="150px" id="i" alt="Profile Image">
                    <div class="mt-3">
                        <label for="profileImage" class="form-label">Profile Image</label>
                        <input type="file" class="form-control" id="imgUploader" />
                        <button class="btn btn-info mt-2 col-12" onclick="uploadImg();">Upload</button>
                    </div>
                </div>

                <div class="col-md-8">
                    <h2 class="text-center"><b>Profile Details</b></h2>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" placeholder="First Name" value="<?php echo isset($d["fname"]) ? $d["fname"] : ''; ?>" id="fname" />
                        </div>
                        <div class="col-md-6">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" placeholder="Last Name" value="<?php echo isset($d["lname"]) ? $d["lname"] : ''; ?>" id="lname" />
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" placeholder="Email" value="<?php echo isset($d["email"]) ? $d["email"] : ''; ?>" id="email" />
                        </div>
                        <div class="col-md-6">
                            <label for="mobile" class="form-label">Mobile</label>
                            <input type="text" class="form-control" placeholder="Mobile" value="<?php echo isset($d["mobile"]) ? $d["mobile"] : ''; ?>" id="mobile" />
                        </div>
                        <div class="col-md-6">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" placeholder="Username" value="<?php echo isset($d["username"]) ? $d["username"] : ''; ?>" disabled />
                        </div>
                        <div class="col-md-6">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" placeholder="Password" value="<?php echo isset($d["password"]) ? $d["password"] : ''; ?>" id="pw" />
                        </div>

                        <h5 class="mt-4"><b>Shipping Address</b></h5>

                        <div class="row mt-3">
                            <div class="col-md-3">
                                <label for="addressNo" class="form-label">No</label>
                                <input type="text" class="form-control" placeholder="No" value="<?php echo isset($d["no"]) ? $d["no"] : ''; ?>" id="no" />
                            </div>
                            <div class="col-md-9">
                                <label for="addressLine1" class="form-label">Line 1</label>
                                <input type="text" class="form-control" placeholder="Line 1" value="<?php echo isset($d["line_1"]) ? $d["line_1"] : ''; ?>" id="line1" />
                            </div>
                            <div class="col-md-12 mt-3">
                                <label for="addressLine2" class="form-label">Line 2</label>
                                <input type="text" class="form-control" placeholder="Line 2" value="<?php echo isset($d["line_2"]) ? $d["line_2"] : ''; ?>" id="line2" />
                            </div>
                        </div>

                        <div class="mt-3 d-flex justify-content-center">
                            <button class="btn btn-info col-md-6" onclick="updateData();">Update</button>
                        </div>

                    </div>
                </div>



            </div>
        </div>

        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    </body>

    </html>

<?php
} else {
    header("location: signIn.php");
}
?>