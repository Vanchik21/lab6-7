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
<div id="divForm">
    <h2 class="mx-3 mb-3 mt-3">Authentication</h2>
    <form id="registrationForm" class="mx-3" action="">
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
                <button type="submit" class="btn btn-primary" id="button_signIn" name="button_signIn">Sign in</button>
            </div>
        </div>
    </form>
</div>
<div id="list" style="display: none">
    <div>
        <div class="d-grid gap-1 col-1 mx-3 mt-3">
            <button class="btn btn-primary" type="button" id="but_listUsers" name="but_listUsers">List users</button>
        </div>
        <div class="d-grid mx-3 mt-3" id="listUser"></div>
    </div>
    <div>
        <form id="deleteForm" class="mt-4 mx-3 form-inline" action="">
            <div class="form-group row mb-3">
                <label for="id_user" class="col-auto col-form-label">Id: </label>
                <div class="col-auto">
                    <input type="number" class="form-control" id="id_user" name="id_user" placeholder="Id">
                </div>
                <div class="col-auto">
                    <button class="btn btn-primary" type="button" id="but_deleteUsers" name="but_deleteUsers">Delete
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div>
        <h5 class="mt-4">Update data: </h5>
        <form id="deleteForm" class="mx-3 form-inline" action="">
            <div class="form-group row mb-3">
                <label for="id_user_update" class="col-sm-1 col-form-label">Id: </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="id_user_update" name="id_user_update" placeholder="Id">
                </div>
            </div>
            <div class="form-group row mb-3">
                <label for="name_update" class="col-sm-1 col-form-label">Name: </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="name_update" name="name_update" placeholder="Name">
                </div>
            </div>
            <div class="form-group row mb-3">
                <label for="email_update" class="col-sm-1 col-form-label">Email: </label>
                <div class="col-sm-4">
                    <input type="email" class="form-control" id="email_update" name="email_update" placeholder="Email">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2">
                    <button type="submit" class="btn btn-primary" id="button_update" name="button_update">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="js/asyncUsers.js" async></script>
</body>
</html><?php
