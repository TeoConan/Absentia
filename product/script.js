// JavaScript Document

//Exe

//Tous les items téléchargé
var itempromo = document.getElementsByClassName('item-promotion');
//Ul accueillant les items
var listpromo = document.getElementById('content-promotion');
//Bouton download
var btdl = document.getElementById('btget');

getListPromo();












//Console
var textzone = document.getElementById('text');
//Bouton get
var promo = document.getElementById('getpromo');
//Tous les items téléchargé
var itempromo = document.getElementsByClassName('item-promotion');
//Ul accueillant les items
var listpromo = document.getElementById('list-promo');
//Bouton download
var btdl = document.getElementById('btget');

//Listeners clicks
promo.addEventListener("click", getListPromo, false);
textzone.addEventListener("click", changeBackground, false);
btdl.addEventListener("click", makeList, false);


//Exe

//Obtenir la liste des promotions présente dans le fichier Excel
function getListPromo(event){
	console.log('Function getListPromo');
	var query = 'exe/scan.php?query=getlistpromo';
	console.log("query : " + query);
	
	
	xhttp = new XMLHttpRequest();
	//Téléchargement des promotions disponible
	xhttp.onreadystatechange=function() {
		if (this.readyState == 4 && this.status == 200) {
			console.log("ShowMessage response = ");
			console.log(this.responseText);
			
			listpromo.innerHTML = this.responseText;
			
			initPromp(event);
		}
	};
	
	xhttp.open("GET",query , true);
	xhttp.send();
}

//Définir les EventListener des items téléchargés
function initPromp(event){
	console.log('Function initPromp');
	console.log('element click = ' + event.target.innerHTML);
	
	var listitems = document.getElementsByClassName('item-promotion');
	
	//Changer le background de bleue à vert lors d'un click
	for (var i=0; i< listitems.length; i++){
		listitems[i].addEventListener("click", switchItem, false);
	}
}

//Construire la liste des promotions
function makeList(){
	console.log('Function makeList');
	
	console.log('list size : ' + itempromo.length);
	
	var listdownload = [];
	var temp, query;
	var promoselected = [];
	var sendtab = {};
	
	for (var i=0; i< itempromo.length; i++){
		console.log('Class ' + itempromo[i].firstElementChild.className + ' / search : ' + itempromo[i].firstElementChild.className.search('checked'));
		
		if ((itempromo[i].firstElementChild.className.search('checked')) === -1){
			
		} else {
			temp = itempromo[i].getElementsByTagName('p');
			listdownload.push(temp[0]);
		}
	}
	
	//Obtenir les items checked
	
	console.log('End get list : length : ' + listdownload.length);
	
	for (var i1=0; i1< listdownload.length; i1++){
		temp = listdownload[i1].getElementsByTagName('span');
		promoselected.push(temp[0]);
	}
	
	for (var i1=0; i1< promoselected.length; i1++){
		console.log('Data ' + promoselected[i1].innerHTML);
		sendtab[i1] = promoselected[i1].innerHTML;
	}
	
	//Envoyer la liste des promotions selectionnées
	
	var sendData = function() {
		$.post('exe/select.php', {
		data: sendtab
		}, function(response) {
			console.log(response);
			
		});
	}
	sendData();
}



//Functions

//Fonction pour envoyer des requetes post à des pages php /!\ fonction rare, ne pas supprimer
function sendPost(path, tab, showin, erase) {
	
	console.log('sendData');
	var sendData = function() {
	$.post(path, {
		data: tab
		}, function(response) {
			console.log("ShowMessage response = ");
			console.log(this.responseText);
			if (erase){
				showin.innerHTML = this.responseText;
			} else {
				showin.innerHTML += this.responseText;
			}
		});
	}
	sendData();
}

function switchItem(event){

	//TODO
	//Lancer l'animation des icones
	
	changeBackground(event);
}

function changeBackground(event){
	var element = event.target;
	
	try{
		element = findAncestorByClasses(element, 'promotion', 'item');
		//element.style.backgroundColor = "#409843";

		element.classList.toggle('checked');

		
		
	} catch (e) {
		//console.log('Error = ' + e);
	}
    
}

//Trouver l'ancetre 'item-promotion'
function findAncestorByClasses (el, cls1, cls2) {
    while ((el = el.parentElement) && (!el.classList.contains(cls1) && !el.classList.contains(cls2)));
    return el;
}