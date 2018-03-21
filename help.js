/* AFFICHAGE POPUP*/

var rotate = 0;

function toggle () {
			if(document.getElementById('viewer-overlay').style.display == "none") {
				rotate += 720;
				$(lienimg).css('transform', 'rotate(' + rotate + 'deg)');
				setTimeout(function(){
           			show('viewer-overlay');
        		}, 150);
				
			}else {
				hide('viewer-overlay');
			}
		}
		window.onload = function() { hide ('viewer-overlay'); };

		var lienimg = document.getElementById('interrogation');
		var img = document.getElementById('viewer-overlay');
		var body = document.body;


		lienimg.addEventListener("click", toggle, false);
		document.getElementById('viewer-overlay').addEventListener("click", toggle, false);


// JavaScript Document