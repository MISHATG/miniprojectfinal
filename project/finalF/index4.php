<?php
require_once('connection.php');

session_start(); // Move session_start() outside of the 'if' block to start the session before using $_SESSION.

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        echo '<script>alert("Please fill the blanks")</script>';
    } else {
        $query = "SELECT * FROM users WHERE email='" . mysqli_real_escape_string($con, $email) . "'"; // Use mysqli_real_escape_string to prevent SQL injection.
        $res = mysqli_query($con, $query);
        if ($row = mysqli_fetch_assoc($res)) {
            $db_password = $row['password'];
            if (md5($password) == $db_password) {
                $_SESSION['email'] = $email;
                header('location: web.php'); // Move header() function before session_start().
                exit; // Add an exit statement after the header to prevent further code execution.
            } else {
                echo '<script>alert("Enter a proper password")</script>';
            }
        } else {
            echo '<script>alert("Enter a proper email")</script>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>User Login</title>
    <link rel="stylesheet" href="style3.css">
</head>

<body>

    <div class="main">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">Internship Portal</h2>
            </div>
        </div>
        <div class="content">
            <h1><br><span>ELORA</span> <br>admin login</h1>
            <button class="cn"><a href="index1.php">Go Back</a></button>

            <div class="form">
                <h2>LOGIN HERE</h2>
                <form method="post" action=""> <!-- Add form tag and specify the action attribute. -->
                    <input type="email" name="email" placeholder="Enter Email Here">
                    <input type="password" name="password" placeholder="Enter Password Here"> <!-- Add the 'name' attribute to the password input. -->
                    <button class="btnn" type="submit" name="login">Login</button> <!-- Add the 'name' attribute to the submit button. -->

                    
                </form>
            </div>
        </div>
    </div>

</body>

</html>
