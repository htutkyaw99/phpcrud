<?php

define('HOST', 'localhost');
define('DBNAME', 'pay');
define('USER', 'root');
define('PASSWORD', 'pass');

$dsn = "mysql:host=" . HOST . ";dbname=" . DBNAME . ";";

$conn = new PDO($dsn, USER, PASSWORD);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// try {
//     if ($conn) {
//         echo "Connected Successfully!";
//     }
// } catch (PDOException $e) {
//     echo $e->getMessage();
// }
