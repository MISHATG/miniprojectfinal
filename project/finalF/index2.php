<?php

  // Connect to MySQL database

  $conn = mysqli_connect('localhost','root','','swiss_collection');

  // Check connection
  if (!$conn) 
  {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Process form data when form is submitted
  if (isset($_POST['submit'])) 
  {
    // Retrieve form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']); 
      

    //$select = "SELECT * FROM user_form1 WHERE name = '$name' && password = '$password' ";
    $select = "SELECT * FROM users WHERE email = '$email' ";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0)
    {
        //$error[] = 'user already exist!';
        $msg = "<div class='alert alert-danger'>{$email} - This email address already exists.</div>";
    }
    else
    {
        if($password!=$cpassword)
        {
            //$error[] ='password not matched!';
            $msg = "<div class='alert alert-danger'>Password not matched</div>";
        }
        else
        {
           $sql = "INSERT INTO users(first_name,last_name,email,password)VALUES('$first_name','$last_name','$email','$password')";
           if(mysqli_query($conn,$sql))
           {
            //$error[]= 'Registration successful';
            echo "<div style='display: none;'>";
            //$mail = new PHPMailer(true);
           }
           header('location:index3.php');
        }
    
    }
}    

  // Close database connection
  mysqli_close($conn);
?>



<!DOCTYPE html>
<html lang="en" >
    <head>
    <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register form</title>
        <link rel="stylesheet" href="style2.css">
    </head>
    <body>
        <section>
            
         <div class="form-container">   
                
                    
                    <form method="post">
                         <h3>Register now</h3>
                
   
                        
                            <input type="text" name="first_name" required placeholder="Enter your first name">
                        
                        
                            <input type="text" name="last_name" required placeholder="Enter your last name">
                        
                            <input type="email" name="email" required placeholder="Enter your email address">
                        
                            <input type="password" name="password" required placeholder="Enter your password">
                     
                            <input type="password" name="cpassword" required placeholder="Confirm your password">
                        
            
                        
                            <input type="submit" value="Register Now" name="submit" class="form-btn">
                        
                            <?php
                              if (isset($error)) {
                                       foreach ($error as $error) {
                                          echo '<span class="error-msg">'.$error.'</span>';
                                          };
                                       };
                           ?>

                        <div class="signup_link">
                            <p>Already having an account?<a href="index3.php">Login Now</a></p>
                        </div>
                    </form> 
                </div>
            </div>
        </section>
    </body>
</html>