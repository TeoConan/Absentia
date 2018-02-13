// JavaScript Document

//Exe

//Tous les items téléchargé
var itempromo = document.getElementsByClassName('item-promotion');
//Ul accueillant les items
var listpromo = document.getElementById('content-promotion');
//Boutons download
var btdl = $('.block-center .inner-button .button');
//Input search
var inputsearch = document.getElementById('input_search');

initPromp();

//Test
//Search

console.log(getListPromo());


toggleLoad($('.page-preview .block-center .button'), 'TÉLÉCHARGER');
setTimeout(function(){
	toggleLoad($('.page-preview .block-center .button'), 'TÉLÉCHARGER');
}, 2000);






//Définir les EventListener des items téléchargés
function initPromp(event){
	console.log('Function initPromp');
	
	var listitems = document.getElementsByClassName('item-promotion');
	
	//Changer le background de bleue à vert lors d'un click
	for (var i=0; i< listitems.length; i++){
		listitems[i].addEventListener("click", switchItem, false);
	}
	
	//Boutons telecharger
	$(btdl).click(function(){
		console.log('Dl');
		makeList();
	});
	
	//Barre search
	
	$( "#input_search" ).keyup(function() {
		console.log('Input : ' + inputsearch.value);
	  	if(inputsearch.value != ""){
			search(inputsearch.value);
	  	} else {
			displayAll();
		}
	});
}

//Search


function search(search){
	var strlist = getListPromo();
	var current;
	//Search
	
	var output = [];
	var elements = document.getElementsByClassName('item-promotion');
	
	
	for(var i = 0; i < strlist.length; i++){
		if((elements[i].getElementsByTagName('span')[0].innerHTML).toLowerCase().indexOf(search) == -1){
			elements[i].style.display = 'none';
		} else {
			elements[i].style.display = 'block';
		}
	}
	
	console.log(output);
}

function displayAll(){
	$('.item-promotion').css('display', 'block');
}

function getListPromo(){
	var elements = document.getElementsByClassName('item-promotion');
	var strlist = [];
	
	for(var i = 0; i < elements.length; i++){
		strlist[i] = elements[i].getElementsByTagName('span')[0].innerHTML;
	}
	
	return(strlist);
}












function toggleLoad(element, txt){
	console.log('toggleLoad');
	
	var text = $(element).find('span');
	
	if (text.html() == 'CHARGEMENT...'){
		text.html(txt);
	} else {
		text.html('CHARGEMENT...');
	}
	
}

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
	
	console.log(sendtab);
	
	//Envoyer la liste des promotions selectionnées
	
	/*var sendData = function() {
		$.post('exe/select.php', {
		data: sendtab
		}, function(response) {
			console.log(response);
			
		});
	}
	sendData();*/
}

function switchItem(event){
	//console.log('Function switchItem');

	//TODO
	//Lancer l'animation des icones
	changeIcon(event);
	changeBackground(event);
}

function changeIcon(event){
	//console.log('Function changeIcon');

	var element = event.target;
	
	try{
		element = findAncestorByClasses(element, 'promotion', 'item');
		element = element.getElementsByTagName('img')[0];

		if (element.src.search('res/icons/ic_check_white_24px.svg') != -1){
			$(element).fadeOut(100);
			setTimeout(function(){
				element.src = 'res/icons/ic_add_circle_outline_white.svg';
				$(element).fadeIn(100);
			}, 100);
			
		} else {
			$(element).fadeOut(100);
			setTimeout(function(){
				element.src = 'res/icons/ic_check_white_24px.svg';
				$(element).fadeIn(100);
			}, 100);
			
		}

		
		
	} catch (e) {
		//console.log('Error = ' + e);
	}
}

function changeBackground(event){
	//console.log('Function changeBackground');

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