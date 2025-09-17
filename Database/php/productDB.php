<?php
$servername = "localhost";
$username   = "root";   
$password   = "";       

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS ProductDB";
if ($conn->query($sql) === TRUE) {
    echo "Database checked/created successfully<br>";
} else {
    die("Error creating database: " . $conn->error);
}


$conn->select_db("ProductDB");


$tableSql = "
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    buying_price DECIMAL(10,2) NOT NULL,
    selling_price DECIMAL(10,2) NOT NULL,
    display ENUM('Yes','No') DEFAULT 'No'
) ENGINE=InnoDB;
";

if ($conn->query($tableSql) === TRUE) {
    echo "Table checked/created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// $conn->close();
?>