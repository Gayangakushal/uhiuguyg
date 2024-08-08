<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap\css\bootstrap.css">
    <link rel="icon" href="img/favicon.png" />

</head>
<body class="signIn_Body">

<div class="fullscreen-bg">
        <img src="img/1.jpg" class="fullscreen-bg__image" alt="Background Image">
    </div>

    <div class="signIn_Box" id="signInBox">
        <h2 class="text-center">Reset Password</h2>
        
        <input type="hidden" id="vcode" value="<?php echo ($_GET["vcode"]); ?>" />
        <div class="mt-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="np">
        </div>
        <div class="mt-3">
            <label for="confirm_password" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="np2">
        </div>
        <div class="d-none" id="msgDiv">
            <div class="alert" id="msg"></div>
        </div>
        <div class="mt-2">
            <button class="btn btn-info col-12" onclick="resetPassword();">Update</button>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
