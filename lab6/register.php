<?php
function strongPassword($password)
{
    if (strlen($password) < 8) {
        return false;
    }
    if (!preg_match('/[A-Z]/', $password)) {
        return false;
    }
    if (!preg_match('/[a-z]/', $password)) {
        return false;
    }
    if (!preg_match('/[0-9]/', $password)) {
        return false;
    }
    if (!preg_match('/[^A-Za-z0-9]/', $password)) {
        return false;
    }
    return true;
}

$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

if ($contentType === "application/json") {
    $content = trim(file_get_contents("php://input"));

    $decoded = json_decode($content, true);

    if (!is_array($decoded)) {
        $response = array(
            'status' => 'error',
            'message' => 'Помилка: неповні або відсутні дані.'
        );
    } else {
        $name = isset($decoded['name']) ? $decoded['name'] : '';
        $email = isset($decoded['email']) ? $decoded['email'] : '';
        $password = isset($decoded['password']) ? $decoded['password'] : '';

        if (!strongPassword($password)) {
            $response = array(
                'status' => 'error',
                'message' => 'Помилка: Пароль має містити мінімум 8 символів, великі/малі літери, цифри та спеціальні символи.'
            );
        } else {
            try {
                $pdo = new PDO("mysql:host=localhost;dbname=lab6", "root", "");
                $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
                $stmt->bindParam(':email', $email);
                $stmt->execute();
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($user) {
                    $response = array(
                        'status' => 'error',
                        'message' => 'Користувач з такою електронною адресою вже існує.'
                    );
                } else {
                    $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
                    $stmt->bindParam(':name', $name);
                    $stmt->bindParam(':email', $email);
                    $stmt->bindParam(':password', $password);
                    $stmt->execute();

                    $response = array(
                        'status' => 'success',
                        'message' => 'Реєстрація пройшла успішно.'
                    );
                }
            } catch (PDOException $exception) {
                $response = array(
                    'status' => 'error',
                    'message' => 'Помилка: ' . $exception->getMessage()
                );
            }
        }
    }
    echo json_encode($response);
}
