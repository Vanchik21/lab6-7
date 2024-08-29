<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Preview</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container my-5 p-3 border shadow-lg bg-white rounded">
    <h1 class="mb-4">Order Preview</h1>
    <?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $product = isset($_SESSION['product']) ? $_SESSION['product'] : 'Unknown';
        echo "<p class='alert alert-success'>Thank you for ordering: $product. Your order has been placed.</p>";
        session_destroy();
    } else {
        $product = isset($_SESSION['product']) ? $_SESSION['product'] : 'Unknown';
        echo "<p class='alert alert-info'>You have selected: $product. Please confirm your order.</p>";
        ?>
        <form action="" method="POST">
            <button type="submit" class="btn btn-primary btn-lg btn-block">Confirm Order</button>
        </form>
        <?php
    }
    ?>
</div>
</body>
</html>
