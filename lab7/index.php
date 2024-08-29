<?php
ob_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username == 'admin' && $password == 'password') {
        echo "<h1>Welcome</h1>";
        include ("user_page.php");
        ob_end_flush();
        exit();
    } else {
        echo "Incorrect username or password!";
    }
}
$messages = ob_get_contents();
ob_end_clean();
echo $messages;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Authentication</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div>
    <h2 class="mx-3 mb-3 mt-3">Authentication</h2>
    <form id="registrationForm" class="mx-3" action="" method="post">
        <div class="form-group row mb-3">
            <label for="username" class="col-sm-1 col-form-label">Name: </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="username" name="username" placeholder="Email">
            </div>
        </div>
        <div class="form-group row mb-3">
            <label for="password" class="col-sm-1 col-form-label">Password: </label>
            <div class="col-sm-4">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-2">
                <button type="submit" class="btn btn-primary" id="button_signIn" name="button_signIn">Sign in</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>
