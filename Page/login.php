<?php
	
	// LOGIN.PHP
	
	// errori muutujad peavad igal juhul olemas olema 
	$email_error = "";
	$password_error = "";
	
	// kontrollime et keegi vajutas input nuppu
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		
		//echo "keegi vajutas nuppu";
		
		//kontrollin et e-post ei ole tühi
		if ( empty($_POST["email"]) ) {
			$email_error = "See väli on kohustuslik";
		}
		
		//kontrollin, et parool ei ole tühi
		if ( empty($_POST["password"]) ) {
			$password_error = "See väli on kohustuslik";
		} else {
			
			// kui oleme siia jõudnud, siis parool ei ole tühi
			// kontrollin, et oleks vähemalt 8 sümbolit pikk
			if(strlen($_POST["password"]) < 8) { 
			
				$password_error = "Peab olema vähemalt 8 tähemärki pikk!";
				
			}
			
		}
		
	}
	
?>
<html>
<head>
	<title>Login page</title>
</head>
<body>
	
	<h2>Log in</h2>
		
		<form action="login.php" method="post" >
			<input name="email" type="email" placeholder="E-post"> <?php echo $email_error; ?><br><br>
			<input name="password" type="password" placeholder="Parool"> <?php echo $password_error; ?> <br><br>
			<input type="submit" value="Log in">
		</form>
	
	<h2>Create user</h2>
	
</body>
</html>