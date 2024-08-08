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

</head>

<body>
    <div class="col-12">
        <div class="row mt-1 mb-1">
            <div class="offset-lg-1 col-12 col-lg-3 align-self-start mt-2">
                <?php
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }

                if (isset($_SESSION["u"])) {
                    $data = $_SESSION["u"];
                ?>
                    <span class="text-lg-start"><b>Welcome </b><?php echo htmlspecialchars($data["fname"]); ?></span> |
                <?php
                } else {
                ?>
                    <a href="signin.php" class="text-decoration-none fw-bold">Sign In or Register</a> |
                <?php
                }
                ?>
                <span class="text-lg-start fw-bold">Help and Contact</span>
            </div>

            <div class="col-12 col-lg-4 offset-lg-4 align-self-end" style="text-align: center;">
                <div class="row">
                    <div class="col-3 mt-3 md-1">
                        <a href="userprofile.php" class="text-start fw-bold button white-text">
                            <i class="bi bi-person-circle icon-spacing"></i> User Profile
                        </a>
                    </div>
                    <div class="col-2 mt-3">
                        <a href="cart.php" class="text-start fw-bold button white-text">
                            <i class="bi bi-cart-fill icon-spacing"></i> Cart
                        </a>
                    </div>
                    <div class="col-2 mt-3">
                        <a href="orderHistory.php" class="text-start fw-bold button white-text">History</a>
                    </div>
                    <div class="col-3 mt-3 md-2">
                        <a href="#" class="text-start fw-bold button white-text" onclick="signOut();">
                            <i class="bi bi-box-arrow-right icon-spacing"></i> Sign Out
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>