<?php
require 'config/config.php';

/**
 * write query
 * prepare statment
 * excute
 */

$sql = 'SELECT * FROM products';

$statement = $conn->prepare($sql);

$statement->execute();

$products = $statement->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Product Lists</h1>
    <a href="/add.php">Add Product</a>
    <ul>
        <?php foreach ($products as $product) : ?>
            <li>
                <a href="/edit.php?id=<?= $product['id'] ?>">
                    <?= $product['name'] ?>
                    <a href="delete.php?id=<?= $product['id'] ?>">Delete</a>
                </a>
            </li>
        <?php endforeach ?>
    </ul>
</body>

</html>