<?php
include_once "../config/dbconnect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Items</title>
    <!-- Add any CSS or additional styling here if needed -->
</head>
<body>
    <div>
        <h2>Product Items</h2>
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center">S.N.</th>
                    <th class="text-center">Internship Name</th>
                    <th class="text-center">Internship Description</th>
                    <th class="text-center">Category Name</th>
                    <th class="text-center">Stipend</th>
                    <th class="text-center" colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM product, category WHERE product.category_id = category.category_id";
                $result = $conn->query($sql);
                $count = 1;

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?= $count ?></td>
                            <td>
                                <img height='100px' src='<?= $row["product_image"] ?>' alt="<?= $row["product_name"] ?>">
                            </td>
                            <td><?= $row["product_name"] ?></td>
                            <td><?= $row["product_desc"] ?></td>
                            <td><?= $row["category_name"] ?></td>
                            <td><?= $row["price"] ?></td>
                            <td>
                                <button class="btn btn-primary" style="height:40px" onclick="itemEditForm('<?= $row['product_id'] ?>')">Edit</button>
                            </td>
                            <td>
                                <button class="btn btn-danger" style="height:40px" onclick="itemDelete('<?= $row['product_id'] ?>')">Delete</button>
                            </td>
                        </tr>
                        <?php
                        $count = $count + 1;
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="7">No data available</td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
