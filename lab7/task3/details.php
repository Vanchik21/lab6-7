<?php
$pdo = new PDO("mysql:host=localhost;dbname=lab7", "root", "");

if (isset($_GET['post_id'])) {
    $postId = $_GET['post_id'];
    $stmt = $pdo->prepare("SELECT * FROM users_list WHERE id = ?");
    $stmt->execute([$postId]);
    $post = $stmt->fetch();

    if ($post) {
        ob_start();
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Post Details</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        </head>
        <body>
        <div class="container mt-4">
            <h1>Post Details</h1>
            <p><strong>Author:</strong> <?= htmlspecialchars($post['user_name']) ?></p>
            <p><strong>Content:</strong> <?= nl2br(htmlspecialchars($post['text_note'])) ?></p>
            <p><strong>Posted on:</strong> <?= $post['time_note'] ?></p>
        </div>
        </body>
        </html>
        <?php
        $output = ob_get_contents();
        ob_end_clean();
        echo $output;
    } else {
        echo "No post found.";
    }
} else {
    echo "No post ID specified.";
}
?>
