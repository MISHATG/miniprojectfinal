<?php
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    // Get the user information sent via POST
    $name = $_POST['name'];
    $email = $_POST['email'];
    $internshipUrl = $_POST['internshipUrl'];

    // Perform any validation if required before inserting into the database

    // Connect to the database (replace db_username, db_password, db_name with your actual credentials)
    $conn = new mysqli('localhost','root','','swiss_collection');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Use prepared statements to prevent SQL injection
    $sql = "INSERT INTO info (name, email, internship_url) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $internshipUrl);

    if ($stmt->execute()) {
        // Return a success response to the AJAX request
        echo json_encode(['success' => true]);
    } else {
        // Return an error response to the AJAX request
        echo json_encode(['success' => false, 'error' => 'Error inserting data: ' . $conn->error]);
    }

    $stmt->close();
    $conn->close();
}
?>
