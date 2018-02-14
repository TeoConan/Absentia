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

//Select all
var select_all = document.getElementById('select_all');

initPromp();

//Test
//Search


/*toggleLoad($('.page-preview .block-center .button'), 'TÉLÉCHARGER');
setTimeout(function(){
	toggleLoad($('.page-preview .block-center .button'), 'TÉLÉCHARGER');
}, 2000);*/


/*selectAll();

setTimeout(function(){
	selectAll();
}, 2000);*/



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
		toggleLoad($(btdl), 'TÉLÉCHARGER');
		makeList();
		setTimeout(function(){
			toggleLoad($(btdl), 'TÉLÉCHARGER');
		}, 1000);
	});
	
	//Barre search
	
	$( "#input_search" ).keyup(function() {
		console.log('Input : ' + inputsearch.value);
	  	if(inputsearch.value != ""){
			search(inputsearch.value);
			
	  	} else {
			displayAll();
		}
		
		//All selected
		
		if (!allisSelect()){
			$(select_all).css('background-color', "");
			$(select_all).find("img").attr('src', 'res/icons/ic_check_grey_24px.svg');
		} else {
			$(select_all).css('background-color', "rgb(124, 179, 66)");
			$(select_all).find("img").attr('src', 'res/icons/ic_check_white_24px.svg');
		}
	});
	
	//Select all
	$(select_all).click(function(){
		
		
		console.log($(select_all).css('background-color'));
		if ($(select_all).css('background-color') == "rgb(124, 179, 66)"){
			$(select_all).css('background-color', "");
			$(select_all).find("img").attr('src', 'res/icons/ic_check_grey_24px.svg');
			force_unselectAll();
		} else {
			$(select_all).css('background-color', "rgb(124, 179, 66)");
			$(select_all).find("img").attr('src', 'res/icons/ic_check_white_24px.svg');
			force_selectAll();
		}
		
	});
	
	//Switch view
	
	$('#switch_view').click(function(){
		
		switchView();
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




function force_unselectAll(){
	console.log('force_unselectAll');
	
	var elements = document.getElementsByClassName('item-promotion');
	var element;
	
	for(var i = 0; i < elements.length; i++){
		element = $('.item-promotion:nth-child(' + (i+1) + ')');
		$('.item-promotion:nth-child(' + (i+1) + ') img').attr("src", 'res/icons/ic_add_circle_outline_white.svg');
		
		$(element).find('> .item.promotion').removeClass('checked');
	}
}

function force_selectAll(){
	console.log('force_selectAll');
	var elements = document.getElementsByClassName('item-promotion');
	var element;
	
	for(var i = 0; i < elements.length; i++){
		element = $('.item-promotion:nth-child(' + (i+1) + ')');
		
		if($(element).css('display') != "none"){
			$('.item-promotion:nth-child(' + (i+1) + ') img').attr("src", 'res/icons/ic_check_white_24px.svg');
			$(element).find('> .item.promotion').addClass('checked');
		}
	}
}

function selectAll(){
	var elements = document.getElementsByClassName('item-promotion');
	
	for(var i = 0; i < elements.length; i++){
		select(i+1);
	}
}

function allisSelect(){
	
	console.log('force_selectAll');
	var elements = document.getElementsByClassName('item-promotion');
	var element;
	var output = false;
	var selected = 0;
	var nbritems = 0;
	
	for(var i = 0; i < elements.length; i++){
		element = $('.item-promotion:nth-child(' + (i+1) + ')');
		
		if($(element).css('display') != "none"){
			nbritems++;
			if ($(element).find('.checked').length > 0){
				selected++;
			}
		}
	}
	
	console.log(selected + ' item selected / ' + nbritems);
	if (nbritems == selected && nbritems > 0){
		output = true;
	}
	
	return(output);
}

function select(child){
	var element = $('.item-promotion:nth-child(' + child + ')');
	
	
	//Icon
	if ($(element).find('img').attr("src").search('res/icons/ic_check_white_24px.svg') != -1){
		$(element).fadeOut(100);
		setTimeout(function(){
			$(element).find('img').attr("src", 'res/icons/ic_add_circle_outline_white.svg');
			$(element).fadeIn(100);
		}, 100);

	} else {
		$(element).fadeOut(100);
		setTimeout(function(){
			$(element).find('img').attr("src", 'res/icons/ic_check_white_24px.svg');
			$(element).fadeIn(100);
		}, 100);

	}
	
	//Back
	
	$(element).find('> .item.promotion').toggleClass('checked');
	
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

function switchView(){
	console.log('Switch View');
	
	var inner = $('.page-preview .block-center > .inner');
	var contentpromo = $('.page-preview .block-list .content-promotion');
	var card = $('.page-preview .block-list');
	var time = 250;
	
	console.log(inner);
	console.log(contentpromo);
	if ($(inner).css('max-width') == '1250px'){
		
		$(card).fadeOut(time, function(){
			console.log('List View');
			$(inner).css('max-width', "1000px");
			$(contentpromo).css('flex-wrap', 'wrap');
			//$(contentpromo).css('justify-content', 'space-evenly');
			$(contentpromo).css('flex-direction', 'column');
		});
		$(card).fadeIn(time);
		
	} else {
		$(card).fadeOut(time, function(){
			console.log('Grid View');
			$(inner).css('max-width', "1250px");
			$(contentpromo).css('flex-wrap', 'wrap');
			$(contentpromo).css('justify-content', 'space-evenly');
			$(contentpromo).css('flex-direction', 'row');
		});
		$(card).fadeIn(time);
	}
}

function switchItem(event){
	//console.log('Function switchItem');

	//TODO
	//Lancer l'animation des icones
	//All
	$(select_all).css('background-color', "");
	$(select_all).find("img").attr('src', 'res/icons/ic_check_grey_24px.svg');
	
	changeIcon(event);
	changeBackground(event);
	
	//All selected
	if (allisSelect()){
		$(select_all).css('background-color', "rgb(124, 179, 66)");
		$(select_all).find("img").attr('src', 'res/icons/ic_check_white_24px.svg');
	}
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
