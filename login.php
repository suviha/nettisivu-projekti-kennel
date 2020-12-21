<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Kirjaudu</title>
  <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="tyyli.css">
	
</head>
<body>
  	<h2><strong>Kirjaudu sisään</strong></h2><br><br><br>
	 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="">
  		<label>Käyttäjänimi</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="">
  		<label>Salasana</label>
  		<input type="password" name="password">
  	</div>
  	<div class="">
  		<button type="submit" class="btn" name="login_user">Kirjaudu</button>
  	</div>
  	<p>
  		Ei tunnuksia? <a href="register.php">Tee tunnukset täällä</a>
  	</p>
  </form>
</body>
</html>