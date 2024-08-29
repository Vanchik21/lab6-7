<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product = isset($_POST['product']) ? $_POST['product'] : '';
    session_start();
    $_SESSION['product'] = $product;
    header("Location: preview.php", true, 303);
    exit;
}
