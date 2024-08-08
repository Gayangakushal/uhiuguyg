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
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
        
    </head>

    <body class="adminBody">
        <!-- nav bar  -->
        <?php include "adminNavBar.php"; ?>
        <!-- nav bar  -->

        <div class="container">
            <a href="javascript:history.back()" class="btn btn-info back-link">
                <i class="bi bi-arrow-left"></i> <b>Back</b>
            </a>
            <h2 class="text-center animated-header">Reports</h2>

            <div class="report-container">
                <!-- Stock Report -->
                <div class="report-section">
                    <div class="report-title">Stock Report</div>
                    <div class="report-content">
                        <p>View stock levels and product availability.</p>
                        <a href="adminReportStock.php" class="report-link">Go to Stock Report</a>
                    </div>
                </div>

                <!-- Product Report -->
                <div class="report-section">
                    <div class="report-title">Product Report</div>
                    <div class="report-content">
                        <p>Analyze product performance and sales trends.</p>
                        <a href="adminReportProduct.php" class="report-link">Go to Product Report</a>
                    </div>
                </div>

                <!-- User Report -->
                <div class="report-section">
                    <div class="report-title">User Report</div>
                    <div class="report-content">
                        <p>Access comprehensive information on user activities and behaviors.</p>
                        <a href="adminReportUser.php" class="report-link">Go to User Report</a>
                    </div>
                </div>
            </div>

        </div>

        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>

<?php
} else {
    echo ("You are not a Valid Admin");
}
?>
