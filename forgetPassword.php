<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap\css\bootstrap.css">
    <link rel="icon" href="img/favicon.png" />

    <title>Reset Password</title>
</head>

<body class="signIn_Body">

    <!-- Full Screen Background Image -->
    <div class="fullscreen-bg">
        <img src="img/1.jpg" class="fullscreen-bg__image" alt="Background Image">
    </div>

    <div class="signIn_Box" id="signInBox">
        <h2 class="text-center">Forget Password</h2>

        <div class="mt-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="e">
        </div>

        <div class="d-none" id="msgDiv">
            <div class="alert" id="msg"></div>
        </div>

        <div class="mt-2">
            <button class="btn btn-info col-12" onclick="forgetPassword();">
                <div class="spinner-border text-warning d-none" role="status" id="loader">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <span id="btnText">Send Email</span>
            </button>
        </div>
    </div>

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>