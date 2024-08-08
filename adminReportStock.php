<?php
session_start();
include "connection.php";

if (isset($_SESSION["a"])) {

  $rs = Database::search("SELECT * FROM `stock`
    INNER JOIN `product` ON `stock`.`product_id` = `product`.`id`
    ORDER BY `stock`.`stock_id` ASC");
  $num = $rs->num_rows;

?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Report</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <style>
        body {
            background-color: #121212; /* Dark background */
            color: #e0e0e0; /* Light text color */
            font-family: 'Roboto', sans-serif; /* Font family */
        }
        .container {
            margin-top: 20px;
        }
        .table {
            background-color: #1f1f1f; /* Dark table background */
            color: #e0e0e0; /* Light text color */
            border: 1px solid #333; /* Dark border */
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.6); /* Dark shadow */
            animation: fadeIn 0.5s ease-in-out;
        }
        .table th, .table td {
            border: 1px solid #444; /* Dark borders */
            padding: 10px;
        }
        .table th {
            background-color: #333; /* Darker background for headers */
        }
        .table tr:hover {
            background-color: #444; /* Hover effect */
            transition: background-color 0.3s ease;
        }
        .btn-info {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        img {
            max-width: 25px; /* Adjust image size */
            height: auto;
        }
    </style>
</head>

<body>

<div class="container mt-3">
        <a href="adminreport.php" class="btn btn-info">
            <i class="bi bi-arrow-left"></i> Back
        </a>
    </div>

    <div class="container mt-3" id="printArea">
        <h2 class="text-center mb-4">Stock Report</h2>

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Stock Id</th>
                    <th>Product Name</th>
                    <th>Stock Qty</th>
                    <th>Unit Price</th>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($i = 0; $i < $num; $i++) {
                    $d = $rs->fetch_assoc();
                ?>
                    <tr>
                        <td><?php echo htmlspecialchars($d["stock_id"]); ?></td>
                        <td><?php echo htmlspecialchars($d["name"]); ?></td>
                        <td><?php echo htmlspecialchars($d["qty"]); ?></td>
                        <td><?php echo htmlspecialchars($d["price"]); ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="container d-flex justify-content-end mt-5 mb-5">
        <button class="btn btn-danger col-2" onclick="printDiv();">Print</button>
    </div>

    <script>
        function printDiv() {
            var printContents = document.getElementById("printArea").innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>

</body>

</html>

<?php
} else {
    echo "You are not a valid admin.";
}
?>
