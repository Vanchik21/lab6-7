<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Shop</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-3">
    <h1 class="mb-4">Simple Online Shop</h1>
    <form action="order.php" method="POST">
        <div class="form-group">
            <label for="product">Select a product:</label>
            <select name="product" id="product" class="form-control">
                <option value="book">Book - $10</option>
                <option value="pen">Pen - $2</option>
                <option value="notebook">Notebook - $5</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Place Order</button>
    </form>
</div>
</html>

