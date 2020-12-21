

<!--Missä vaiheessa katosi responsiivisuus + ota-yhteyttä hakemus ei ole keskellä-->

<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "Sinun täytyy ensin kirjautua sisään";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
<title>Kennel Kaamos: Kirjautuneena sisään</title>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="tyyli.css">
</head>
<body>

	<h2>Kennel Kaamos</h2>

<div class="content">
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- "tervetuloa" sivu kun kirjautuu sisään-->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Tervetuloa <strong><?php echo $_SESSION['username']; ?></strong> Olet kirjautunut Kennel Kaamoksen sivuille</p>
    	<p> <a href="index.php?logout='1'" style="color: red;">Kirjaudu ulos</a> </p>
    <?php endif ?>
</div>
		
</body>
</html