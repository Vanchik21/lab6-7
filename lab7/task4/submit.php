<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=lab7", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection error: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_email = $_POST['email'];
    $user_password = $_POST['password'];
    $stmt = $pdo->prepare("SELECT email FROM users WHERE email = ?");
    $stmt->execute([$user_email]);
    if ($stmt->fetch()) {
        echo "A user with this email address is already registered.";
    } else {
        $sql = "INSERT INTO users (email, password) VALUES ( ?, ?)";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$user_email, $user_password])) {
            header("Cache-Control: no-cache, no-store, must-revalidate");
            header("Pragma: no-cache");
            header("Expires: 0");
            header("Location: profile.php?user=$user_email");
            exit;
        } else {
            echo "Registration error.";
        }
    }
}

