<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="Includes/styles.css">
    <title>Sign In</title>
  </head>
  
  <?php include("Includes/loggedOutHeader.html"); ?>
<script>
function validation() {
	
	if (document.getElementById('username').value == '') {
		alert ("you must include a username");
		return false;
	}

	if (document.getElementById('password').value == '') {
		alert ("you must include a password");
		return false;
	}
	if (document.getElementById('password').value.length < 4) {
		alert("password must be at least 4 characters in length");
		return false;
	}
return true;
}
</script>
</head>

<body>
<div id="content"> 
<form action="loginvars.php" method="POST" onsubmit="return validation();">
<p><b> USERNAME: <input type="text" name="username" id="username" required/></b></p>
<p><b> PASSWORD: <input type="password" name="password" id="password" required/></b></p>
<input type="submit" value="SUBMIT"  />
</form>
</div>
</body>
<?php include("Includes/footer.html"); ?>
</html>