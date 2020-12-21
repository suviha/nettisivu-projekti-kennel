
<?php
	//lähettää sähköpostin
	if(isset ($_POST['submit']))
		{
			$etunimi = $_POST['etunimi'];
			$sukunimi = $_POST['sukunimi'];
			$emailFrom = $_POST['email'];
			$viesti = $_POST['viesti'];
			
			$mailTo= "gr197226@gradia.fi";
			$otsikko = "Kennel Kaamokselle: ".$emailFrom;
			$sisalto ="Olet saanut yhteydenottopyynnön henkilöltä ".$etunimi." ".$sukunimi.".\n\n".$viesti;
			
			mail($mailTo, "Yhteydenottopyyntö", $sisalto, $otsikko);
			header("Location: otayhteytta.html?mailsend");
		}
		
	

?>
