<?php
	
	// LOGIN.PHP
	
	// errori muutujad peavad igal juhul olemas olema 
	$email_error = "";
	$password_error = "";
	
	$name_error = "";
	
	$name = "";
	
	// kontrollime et keegi vajutas input nuppu
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		
		//echo "keegi vajutas nuppu";
		if(isset($_POST["login"])){ 
		
			echo "vajutas login nuppu";
			
			//kontrollin et e-post ei ole tühi
			if ( empty($_POST["email"]) ) {
				$email_error = "See väli on kohustuslik";
			}
			
			if ( empty($_POST["name"]) ) {
				$name_error = "See väli on kohustuslik";
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
		
		//keegi vajutas create nuppu
		}elseif(isset($_POST["create"])){
			
			echo "vajutas create nuppu!";
			
			//valideerimine create user vormile
			//kontrollin et e-post ei ole tühi
			if ( empty($_POST["name"]) ) {
				$name_error = "See väli on kohustuslik";
			}else{
				//kõik on korras
				// test_input eemaldab pahatahktlikut osad
				$name = test_input($_POST["name"]);
			}
		
		}
	}
	
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	
	
?>

<?php
	$page_title = "Sisselogimise leht";
	$page_file_name = "login.php";
?>
	
<?php require_once("../header.php"); ?>
	<h2>Log in</h2>
	
		
		<form action="login.php" method="post" >
			<input name="email" type="email" placeholder="E-post"> <?php echo $email_error; ?><br><br>
			<input name="password" type="password" placeholder="Parool"> <?php echo $password_error; ?> <br><br>
			<input type="submit" value="Log in">
		</form>

	
	<h2>Create user</h2>
	<form action="login.php" method="POST" >
		<input name="First name" placeholder="First name">* <?php echo $name_error; ?> <br><br>
		<input name="Last name" placeholder="Last name">* <?php echo $name_error; ?> <br><br>
		<input name="email" placeholder="Email"> <?php echo $email_error; ?> <br><br>
		<input name="email" placeholder="Re-enter Email"> <?php echo $email_error; ?> <br><br>
				<?php
				echo "<select name='sel_date'>";
				$i = 1;
				while ($i <= 31) {
					echo "<option value='" . $i . "'>$i</option>";
					$i++;
				}
				echo "</select>";

				echo "<select name='sel_month'>";
				$month = array(
					"Jan",
					"Feb",
					"Mar",
					"Apr",
					"May",
					"Jun",
					"Jul",
					"Aug",
					"Sep",
					"Oct",
					"Nov",
					"Dec"
				);
				foreach ($month as $m) {
					echo "<option value='" . $m . "'>$m</option>";
				}
				echo "</select>";
				echo "<select name='sel_year'>";
				$j = 1920;
				while ($j <= 2015) {
					echo "<option value='" . $j . "'>$j</option>";
					$j++;
				}
				echo "</select>" ;
				?> <br><br>
		<input name="password" type="password" placeholder="Password"> <?php echo $password_error; ?> <br><br>
		<input name="password" type="password" placeholder="Re-enter Password"> <?php echo $password_error; ?>  <br><br>
		 Sugu?<br><input type="checkbox" name="sugu" value="mees">Mees<input type="checkbox" name="sugu" value="naine">Naine<br><br>
		 <input type="submit" value="Registreeru"><br>
	
<?php require_once("../foooter.php"); ?>