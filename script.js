// JavaScript Document

//Exe
//Disable console
//console.log = function() {}

//Tous les items téléchargé
var itempromo = document.getElementsByClassName('item-promotion');
//Ul accueillant les items
var listpromo = document.getElementById('content-promotion');
//Boutons download
var btdl = $('.block-center .inner-button .button.dl');
//Input search
var inputsearch = document.getElementById('input_search');

//Select all
var select_all = document.getElementById('select_all');

//Loading
var isgenerating = false;

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

window.onbeforeunload = function() {
	if(isgenerating){
		return "Are you sure you want to navigate away?";
	}
}



//Définir les EventListener des items téléchargés
function initPromp(event){
	console.log('Function initPromp');
	
	var listitems = document.getElementsByClassName('item-promotion');
	$('.page-preview .block-list p.error.search').css('display', 'none');
	
	//Changer le background de bleue à vert lors d'un click
	for (var i=0; i< listitems.length; i++){
		listitems[i].addEventListener("click", switchItem, false);
	}
	
	//Boutons telecharger
	$(btdl).click(function(){
		console.log('Dl');
		if(!nothingSelect()){
			if(!isgenerating){
				isgenerating = true;
				toggleLoad($(btdl), 'TÉLÉCHARGER');
				makeList();
			}	
		}
		
	});
	
	//Barre search
	
	$( "#input_search" ).keyup(function() {
		console.log('Input : ' + inputsearch.value);
		$('.page-preview .block-list p.error').css('display', 'none');
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
		if ($(select_all).css('background-color') == "rgb(64, 152, 67)"){
			$(select_all).css('background-color', "");
			$(select_all).find("img").attr('src', 'res/icons/ic_check_grey_24px.svg');
			force_unselectAll();
		} else {
			$(select_all).css('background-color', "rgb(64, 152, 67)");
			$(select_all).find("img").attr('src', 'res/icons/ic_check_white_24px.svg');
			force_selectAll();
		}
		
	});
	
	//Switch view
	
	$('#switch_view').click(function(){
		
		switchView();
	});
	
	
	//Auto switch view
	var elements = document.getElementsByClassName('item-promotion');
	
	if ($(elements).length > 10){
		switchView();
	}
}

//Search


