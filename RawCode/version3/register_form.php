<?php

/*including configure to get database*/
include 'config.php';

/*if user clicks submit*/
if(isset($_POST['submit'])){

	/*information needed from user */
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
  
	/*selecting from hag_db user_details table*/
   $select = " SELECT * FROM user_details WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

	   /*validation*/
      $error[] = 'user already exist!';

   }else{

	   /*validation if passwords dont match*/
      if($pass != $cpass){
         $error[] = 'password not matched!';
		  
	 /*correct login - insert details into table*/
      }else{
         $insert = "INSERT INTO user_details(name, email, password) VALUES('$name','$email','$pass')";
         mysqli_query($conn, $insert);
		  
		 /*direct the user to login*/
         header('location:index.php');
      }
   }

};


?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<!--title-->
<title>Register | The Health Advice Group</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
    
	<!--container to hold form-->
	<div class="form-container">

   <form action="" method="post">
	   <!--titles-->
	    <!--title with css-->
	  <center><h1 style="color: #333; font-family: Poppins, sans-serif;"><img src = "images/logo.PNG" height = "50px" width = "50px">The Health Advice Group</h1></center>
      <h3>Register here</h3>
	   
	   <!--error message-->
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
	   
	   <!--inputs for users - name, email, password and password check-->
      <input type="text" name="name" required placeholder="enter your name">
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" maxlength="8" required placeholder="enter your password">
	    <h6>Password should be 8 characters long</h6>
      <input type="password" name="cpassword" maxlength="8" required placeholder="confirm your password">
	  
     
	   <!--submit button-->
      <input type="submit" name="submit" value="register now" class="form-btn">
	   <!--login link-->
      <p>already have an account? <a href="index.php">login now</a></p>
   </form>

</div>

</body>
</html>