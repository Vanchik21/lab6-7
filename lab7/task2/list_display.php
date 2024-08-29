<?php
ob_start();
try {
    $dsn = "mysql:host=localhost;dbname=lab7;charset=utf8";
    $pdo = new PDO($dsn, "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['but_add_item']) && !empty($_POST['item'])) {
        $item = $_POST['item'];
        $sql = "INSERT INTO list_card (item) VALUES (:item)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':item', $item);
        $stmt->execute();
        ob_clean();
    }

    if (isset($_POST['but_deleteUsers']) && !empty($_POST['id_user'])) {
        $id = $_POST['id_user'];
        $sql = "DELETE FROM list_card WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        ob_clean();
    }

    $sql = "SELECT * FROM list_card";
    $result = $pdo->query($sql);
    $menu_items = array();
    if ($result->rowCount() > 0) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $menu_items[] = $row;
        }
    }
    include("list_op.php");
    $content = ob_get_contents();
    ob_clean();
    echo $content;
} catch (PDOException $e) {
    echo "Error adding record: " . $e->getMessage();
}
?>

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
<div>
    <form id="deleteForm" class="mt-4 mx-3 form-inline" action="" method="post">
        <div class="form-group row mb-3">
            <label for="id_user" class="col-auto col-form-label">Id: </label>
            <div class="col-auto">
                <input type="number" class="form-control" id="id_user" name="id_user" placeholder="Id">
            </div>
            <div class="col-auto">
                <button class="btn btn-primary" type="submit" id="but_deleteUsers" name="but_deleteUsers">Delete
                </button>
            </div>
        </div>
    </form>
    <form id="addForm" class="mt-4 mx-3 form-inline" action="" method="post">
        <div class="form-group row mb-3">
            <label for="item" class="col-auto col-form-label">Item: </label>
            <div class="col-auto">
                <input type="text" class="form-control" id="item" name="item" placeholder="Item">
            </div>
            <div class="col-auto">
                <button class="btn btn-primary" type="submit" id="but_add_item" name="but_add_item">Add
                </button>
            </div>
        </div>
    </form>
</div>
</body>
</html>
