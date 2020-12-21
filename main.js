

		$(document).ready(function(){
			
			//Navigointi-palkin sitominen sivun yläreunaan scrollatessa
					window.onscroll = function() {scrollaus()};
					var valikko = document.getElementById("paavalikko");
					var paikka = paavalikko.offsetTop;
					
					//sivun ylälaidassa sitominen yläreunaan loppuu
					function scrollaus() {
						if (window.pageYOffset >= paikka) {
						valikko.classList.add("paikka");
						} 
						else {
						valikko.classList.remove("paikka");
						}
					}
	
		})
		
		//Yhteydenotto-lomakkeen tarkistaminen
		$(document).ready(function(){
						const submitBtn = document.getElementById('laheta');

							const validate = (e) => {
							  e.preventDefault();
							  const firstname = document.getElementById('etunimi');
							  const lastname= document.getElementById('sukunimi');
							  const emailAddress = document.getElementById('email');
							  const message = document.getElementById('viesti');
							  
							  if (firstname.value === "") {
								alert("Anna etunimi");
								firstname.focus();
								return false;
							  }
							  
							  if (lastname.value === "") {
								alert("Anna sukunimi");
								lastname.focus();
								return false;
							  }
								
							  if (emailAddress.value === "") {
								alert("Anna sähköposti");
								emailAddress.focus();
								return false;
							  }

							  if (!emailIsValid(emailAddress.value)) {
								alert("Anna sähköposti oikeassa muodossa");
								emailAddress.focus();
								return false;
							  }
							  
							  if (message.value === "") {
								alert("Selvennä viestikenttään miksi haluat, että otamme yhteyttä.");
								message.focus();
								return false;
							  }

							  return true; // kun kaikki kentät on täytetty voidaan tiedot lähettää
							}

							const emailIsValid = email => {
							  return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
							}
							
							

							submitBtn.addEventListener('click', validate);
			
		})
			
		