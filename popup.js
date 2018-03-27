					/* TOAST */
	function Toast(text){
			this.text = text;
			this.body = $(document.body);
			this.toast = $('.toast');
			this.p = $('.toast > p');
			this.me = this;

			console.log('Toast elem = ');
			console.log(this.toast);
			console.log(this.p);

			this.show = function(){
				this.p.html(this.text);
				this.toast.css('opacity', '1');
			}

			this.hide = function(){
				this.toast.css('opacity', '0');
			}
		}
					/* AFFICHAGE POPUP*/

var loading = false;

		function hide (addr) {
			document.getElementById(addr).style.display = "none" ;
		}
		function show (addr) {
			document.getElementById(addr).style.display = "block" ;
			loading = true;
			
			setTimeout(function(){
				loading = false;
			}, 1000);
		}
		
			
		var input_name = document.getElementById("input_name"); 
		var input_mail = document.getElementById("input_mail"); 
		var input_message = document.getElementById("input_message");
		var text = document.getElementById("text");
		
		function toggle () {
			if(!loading){
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
		button_send.addEventListener("click", toggle, false);
		
				
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
				console.log('SendData');
				sendData();
				
				var toast = new Toast("Votre message a bien été envoyé");
				toast.show();
				setTimeout(function(){
					toast.hide();
				},2500);
			}

			function sendData(){
				$.post('form.php', {
					data: sendtab
				}, function(response) {
					console.log(response);
				});
			}
		}


	// JavaScript Document