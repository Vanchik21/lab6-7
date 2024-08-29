<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<h2 class="mx-3 mb-3 mt-3">Registration</h2>
<form id="registrationForm" class="mx-3" action="submit.php" method="post">
    <div class="form-group row mb-3">
        <label for="email" class="col-sm-1 col-form-label">Email: </label>
        <div class="col-sm-4">
            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
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
            <button type="submit" class="btn btn-primary" id="button_send" name="button_send">Sign up</button>
        </div>
    </div>
</form>
</body>
</html>
