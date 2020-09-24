<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="Includes/styles.css">
    <title>Vlad's Quality Instruments</title>
  </head>
  <?php include("Includes/adminHeader.html"); ?>

<body>
<div id="content">
<?php
session_start();

if (isset($_SESSION['user_email'])) { // if the SESSION is already set
  $username = $_SESSION['user_email'];
  echo "Already logged in";
} else {
// check login credentials
	// check if its a post (trying to login)
	if(isset($_POST['username'])) {
		//get their credentials from loginex.php form
		$username = strip_tags($_POST['username']);
    $password = strip_tags($_POST['password']);
    include("Includes/db_connect.php");

		//creater a query
    $query = "SELECT * from user WHERE user_email = '$username' AND user_password = '$password';";
    
		//run a query
    $row = @mysqli_query($dbc, $query);

  //---------------get first name--------------
    $wquery = "SELECT fname FROM user WHERE user_email = '$username';";
    $fname_array = mysqli_query($dbc, $wquery);

    while ($user = mysqli_fetch_array($fname_array)) {
      $fname = $user['fname'];
    } 
  //----------------------------------------------------- 

		//check the result
		if (mysqli_num_rows($row) == 1) { // success
			  $_SESSION['user_email'] = $username;
        echo "<h2>Login success! Welcome $fname. Click on a menu item above to continue</h2>";
        
    } else { // invalid credentials
			  echo "<h4>Sorry, invalid credentials please <a href='loginex.php'> LOGIN AGAIN </a></h4>";
		}
  } else {
		  echo "<h4>You are not logged in, Please <a href='loginex.php'> LOGIN HERE </a></h4>";
	}

} 
destroy_session();
session_close();

?>
</div>
</body>
<?php include("Includes/footer.html"); ?>
</html>