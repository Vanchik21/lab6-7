<?php
$pdo = new PDO("mysql:host=localhost;dbname=lab7", "root", "");
$stmt = $pdo->query("SELECT * FROM users_list");
$posts = $stmt->fetchAll(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
    <h1> Add your comment! </h1>
    <form id="registrationForm" class="mx-5 mt-4" action="add.php" method="post">
        <div class="form-group row mb-3">
            <label for="name" class="col-sm-1 col-form-label">Name: </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
            </div>
        </div>
        <div class="form-group row mb-3">
            <label for="text" class="col-sm-1 col-form-label">Text: </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="text" name="text" placeholder="Email">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-2">
                <button type="submit" class="btn btn-primary" id="button_send" name="button_send">Send</button>
            </div>
        </div>
    </form>
</div>
<div class="container mt-5">
    <h2>Other Posts(Click for details)</h2>
    <ul class="list-group">
        <?php foreach ($posts as $post): ?>
            <li class="list-group-item">
                <a href="details.php?post_id=<?= $post['id'] ?>">
                    <?= htmlspecialchars(substr($post['text_note'], 0, 50)) ?>...
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
</body>
</html>
