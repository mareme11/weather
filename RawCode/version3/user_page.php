<?php

//configure page to link hag_db database
@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:user_page.php');
}

?>

<!--html doc-->
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!--title-->
   <title>Home | The Health Advice Group</title>

   <!-- css file link (main.css) -->
   <link href="css/main.css" rel="stylesheet" type="text/css">
</head>
<body>
	
<!--start html code--> 
	<!--container to hold div tags-->
<div class="log-container">
   <div class="content">
	   <!--colouring welcome logo and using php to add user's name-->
     <h1><span style="color: #FFFFFF">Welcome</span> <span><?php echo $_SESSION['user_name'] ?></span></h1>
	   
	   <!--buttons with active links to ther web pages-->
      <a href="forecast.html" class="btn">Forecast</a>
      <a href="seasons.html" class="btn">Seasons</a>
	  <a href="contact.php" class="btn">home risk assessment</a>
	  <a href="contact.php" class="btn">Contact</a>
	  <a href="logout.php" class="btn">Logout</a>
  </div>
</div>

</body>
</html>