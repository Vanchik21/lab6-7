<?php
$pdo = new PDO("mysql:host=localhost;dbname=lab6", "root", "");

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'displayUsers':
        header('Content-Type: application/json');
        $sth = $pdo->prepare('SELECT * FROM users');
        $res = $sth->execute();
        $rows = $sth->fetchAll();
        echo json_encode($rows);
        break;
    case 'login':
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);
            $email = isset($decoded['email']) ? $decoded['email'] : '';
            $password = isset($decoded['password']) ? $decoded['password'] : '';
            try {
                $query = $pdo->prepare('SELECT * FROM users WHERE email = :email AND password = :password');
                $query->execute(['email' => $email, 'password' => $password]);
                $user = $query->fetch(PDO::FETCH_OBJ);
                if ($user) {
                    echo json_encode($user);
                } else {
                    http_response_code(401);
                    echo json_encode(['error' => 'Неправильна електронна адреса або пароль']);
                }
            } catch (PDOException $e) {
                http_response_code(500);
                echo json_encode(['error' => 'Помилка підключення до бази даних: ' . $e->getMessage()]);
            }
        }
        break;
    case
    'delete':
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);
            $id = isset($decoded['id']) ? $decoded['id'] : '';
            $query = $pdo->prepare('DELETE FROM users WHERE id = :id');
            $query->execute(['id' => $id]);
            echo json_encode(['success' => 'Користувач успішно видалений']);
        }
        break;
    case
    'edit':
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);
            $id = isset($decoded['id']) ? $decoded['id'] : '';
            $email = isset($decoded['email']) ? $decoded['email'] : '';
            $name = isset($decoded['name']) ? $decoded['name'] : '';
            $query = $pdo->prepare('UPDATE users SET name = :name, email = :email WHERE id = :id');
            $query->execute(['id' => $id, 'name' => $name, 'email' => $email]);
            echo json_encode(['success' => 'Дані користувача успішно оновлені']);
        }
        break;
}