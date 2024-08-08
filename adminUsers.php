<?php
session_start();
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
        <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css" />
        <link rel="icon" href="img/favicon.png" />
        <style>
            .frame {
                border: 2px solid #000;
                /* Frame color and thickness */
                padding: 20px;
                border-radius: 10px;
                /* Rounded corners */
                box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
                /* Optional shadow for 3D effect */
            }

            .adminBody {
                padding: 40px 0;
                /* Top and bottom padding */
            }

            .fixed-bottom {
                border-top: 1px solid #ccc;
                /* Optional top border for separation */
            }
        </style>
    </head>

    <body class="adminBody" onload="loadUser();">
        <?php include "adminNavBar.php"; ?>

        <div class="container frame">
            <a href="javascript:history.back()" class="btn btn-info back-link">
                <i class="bi bi-arrow-left"></i> <b>Back</b></a> <!-- Back Link -->

            <h2 class="text-center my-4">User Management</h2>
            <div class="row d-flex justify-content-end mb-4">
                <div class="d-none" id="msgDiv" onclick="reload();">
                    <div class="alert alert-danger" id="msg"></div>
                </div>

                <div class="col-md-4 col-6 mb-2">
                    <input type="text" class="form-control" placeholder="User Id" id="uid" />
                </div>

                <div class="col-md-2 col-6 mb-2">
                    <button class="btn btn-outline-info w-100" onclick="updateUserStatus();">Change Status</button>
                </div>
            </div>

            <div class="table-responsive mt-3">
                <table class="table table-hover table-bordered"> <!-- Added table-bordered class for table frame -->
                    <thead>
                        <tr>
                            <th scope="col">User Id</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody id="tb">
                        <!-- Table rows will be populated here -->
                    </tbody>
                </table>
            </div>
        </div>

        <div class="fixed-bottom text-white bold-1 py-2">
            <p class="text-center mb-0">&copy; 2024 NovoNex Software Solutions || All Rights Reserved</p>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
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
