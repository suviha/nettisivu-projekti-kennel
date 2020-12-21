<?php
session_start();

$username = "";
$email    = "";
$errors = array(); 

// yhteys tietokantaan
$db = mysqli_connect('localhost', 'root', '', 'kaamos_registration');

// Käyttäjän rekisteröinti
if (isset($_POST['reg_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // tarkistetaan käyttäjän antamant tiedot
  if (empty($username)) { array_push($errors, "Käyttäjänimi vaaditaan"); }
  if (empty($email)) { array_push($errors, "Sähköposti vaaditaan"); }
  if (empty($password_1)) { array_push($errors, "Salasana vaaditaan"); }
  if ($password_1 != $password_2) {
	array_push($errors, "Salasanat eivät täsmää");
  }

  // varmistetaan ettei käyttäjä ole jo rekisteröitynyt samalla tunnuksella tai sähköpostilla
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // varoitus jos käyttäjänimi tai sähköposti on jo rekisteröity
    if ($user['username'] === $username) {
      array_push($errors, "Käyttäjänimi on jo käytössä");
    }

    if ($user['email'] === $email) {
      array_push($errors, "Sähköposti on jo käytössä");
    }
  }

  // Rekisteröi käyttäjän kun virheitä ei ole
  if (count($errors) == 0) {
  	$password = md5($password_1);//kryptaa salasanan ettei sitä näy tietokannassa

  	$query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}

// SISÄÄN KIRJAUTUMINEN
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {//Tarkistetaan että tunnukset ja salasana täsmää
  	array_push($errors, "Käyttäjänimi vaaditaan");
  }
  if (empty($password)) {
  	array_push($errors, "Salasana vaaditaan");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "Olet Kirjautunut sisään";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Väärä tunnus tai salasana");
  	}
  }
}

?>