<?php
$server = "localhost";
$user = "root";
$password = "";
$db = "swiss_collection";

$conn = mysqli_connect($server, $user, $password, $db);

if (!$conn) {
  die("Connection Failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["product_name"]) && isset($_POST["product_url"])) {
    $product_name = $_POST["product_name"];
    $product_url = $_POST["product_url"];

    // Update the product_url in the database
    $update_url_sql = "UPDATE product SET product_url='$product_url' WHERE product_name='$product_name'";
    mysqli_query($conn, $update_url_sql);
  } elseif (isset($_POST["product_name"]) && isset($_POST["dept"])) {
    $product_name = $_POST["product_name"];
    $dept = $_POST["dept"];

    // Update the dept in the database
    $update_dept_sql = "UPDATE product SET dept='$dept' WHERE product_name='$product_name'";
    mysqli_query($conn, $update_dept_sql);
  }
}

// Redirect back to the index.php after the update
header("Location: index.php");
exit();
?>
