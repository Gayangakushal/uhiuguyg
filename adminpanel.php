<?php
session_start();
require "connection.php";

if (isset($_SESSION["a"])) {
    // Fetch most sold products data
    
    
    $products = [];
    $quantities = [];


    $products = json_encode($products);
    $quantities = json_encode($quantities);
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="style2.css" />
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css" />
        <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
        <link rel="icon" href="img/favicon.png" />
        <title>LushLanka - Admin Dashboard</title>
    </head>

    <body class="background-color:dark;">
    <div class="col-12 align-items-start" style="background-color: #343a40; /* Adjust as needed */">
    <!-- Your code -->

   
    <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-2">
                    <div class="row">
                        <div class="col-12 align-items-start bg-dark vh-120">
                            <div class="row g-1 text-center">
                                <div class="col-12 mt-4">
                                    <h4 class="text-white"><?php echo htmlspecialchars($_SESSION["a"]["fname"]); ?></h4>
                                    <hr class="border border-1 border-white" />
                                </div>
                                <div class="nav flex-column nav-pills me-3 mt-3" role="tablist" aria-orientation="vertical">
                                    <nav class="nav flex-column">
                                        <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
                                        <a class="nav-link" href="adminUsers.php">Manage Users</a>
                                        <a class="nav-link" href="adminProduct.php">Manage Products</a>
                                        <a class="nav-link" href="adminStock.php">Manage Stock</a>
                                        <a class="nav-link" href="adminreport.php">Reports</a>
                                    </nav>
                                </div>
                                <div class="col-12 mt-5">
                                    <hr class="border border-1 border-white" />
                                    <h4 class="text-white fw-bold">Selling History</h4>
                                    <hr class="border border-1 border-white" />
                                </div>
                                <div class="col-12 mt-3 d-grid">
                                    <label class="form-label fs-6 fw-bold text-white">From Date</label>
                                    <input type="date" class="form-control" />
                                    <label class="form-label fs-6 fw-bold text-white mt-2">To Date</label>
                                    <input type="date" class="form-control" />
                                    <a href="#" class="btn btn-info mt-2 text-white">Search</a>
                                    <hr class="border border-1 border-white" />
                                    <label class="form-label fs-6 fw-bold text-white">Daily Sellings</label>
                                    <hr class="border border-1 border-white" />
                                    <div class="col-12 col-lg-10 text-end mb-5">
                                        <button class="btn btn-warning me-5" onclick="window.location='adminsignout.php';"><b>Log Out</b></button>
                                        <hr class="border border-1 border-white" />
                                        <div class="text-white mt-2 me-5">Version 1.0</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-10">
                    <div class="row">
                        <div class="text-white fw-bold mb-1 mt-3">
                            <h2 class="fw-bold">Dashboard</h2>
                        </div>
                        <div class="col-12">
                            <hr />
                        </div>
                        <div class="col-12">
                            <div class="row g-1">
                                <div class="col-6 col-lg-4 px-1 shadow">
                                    <div class="row g-1">
                                        <div class="col-12 bg-success text-black text-center rounded" style="height: 100px;">
                                            <br />
                                            <span class="fs-4 fw-bold">Daily Earnings</span>
                                            <br />
                                            <?php
                                            $today = date("Y-m-d");
                                            $thismonth = date("m");
                                            $thisyear = date("Y");

                                            $a = $b = $c = $e = $f = 0;

                                            $invoice_rs = Database::search("SELECT * FROM `invoice`");
                                            $invoice_num = $invoice_rs->num_rows;

                                            for ($x = 0; $x < $invoice_num; $x++) {
                                                $invoice_data = $invoice_rs->fetch_assoc();

                                                $f += $invoice_data["qty"]; // total qty

                                                $d = $invoice_data["date"];
                                                $splitDate = explode(" ", $d); // separate date from time
                                                $pdate = $splitDate[0]; // sold date

                                                if ($pdate == $today) {
                                                    $a += $invoice_data["total"];
                                                    $c += $invoice_data["qty"];
                                                }

                                                $splitMonth = explode("-", $pdate); // separate date as year, month & date
                                                $pyear = $splitMonth[0]; // year
                                                $pmonth = $splitMonth[1]; // month

                                                if ($pyear == $thisyear && $pmonth == $thismonth) {
                                                    $b += $invoice_data["total"];
                                                    $e += $invoice_data["qty"];
                                                }
                                            }
                                            ?>
                                            <span class="fs-5">Rs. <?php echo number_format($a); ?> .00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-4 px-1">
                                    <div class="row g-1">
                                        <div class="col-12 bg-danger text-black text-center rounded" style="height: 100px;">
                                            <br />
                                            <span class="fs-4 fw-bold">Monthly Earnings</span>
                                            <br />
                                            <span class="fs-5">Rs. <?php echo number_format($b); ?> .00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-4 px-1">
                                    <div class="row g-1">
                                        <div class="col-12 bg-warning text-black text-center rounded" style="height: 100px;">
                                            <br />
                                            <span class="fs-4 fw-bold">Today Sellings</span>
                                            <br />
                                            <span class="fs-5"><?php echo $c; ?> Items</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-4 px-1">
                                    <div class="row g-1">
                                        <div class="col-12 bg-info text-black text-center rounded" style="height: 100px;">
                                            <br />
                                            <span class="fs-4 fw-bold">Monthly Sellings</span>
                                            <br />
                                            <span class="fs-5"><?php echo $e; ?> Items</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-4 px-1">
                                    <div class="row g-1">
                                        <div class="col-12 bg-white text-black text-center rounded" style="height: 100px;">
                                            <br />
                                            <span class="fs-4 fw-bold">Total Sellings</span>
                                            <br />
                                            <span class="fs-5"><?php echo $f; ?> Items</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-4 px-1 shadow">
                                    <div class="row g-1">
                                        <div class="col-12 bg-black text-white text-center rounded" style="height: 100px;">
                                            <br />
                                            <span class="fs-4 fw-bold">Total Users</span>
                                            <br />
                                            <?php
                                            $user_rs = Database::search("SELECT * FROM `user`");
                                            $user_num = $user_rs->num_rows;
                                            ?>
                                            <span class="fs-5"><?php echo $user_num; ?> Users</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-12 white">
                            <hr />
                        </div>

                        <div class="col-12 bg-dark">
                            <div class="row">
                                <div class="col-12 col-lg-2 text-center my-3">
                                    <label class="form-label fs-4 fw-bold text-white">Total Active Time</label>
                                </div>
                                <div class="col-12 col-lg-10 text-center my-3">
                                    <?php

                                    $start_date = new DateTime("2025-07-31 00:00:00");

                                    $tdate = new DateTime();
                                    $tz = new DateTimeZone("Asia/Colombo");
                                    $tdate->setTimezone($tz);

                                    $end_date = new DateTime($tdate->format("Y-m-d H:i:s"));

                                    $difference = $end_date->diff($start_date);

                                    ?>
                                    <label class="form-label fs-4 fw-bold text-warning">
                                        <?php

                                        echo $difference->format('%Y') . " Years " . $difference->format('%m') . " Months " .
                                            $difference->format('%d') . " Days " . $difference->format('%H') . " Hours " .
                                            $difference->format('%i') . " Minutes " . $difference->format('%s') . " Seconds ";
                                        ?>
                                    </label>
                                </div>
                            </div>

                        </div>

                        <!-- Chart and Text Section -->
                        <div class="text-center my-5">
                            <h2 class="text-black"><b>Most Sold Products</b></h2>
                            <div style="width: 600px; margin: auto;">
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var ctx = document.getElementById('myChart').getContext('2d');

                var products = <?php echo $products; ?>;
                var quantities = <?php echo $quantities; ?>;

                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: products,
                        datasets: [{
                            label: 'Quantity Sold',
                            data: quantities,
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            });
        </script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="bootstrap/js/bootstrap.bundle.js"></script>
        <script src="script.js"></script>
        <script src="script2.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    </body>

    </html>
<?php
} else {
    echo "Please login first.";
}
?>
