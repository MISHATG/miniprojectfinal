<?php
include_once "../config/dbconnect.php";

// Retrieve all items from the product table
$query = "SELECT * FROM product";
$result = mysqli_query($conn, $query);

if (!$result) {
    echo "Error fetching data from the database: " . mysqli_error($conn);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Added Items</title>
</head>
<body>
    <h1>View Added Items</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Product Image</th>
            <th>Price</th>
            <th>Product Description</th>
            <th>Category ID</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['product_name']; ?></td>
                <td>
                    <img src="<?php echo $row['product_image']; ?>" alt="<?php echo $row['product_name']; ?>" width="100">
                </td>
                <td><?php echo $row['price']; ?></td>
                <td><?php echo $row['product_desc']; ?></td>
                <td><?php echo $row['category_id']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
