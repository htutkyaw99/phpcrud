<?php

require "config/config.php";

if ($_POST) {
    $name = $_POST['name'];
    $desciption = $_POST['description'];
    $price = $_POST['price'];
    $id = $_POST['id'];

    $sql = "UPDATE products SET name=:name,description=:description,price=:price WHERE id= :id";

    $statement = $conn->prepare($sql);

    $result = $statement->execute([
        ':name' => $name,
        ':description' => $desciption,
        ':price' => $price,
        ':id' => $id
    ]);

    if ($result) {
        echo "<script>
            alert('Edit Complete');
            window.location.href='index.php';
        </script>";
    }
} else {
    $sql = 'SELECT * FROM products WHERE id= :id';
    $statment = $conn->prepare($sql);
    $statment->execute([
        ':id' => $_GET['id']
    ]);
    $product = $statment->fetch(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Page</title>
</head>

<body>
    <form action="edit.php" method="POST">
        <input type="hidden" name="id" value="<?= $product['id'] ?>">
        <input type="text" placeholder="Enter Product Name" name="name" value="<?= $product['name'] ?>">
        <input type="text" placeholder="Enter Price" name="price" value="<?= $product['price'] ?>">
        <input type=" text" placeholder="Enter Description" name="description" value="<?= $product['description'] ?>">
        <button type=" submit">Update Product</button>
    </form>
</body>

</html>