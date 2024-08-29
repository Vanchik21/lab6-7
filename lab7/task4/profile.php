<?php
$usernemail = isset($_GET['user']) ? $_GET['user'] : 'Гість';

header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
</head>
<body>
<h1>Welcome, <?php echo htmlspecialchars($usernemail); ?>!</h1>
<p>It`s your page.</p>
</body>
</html>

