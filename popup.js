
					/* AFFICHAGE POPUP*/

		function hide (addr) {
			document.getElementById(addr).style.display = "none" ;
		}
		function show (addr) {
			document.getElementById(addr).style.display = "block" ;
		}
		
			
		var input_name = document.getElementById("input_name"); 
		var input_mail = document.getElementById("input_mail"); 
		var input_message = document.getElementById("input_message");
		var text = document.getElementById("text");
		
		function toggle () {
			if(document.getElementById('popup').style.display == "none") {
				show('popup');
			}else {
				hide('popup');
			}
			
			input_name.value="";
 			input_mail.value="";
 			input_message.value="";
 			text.style.display = "none";
		}
		window.onload = function() { hide ('popup'); };
		
		/*--------------------------------------------------*/
		
					/* FERMER POPUP */
		
		var lienpopup = document.getElementById('linkpopup');
		var body = document.body;
		var popup = document.getElementById('popup');
		var close = document.getElementById('close');
		var button_send = document.getElementById('button_send');
		
		lienpopup.addEventListener("click", toggle, false);
		close.addEventListener("click", toggle, false);
		button_send.addEventListener("click", sendform, false);
		
				
		/*--------------------------------------------------*/
		
					/* RECUPÉRATION DES DONNÉES */
		
		function button (){
			console.log(input_name.value);
			console.log(input_mail.value);
			console.log(input_message.value);
		}

		
		/*--------------------------------------------------*/
		
					/*ENVOI DU FORMULAIRE*/
		
		function sendform (){
			
			if( input_name.value=="" || input_mail.value == "" || input_message.value==""){
 				text.style.display = "block";
 			} else {
				
		var sendtab = [];
		
		sendtab.push(input_name.value);
		sendtab.push(input_mail.value);
		sendtab.push(input_message.value);
		
			};
		var sendData = function (){
			$.post('form.php', {
				data: sendtab
			}, function(response) {
				console.log(response);
			})
		
		sendData();
	}
}
	// JavaScript Document