<?php
include("ProductDB.php");


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    
    $result = $conn->query("SELECT * FROM products WHERE id=$id");

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {
        die(" Product not found.");
    }
} else {
    die(" Invalid request.");
}


if (isset($_POST['delete'])) {
    $sql = "DELETE FROM products WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo " Product deleted successfully! <a href='product.php'>Back to Product List</a>";
        exit;
    } else {
        echo "Error deleting product: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Product</title>
</head>
<body>

<h2>Delete Product</h2>
<p><b>Name:</b> <?php echo $product['name']; ?></p>
<p><b>Buying Price:</b> <?php echo $product['buying_price']; ?></p>
<p><b>Selling Price:</b> <?php echo $product['selling_price']; ?></p>
<p><b>Displayable:</b> <?php echo $product['display']; ?></p>

<form method="post">
    <input type="submit" name="delete" value="Delete">
</form>

<br>
<a href="index.php">Cancel</a>

</body>
</html>