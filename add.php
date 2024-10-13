<?php

require "config/config.php";

if ($_POST) {
    $name = $_POST['name'];
    $desciption = $_POST['description'];
    $price = $_POST['price'];

    $sql = "INSERT INTO products(name,description,price) VALUES(:name,:description,:price)";

    $statement = $conn->prepare($sql);

    $result = $statement->execute([
        ':name' => $name,
        ':description' => $desciption,
        ':price' => $price,
    ]);

    if ($result) {
        echo "<script>
            alert('Add Complete');
            window.location.href='index.php';
        </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Page</title>
</head>

<body>
    <form action="add.php" method="POST">
        <input type="text" placeholder="Enter Product Name" name="name">
        <input type="text" placeholder="Enter Price" name="price">
        <input type="text" placeholder="Enter Description" name="description">
        <button type="submit">Add Product</button>
    </form>
</body>

</html>