function search(search){
	var strlist = getListPromo();
	var current;
	//Search
	
	var output = [];
	var elements = document.getElementsByClassName('item-promotion');
	var match = 0;
	
	
	for(var i = 0; i < strlist.length; i++){
		if((elements[i].getElementsByTagName('span')[0].innerHTML).toLowerCase().indexOf(search) == -1){
			elements[i].style.display = 'none';
		} else {
			elements[i].style.display = 'block';
			match++;
		}
	}
	
	if(match == 0){
		$('.page-preview .block-list p.error').css('display', 'block');
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

function nothingSelect(){
	console.log('nothingSelect');
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
	if (selected == 0){
		output = true;
	}
	
	return(output);
}

function allisSelect(){
	
	//console.log('force_selectAll');
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
	
	//console.log(selected + ' item selected / ' + nbritems);
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

function switchText(element, txt1, txt2){
	console.log('switchText');
	
	var text = $(element).find('span');
	
	if (text.html() == txt2){
		text.html(txt1);
	} else {
		text.html(txt2);
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
	
	//Show Toast
	
	var waittime = 0;
	if(i1 > 1){
		waittime = (i1*5)+2;
	} else {
		waittime = i1*4;
	}
	
	toast = new Toast("Génération des PDF en cours...<br/>Durée estimée à " + waittime + " secondes");
	toast.show();
	$('#loader').css('opacity', '1');
	
	
	
	//Envoyer la liste des promotions selectionnées
	
	/* Test console */
	
	$('#clear').click(function(){
		$('#console').text('');
	});
	
	/* Test console */
	
	//Regex redirection
	var regRedirect = "/<redirect>(.*?)<\/redirect>/g";
	var regError = /<b>(Notice|Warning)<(.*?)line/g;
	
	
	var sendData = function() {
		$.post('product/exe/select.php?file=' + getAllUrlParams().file, {
		//$.post('test.php', {
		data: sendtab
		}, function(response) {
			//var redirect = getAbsentiaPath() + '/product/exe/' + findRedirect(response);
			console.log('Output :');
			console.log(response);
			
			//var error = response.match(regError);
			var error = null;
			if(error == null){
				var redirect = findRedirect(response);

				
				//$('#console').text(response);

				console.log('Redirect to ' + redirect);
				console.log('End');

				setTimeout(function(){

					for(var i = 0;i < redirect.length;i++){
						window.open(getAbsentiaPath() + '/product/exe/' + redirect[i], "_blank");
					}

					console.log('End redirect');
					isgenerating = false;
					toggleLoad($(btdl), 'TÉLÉCHARGER');
					$('#loader > img').css('display','none');
					$('#linkdl').css('display', 'block');
					toast.hide();
				}, 200);
			} else {
				console.error('Receive errors, reg = ');
				console.log(error);
				window.location.href = "preview.php?error=1";
			}
			
				
		});
	}
	sendData();
}

function getAbsentiaPath(){
	var currentURL = window.location.protocol + "//" + window.location.host + window.location.pathname;
	var res = currentURL.lastIndexOf("/");
	var urlroot = currentURL.substring(0, res);
	
	return(urlroot);
}

function findRedirect(text){
	var output;
	var reg = text.match(/<redirect>(.*?)<\/redirect>/g);
	console.log(text);
	console.log(reg);
	if(reg != null){
		console.log('Redirects : size ' + reg.lenght);
		
		
		var alllink = [];
		var regwhile = reg.lenght;
		if(regwhile == null){regwhile = 1;}
		for(var i = 0; i < regwhile; i++){
			output = reg[i];
			output = output.replace("<redirect>", "");
			output = output.replace("</redirect>", "");
			console.log('Replace tag in ' + output);			
			alllink.push(output);
		}
		
		console.log(alllink);
		
		console.log("New <redirect>");
		console.log(output);
	}
	
	
	console.log('Redirections final');
	console.log(alllink);
	
	return(alllink);
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

function getAllUrlParams(url) {

  // get query string from url (optional) or window
  var queryString = url ? url.split('?')[1] : window.location.search.slice(1);

  // we'll store the parameters here
  var obj = {};

  // if query string exists
  if (queryString) {

    // stuff after # is not part of query string, so get rid of it
    queryString = queryString.split('#')[0];

    // split our query string into its component parts
    var arr = queryString.split('&');

    for (var i=0; i<arr.length; i++) {
      // separate the keys and the values
      var a = arr[i].split('=');

      // in case params look like: list[]=thing1&list[]=thing2
      var paramNum = undefined;
      var paramName = a[0].replace(/\[\d*\]/, function(v) {
        paramNum = v.slice(1,-1);
        return '';
      });

      // set parameter value (use 'true' if empty)
      var paramValue = typeof(a[1])==='undefined' ? true : a[1];

      // (optional) keep case consistent
      paramName = paramName.toLowerCase();
      paramValue = paramValue.toLowerCase();

      // if parameter name already exists
      if (obj[paramName]) {
        // convert value to array (if still string)
        if (typeof obj[paramName] === 'string') {
          obj[paramName] = [obj[paramName]];
        }
        // if no array index number specified...
        if (typeof paramNum === 'undefined') {
          // put the value on the end of the array
          obj[paramName].push(paramValue);
        }
        // if array index number specified...
        else {
          // put the value at that index number
          obj[paramName][paramNum] = paramValue;
        }
      }
      // if param name doesn't exist yet, set it
      else {
        obj[paramName] = paramValue;
      }
    }
  }

  return obj;
}
