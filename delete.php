<?php

require "config/config.php";

$id = $_GET['id'];

$sql = 'DELETE FROM products WHERE id=:id';

$statement = $conn->prepare($sql);

$result = $statement->execute([
    ':id' => $id
]);

if ($result) {
    echo "
        <script>
            alert('Delete Complete');
            window.location.href='index.php';
        </script>";
}
