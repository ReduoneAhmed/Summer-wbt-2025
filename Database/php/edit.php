<?php
include("ProductDB.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM products WHERE id=$id");

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {
        die("Product not found.");
    }
} else {
    die("Invalid request.");
}

if (isset($_POST['update'])) {
    $name     = $_POST['name'];
    $buying   = $_POST['buying_price'];
    $selling  = $_POST['selling_price'];
    $display  = isset($_POST['display']) ? "Yes" : "No";

    $sql = "UPDATE products 
            SET name='$name', buying_price='$buying', selling_price='$selling', display='$display' 
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Product updated successfully! <a href='product.php'>Back to Product List</a>";
        exit;
    } else {
        echo " Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
</head>
<body>

<h2>Edit Product</h2>
<form method="post">
    Name: <br>
    <input type="text" name="name" value="<?php echo $product['name']; ?>" required><br><br>

    Buying Price: <br>
    <input type="number" name="buying_price" value="<?php echo $product['buying_price']; ?>" required><br><br>

    Selling Price: <br>
    <input type="number" name="selling_price" value="<?php echo $product['selling_price']; ?>" required><br><br>

    <input type="checkbox" name="display" value="Yes" <?php if($product['display']=="Yes") echo "checked"; ?>> Display<br><br>

    <input type="submit" name="update" value="Save">
</form>

<br>
<a href="index.php">Back to Product List</a>

</body>
</html>