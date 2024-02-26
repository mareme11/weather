<?php

//configure page to link hag_db database
@include 'config.php';

//function for login
session_start();

// if user clicks login button
if(isset($_POST['submit'])){

	//check email and password
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
	
	//checking login match from hag_db database
   $select = " SELECT * FROM user_details WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

	   //takes user to main page (user_page.php)
      if($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         header('location:user_page.php');

      }
     //validation
   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>

<!--html code-->
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!--  css file link (main.css) -->
   <link rel="stylesheet" href="css/main.css">

</head>
<body>
   
<!--code start-->
<!--container to hold login form-->
<div class="form-container">
  <form action="" method="post">
	  
	  <br>
	   
	   <!--title with css-->
	  <center><h1 style="color: #333; font-family: Poppins, sans-serif;"><img src = "images/logo.PNG" height = "50px" width = "50px">The Health Advice Group</h1></center>
      <h3>login now</h3>
	   
	   <!--validation - error message if user does not input-->
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
	   
	   <!--input boxes for email and password-->
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
	   
	  <h8>forgotten password?</h8>
	  <!--login button-->
      <input type="submit" name="submit" value="login now" class="form-btn">
	   <!--registration link-->
      <p>don't have an account? <a href="register_form.php">register now</a></p>
   </form>

</div>
</body>
</html>
