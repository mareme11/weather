
<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
	
<!--  css file link (main.css) -->
<link rel="stylesheet" href="css/main.css">
	
</head>
<body>  
	
<!--Navbar-->
<!--title with image and background colour-->
<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light"> <a class="navbar-brand" href="#"> <img src = "images/logo.PNG" width = "50px" height = "auto" alt = ""/> The Health Advice Group</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"></button>
	<!--div class to align nav links-->
  <div class="collapse navbar-collapse" id="navbarSupportedContent1">
	      <ul class="navbar-nav mr-auto">
			 
	        <!--Nav links to other pages-->
	        <li class="nav-item active"><a class="nav-link" href="user_page.php">Home |<span class="sr-only">(current)</span></a></li>
			<li class="nav-item active"> <a class="nav-link" href="logout.php">Logout<span class="sr-only">(current)</span></a> </li>
    </ul>
</div>
<!--End of Navbar-->	  
</nav>
<br><br><br><br>
	
<!--container to hold contact form-->
<div class="form-container">

   <form action="" method="post">
	   <br>
	   
	   <!--title and logo with css-->
	  <center> <h1 style="color: #333; font-family: Poppins, sans-serif;"><img src = "images/logo.PNG" height = "60px" width = "60px" alt = "">The Health Advice Group</h1></center>
      <h3>Contact Us</h3>
	   
	   
<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

/*NAME VALIDATION*/	   
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
	  
	 /*validation for empty space*/
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
	  
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  /*EMAIL VALIDATION*/
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
/*COMMENT VALIDATION*/
  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }


}
/*removing whitespace from inputs*/
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<!--html code-->
	   <!--valdiation for required fields-->
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
	
  <!--name input box-->
  Name: <input type="text" name="name" value="">
  <span class="error">*</span>
  <br><br>
	
  <!--email input box-->
  E-mail: <input type="text" name="email" value="">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>

  <!--comment input box-->
  Comment: <textarea name="comment" rows="3" cols="40"><?php echo $comment;?></textarea>
  <br><br>

  <!--submit button with linked CSS-->
  <br><br>
  <input type="submit" name="submit" value="Submit" class="form-btn">  
</form>

</body>
</html>