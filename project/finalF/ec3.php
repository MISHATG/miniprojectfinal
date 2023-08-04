<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA_Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="font/css/all.min.css">
    <link rel="stylesheet" href="ce2.css">
    <title>ELORA</title>
</head>
<body>
    <?php
    require_once 'connection.php';
    $query = "SELECT * FROM product WHERE dept='ec'AND category_id=2";
    $result = mysqli_query($con, $query);
    ?>

    <?php
    include_once 'header.php';
    ?>

    <main>
        <div class="card-container">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="card-wrapper"> <!-- Add the card-wrapper div here -->
                <div class="card">
                    <div class="caption">
                        <p class="product_name"><?php echo $row['product_name']; ?></p>
                        <p class="product_desc"><?php echo $row['product_desc']; ?></p>
                        <p class="price"><?php echo $row['price']; ?></p>
                    </div>
                    <button class="add" data-url="<?php echo $row['product_url']; ?>">Apply for this internship</button>
                </div>
            </div> <!-- Closing the card-wrapper div here -->
            <?php
            }
            ?>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        // Add click event listener to all buttons with class "add"
        $('.add').on('click', function() {
            // Get the URL from the custom data attribute "data-url"
            var internshipUrl = $(this).data('url');
            var name = prompt('Please enter your name:');
            var email = prompt('Please enter your registered email:');

            // Create the user information object
            var userInfo = {
                name: name,
                email: email,
                internshipUrl: internshipUrl
            };

            // Perform the AJAX request to capture user information
            $.ajax({
                type: 'POST',
                url: 'capture_user_info.php',
                data: userInfo,
                success: function(response) {
                    // Handle the response from the server (if needed)
                    console.log('User info captured successfully:', response);
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });

            // Perform another AJAX request to save user information separately
            $.ajax({
                type: 'POST',
                url: 'save_user_info.php',
                data: { internship_url: internshipUrl },
                success: function(response) {
                    console.log('User info saved successfully:', response);
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        });
    });
    </script>
</body>
</html>
