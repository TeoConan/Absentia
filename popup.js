// JavaScript Document

var lienpopup = document.getElementById('id');
var body = document.getElementsByTagName('body');

lienpopup.addEventListener("click", afficherPopup, false);

function afficherPopup(){
	sendQuery('popup.php', body, false);
}

function sendQuery(query, showin, erase){
	console.log('Function sendQuery');
	console.log("query : " + query);
	
	//instance de l'objet
	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange=function() {
		if (this.readyState == 4 && this.status == 200) {
			console.log("ShowMessage response = ");
			console.log(this.responseText);
			if (erase){
				showin.innerHTML = this.responseText;
			} else {
				showin.innerHTML += this.responseText;
			}
		}
	};
	
	xhttp.open("GET",query , true);
	xhttp.send();
}