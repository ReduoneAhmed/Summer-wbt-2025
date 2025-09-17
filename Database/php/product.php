<?php
 include ("ProductDB.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product</title>
</head>
<body>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $servername = "localhost";
    $username   = "root";       // your MySQL user
    $password   = "";           // your MySQL password
    $dbname     = "ProductDB";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // collect form data safely
    $name   = $conn->real_escape_string($_POST['name']);
    $buyP   = (float)$_POST['BuyP'];
    $sellP  = (float)$_POST['SellP'];
    $display = isset($_POST['display']) ? "yes" : "no";


  $sql = "INSERT INTO products (name, buying_price, selling_price, display)
        VALUES ('$name', '$buyP', '$sellP', '$display')";


    if ($conn->query($sql) === TRUE) {
        echo "<p>New record created successfully</p>";
    } else {
        echo "Error: " . $conn->error;
    }
    $conn->close();
}
?>

<div class="form">
    <form method="post">
        <fieldset>
            <legend>ADD PRODUCT</legend>

            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" required><br>

            <label for="BuyP">Buying Price:</label><br>
            <input type="number" id="BuyP" name="BuyP" required><br>

            <label for="SellP">Selling Price:</label><br>
            <input type="number" id="SellP" name="SellP" required><br>

            <hr>
            <input type="checkbox" id="display" name="display" value="Yes">
            <label for="display" name="display">Display</label>
            <br>
           

            <button type="submit">Save</button>
        </fieldset>

<br><br>


       
    </form>

</div>

<hr>

<div class="display">
    <fieldset>
        <legend>DISPLAY</legend>

        <table border="1" cellpadding="8" cellspacing="0">
            <tr>
                <th>Name</th>
                <th>Profit</th>
                <th>Action</th>
            </tr>

            <?php
            // connect to DB
            $conn = new mysqli("localhost", "root", "", "ProductDB");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            
            $sql = "SELECT id, name, buying_price, selling_price
                    FROM products
                    WHERE display='Yes'";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $profit = $row['selling_price'] - $row['buying_price'];
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                    echo "<td>" . number_format($profit, 2) . "</td>";
                    echo "<td>
                            <a href='edit.php?id=" . $row['id'] . "'>edit</a> |
                            <a href='delete.php?id=" . $row['id'] . "' 
                               onclick=\"return confirm('Delete this product?');\">delete</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No products to display</td></tr>";
            }

            $conn->close();
            ?>
        </table>
    </fieldset>
</div>



</body>
</html>