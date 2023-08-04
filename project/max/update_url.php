<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $server = "localhost";
    $user = "root";
    $password = "";
    $db = "swiss_collection";

    $conn = mysqli_connect($server, $user, $password, $db);

    if (!$conn) {
        die("Connection Failed:" . mysqli_connect_error());
    }

    $product_name = $_POST["product_name"];
    $product_url = $_POST["product_url"];

    // Update the product_url in the database for the corresponding product_name
    $sql = "UPDATE product SET product_url = '$product_url' WHERE product_name = '$product_name'";

    if ($conn->query($sql) === TRUE) {
        echo "URL updated successfully!";
    } else {
        echo "Error updating URL: " . $conn->error;
    }

    $conn->close();
}
?>
