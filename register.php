<?php include('server.php') ?>

<!DOCTYPE html>
<html>
    <head>
	<title>Kennel Kaamos</title>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="tyyli.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
		<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.3.min.js"></script>
		<script src="main.js"></script>
    <body>
	
	<!-- NAVIGOINTI-->
	<div class="valikko" id="paavalikko">
				<a href="etusivu.html" class="active"> Etusivu </a>
				<a href="koiramme.html"> Koiramme </a>
				<a href="pentusuunnitelmat.html"> Pentusuunnitelmat </a>
				<a href="rodusta.html"> Rodusta </a>
				<a href="otayhteytta.html" > Ota yhteyttä</a>
				<a href="register.php">Rekisteröidy</a>
				<a href="javascript:void(0);" class="icon" onclick="myFunction()">
					<i class="fa fa-bars"></i>
					</a>
				</div>
				
				
				<script>
				function myFunction() 
				{
					var x = document.getElementById("paavalikko");
					if (x.className === "valikko") {
					x.className += " responsive";
						} else {
						x.className = "valikko";
						}
				}
				</script>
				
	<!--Otsikko-->
	<div  class="paaotsikot">
  <h1>Rekisteröidy tai Kirjaudu sisään</h1>
</div>
	
	<!--TAUSTAKUVA-->
	<div class="pallot">
	  <span class="pallot" id="pallo1"></span>
	  <span class="pallot" id="pallo2"></span>
	  <span class="pallot" id="pallo3"></span>
	  <span class="pallot" id="pallo4"></span>
	</div>
	
	
	<!--Rekisteröidy-->
	<div class="wrapper">
		<h3>Rekisteröidy</h3>
		
		<form action="register.php" method="post">
		<?php include('errors.php'); ?>
			<div class="kentta">
				<label>Käyttäjänimi</label><br>
				<input type="text" name="username" value="<?php echo $username; ?>">
			</div>
			<div class="kentta">
				<label>Sähköposti</label><br>
				<input type="email" name="email" value="<?php echo $email; ?>">
			</div>
			<div class="kentta">
				<label>Salasana</label><br>
				<input type="password" name="password_1">
			</div>
			<div class="kentta">
			<label>Vahvista salasana</label><br>
				<input type="password" name="password_2">
			</div>
			<div class="btn">
			<button type="submit" class="btn" name="reg_user" id="laheta">Rekisteröidy</button>
			</div>
			<p>
			Oletko jo rekisteröitynyt? <a href="login.php">Kirjaudu sisään</a>
			</p>
		</form>
	</div>
	
	
	

    </body>
</html>