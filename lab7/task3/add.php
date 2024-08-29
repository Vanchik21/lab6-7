<?php
$pdo = new PDO("mysql:host=localhost;dbname=lab7", "root", "");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $text = $_POST['text'];
    $currentDateTime = date('Y-m-d H:i:s');
    echo $name;

    ob_start();
    echo $text;
    $bufferedText = ob_get_clean();

    echo $currentDateTime;

    $stmt = $pdo->prepare("INSERT INTO users_list (user_name, text_note, time_note) VALUES (?, ?, ?)");
    $stmt->execute([$name, $bufferedText, $currentDateTime]);

    echo "Record added successfully!";
    header("Location: main_page.php");
}

