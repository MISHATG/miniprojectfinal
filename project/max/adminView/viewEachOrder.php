<div class="container">
<table class="table table-striped">
    <thead>
        <tr>
            <th>S.N.</th>
            <th>Internship URL</th>
            
        </tr>
    </thead>
    
    <?php
include_once "../config/dbconnect.php";
$sql = "SELECT product_name, price, product_url
        FROM product
        JOIN captured_info ON product.product_url = captured_info.internship_url_column";

$result = $conn->query($sql);
$count = 1;

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td><?= $count ?></td>
            <td><?= $row["product_name"] ?></td>
            <td><?= $row["price"] ?></td>
            <td><?= $row["product_url"] ?></td>
        </tr>
        <?php
        $count = $count + 1;
    }
}
?>

