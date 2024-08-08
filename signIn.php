<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">

    <link rel="icon" href="img/favicon.png" />
    <title>LushLanka Online Store</title>
</head>

<body class="signIn_Body">

    <!-- Full Screen Background Image -->
    <div class="fullscreen-bg">
        <img src="img/1.jpg" class="fullscreen-bg__image" alt="Background Image">
    </div>

    <!-- Sign In Box -->
    <div class="signIn_Box" id="signInBox">
        <h2 class="text-center"><b>Sign In</b></h2>

        <?php
        $username = isset($_COOKIE["username"]) ? $_COOKIE["username"] : "";
        $password = isset($_COOKIE["password"]) ? $_COOKIE["password"] : "";
        ?>

        <div class="mt-3">
            <label for="un" class="form-label">Username :</label>
            <input type="text" class="form-control" id="un" value="<?php echo $username ?>" />
        </div>

        <div class="mt-2">
            <label for="pw" class="form-label">Password :</label>
            <input type="password" class="form-control" id="pw" value="<?php echo $password ?>" />
        </div>

        <div class="mt-2 mb-2">
            <input type="checkbox" class="form-check-input" id="rm" />
            <label for="rm" class="form-label">Remember Me</label>
        </div>

        <div class="d-none" id="msgDiv2">
            <div class="alert alert-danger" id="msg2"></div>
        </div>

        <div class="mt-2">
            <button class="btn btn-warning col-12" onclick="signIn();">
                Sign In
            </button>
        </div>

        <div class="mt-2">
            <a href="forgetPassword.php"><button class="btn btn-outline-info btn-sm col-12">Forget Password</button></a>
        </div>

        <div class="mt-2">
            <button class="btn btn-outline-primary col-12" onclick="changeView();">New to LushLanka.LK ? Please Sign Up</button>
        </div>
    </div>
    <!-- Sign In Box -->

    <!-- Sign Up Box -->
    <div class="signUp_Box d-none" id="signUpBox">
        <h2 class="text-center"><b>Sign Up</b></h2>

        <div class="row">
            <div class="mt-3 col-6">
                <label for="fname" class="form-label">First Name :</label>
                <input type="text" class="form-control" id="fname" />
            </div>

            <div class="mt-3 col-6">
                <label for="lname" class="form-label">Last Name :</label>
                <input type="text" class="form-control" id="lname" />
            </div>
        </div>

        <div class="mt-2">
            <label for="email" class="form-label">Email :</label>
            <input type="email" class="form-control" id="email" />
        </div>

        <div class="mt-2">
            <label for="mobile" class="form-label">Mobile :</label>
            <input type="text" class="form-control" id="mobile" />
        </div>

        <div class="mt-2">
            <label for="username" class="form-label">Username :</label>
            <input type="text" class="form-control" id="username" />
        </div>

        <div class="mt-2 mb-3">
            <label for="password" class="form-label">Password :</label>
            <input type="password" class="form-control" id="password" />
        </div>

        <div class="d-none" id="msgDiv1">
            <div class="alert alert-danger" id="msg1"></div>
        </div>

        <div class="mt-3">
            <button class="btn btn-primary col-12" onclick="signUp();">Sign Up</button>
        </div>

        <div class="mt-2">
            <button class="btn btn-outline-warning col-12" onclick="changeView();">Already Have an Account? Please Sign In</button>

             
        </div>
       
    </div> 
    <!-- footer -->
             <div class="col-12 fixed-bottom d-none d-lg-block">
                <p class="text-center">&copy; 2024 NovoNex Software Solutions || All Rights Reserved</p>
            </div>
            <!-- footer -->
    <!-- Sign Up Box -->

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>