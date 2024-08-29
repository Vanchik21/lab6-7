<?php
$pdo = new PDO("mysql:host=localhost;dbname=lab6", "root", "");

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'add':
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);
            $title = isset($decoded['title']) ? $decoded['title'] : '';
            $content = isset($decoded['content']) ? $decoded['content'] : '';
            $query = $pdo->prepare('INSERT INTO notesapp (title, content) VALUES (:title, :content)');
            $query->execute(['title' => $title, 'content' => $content]);
            echo json_encode(['success' => 'Нотатка успішно додана']);
        }
        break;
    case 'displayNotes':
        header('Content-Type: application/json');
        $sth = $pdo->prepare('SELECT * FROM notesapp');
        $res = $sth->execute();
        $rows = $sth->fetchAll();
        echo json_encode($rows);
        break;
    case
    'delete':
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);
            $id = isset($decoded['id']) ? $decoded['id'] : '';
            $query = $pdo->prepare('DELETE FROM notesapp WHERE id = :id');
            $query->execute(['id' => $id]);
            echo json_encode(['success' => 'Нотатка успішно видалений']);
        }
        break;
    case
    'edit':
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);
            $id = isset($decoded['id']) ? $decoded['id'] : '';
            $title = isset($decoded['title']) ? $decoded['title'] : '';
            $content = isset($decoded['content']) ? $decoded['content'] : '';
            $query = $pdo->prepare('UPDATE notesapp SET title = :title, content = :content WHERE id = :id');
            $query->execute(['id' => $id, 'title' => $title, 'content' => $content]);
            echo json_encode(['success' => 'Нотатки успішно оновлені']);
        }
        break;
}