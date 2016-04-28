<?php
if(isset($_POST['username'])){
$username = $_POST['username'];
echo "Something works!".$username;
}


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>JonasPower</title>
  </head>
  <body>
  	<form method="POST">
  		<input type="text" placeholder="username" name="username"></input>
  		<input type="password" placeholder="password" name="password">
		<button type="submit">Submit</button>
  	</form>
  </body>
</html> 