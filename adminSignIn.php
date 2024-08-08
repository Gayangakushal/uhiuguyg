<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="style2.css" />
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css" />
    <link rel="icon" href="img/favicon.png" />
    <style>
        .adminSignIn_Box {
            border: 2px solid #fff;
            /* White border */
            padding: 20px;
            border-radius: 10px;
            /* Rounded corners */
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
            /* Optional shadow for 3D effect */
            max-width: 400px;
            /* Optional: limits the width of the box */
            margin: 0 auto;
            /* Centers the box horizontally */
            background-color: #000;
            /* Background color to contrast with the white border */
            position: relative;
            /* Allows positioning of the "Forgot Password" link */
        }

        .adminsignInBody {
            background-color: #000;
            /* Optional: Dark background for the whole page */
            color: #fff;
            /* White text color */
            padding: 20px;
            /* Optional: Adds padding around the whole page */
        }

        .btn-link {
            color: #fff;
            /* White text color for links */
        }

        .btn-link:hover {
            color: #ddd;
            /* Light grey color on hover */
        }

        .forgot-password {
            position: absolute;
            top: 20px;
            /* Adjust as needed */
            right: 20px;
            /* Adjust as needed */
            font-size: 0.9rem;
        }

        .back-link {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .form-check-label {
            color: #fff;
            /* White text color for the checkbox label */
        }
    </style>
</head>

<body class="adminsignInBody">

    <div class="adminSignIn_Box">

        <a href="javascript:history.back()" class="btn btn-link back-link">
            <i class="bi bi-arrow-left-circle"></i> Back to Page
        </a>

        <h2 class="text-center text-white"><b>Admin Login</b></h2>

        <div class="mt-3">
            <label for="un" class="text-white"><b>Username :</b></label>
            <input type="text" class="form-control border-white bg-white" placeholder="Ex: Sahan" id="un" />
        </div>

        <div class="mt-3 mb-3">
            <label for="pw" class="text-white"><b>Password :</b></label>
            <div class="input-group">
                <input type="password" class="form-control border-white bg-white" placeholder="Ex: ********" id="pw" />
                <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                    <i class="bi bi-eye" id="eyeIcon"></i>
                </span>
            </div>
            <div class="form-check mt-2">
                <input class="form-check-input" type="checkbox" id="showPassword" />
                <label class="form-check-label" for="showPassword">
                    Show Password
                </label>
            </div>
        </div>

        <div class="d-none" id="msgDiv">
            <div class="alert alert-danger" id="msg"></div>
        </div>

        <div class="mt-4">
            <button class="btn btn-info col-12" onclick="adminSignIn();">Sign In</button>
        </div>

        <a href="forgetPassword.php" class="btn btn-link forgot-password">
            <i class="bi bi-lock"></i> Forgot Password?
        </a>

    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="bootstrap/js/bootstrap.bundle.js"></script>
    <script src="script.js"></script>


</body>

</html>