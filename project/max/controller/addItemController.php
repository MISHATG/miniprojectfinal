<?php
    include_once "../config/dbconnect.php";
    
    if(isset($_POST['upload']))
    {
       
        $ProductName = $_POST['p_name'];
        $desc= $_POST['p_desc'];
        $price = $_POST['p_price'];
        $category = $_POST['category'];
       
            
        $name = $_FILES['file']['name'];
        $temp = $_FILES['file']['tmp_name'];
    
        // Add this line before the query
        echo "Before Query Execution";

        $insert = mysqli_query($conn, "INSERT INTO `product` (`product_name`, `price`, `product_desc`, `category_id`) VALUES ('$ProductName', $price, '$desc', $category)");


// Add this line after the query
        echo "After Query Execution";

         if(!$insert)
         {
             echo mysqli_error($conn);
         }
         else
         {
             echo "Records added successfully.";
         }
     
    }
        
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>