<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Notes App</title>
    <script src="js/asyncNotes.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<h2 class="mx-3 mb-3 mt-3">Add notes</h2>
<form id="notesAdd" class="mx-3" action="">
    <div class="form-group row mb-3">
        <label for="title" class="col-sm-1 col-form-label">Title: </label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="title" name="title" placeholder="Title">
        </div>
    </div>
    <div class="form-group row mb-3">
        <label for="content" class="col-sm-1 col-form-label">Content: </label>
        <div class="col-sm-4">
            <input type="email" class="form-control" id="content" name="content" placeholder="Email">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-2">
            <button type="submit" class="btn btn-primary" id="button_add_notes" name="button_add_notes">Add notes
            </button>
        </div>
    </div>
</form>
<h2 class="mx-3 mb-3 mt-3">Update note</h2>
<form id="notesUpdate" class="mx-3" action="">
    <div class="form-group row mb-3">
        <label for="id_notes_update" class="col-sm-1 col-form-label">ID: </label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="id_notes_update" name="id_notes_update" placeholder="ID">
        </div>
    </div>
    <div class="form-group row mb-3">
        <label for="title_update" class="col-sm-1 col-form-label">Title: </label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="title_update" name="title_update" placeholder="Title">
        </div>
    </div>
    <div class="form-group row mb-3">
        <label for="content_update" class="col-sm-1 col-form-label">Content: </label>
        <div class="col-sm-4">
            <input type="email" class="form-control" id="content_update" name="content_update" placeholder="Email">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-2">
            <button type="submit" class="btn btn-primary" id="button_update_notes" name="button_update_notes">Update notes
            </button>
        </div>
    </div>
</form>
<h2 class="mx-3 mb-3 mt-3">Delete note</h2>
<form id="deleteNote" class="mt-4 mx-3 form-inline" action="">
    <div class="form-group row mb-3">
        <label for="id_notes_delete" class="col-auto col-form-label">ID: </label>
        <div class="col-auto">
            <input type="number" class="form-control" id="id_notes_delete" name="id_notes_delete" placeholder="Id">
        </div>
        <div class="col-auto">
            <button class="btn btn-primary" type="button" id="but_delete_notes" name="but_delete_notes">Delete
            </button>
        </div>
    </div>
</form>
<div>
    <div class="d-grid gap-1 col-1 mx-3 mt-3">
        <button class="btn btn-primary" type="button" id="but_listNotes" name="but_listNotes">List users</button>
    </div>
    <div class="d-grid mx-3 mt-3" id="listNotes"></div>
</div>

<script>

</script>
</body>
</html>