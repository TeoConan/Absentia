<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
		<link rel="stylesheet" href="style.css" />
        <title>Test</title>
    </head>
	<?php
		include('../res/includes/button.php');
		//include('../res/includes/item.php');
	
	?>
   
    <body>
	
		
		<div class="button1">
			<?php
				$button1 = new Button('Hey', true);
				$button1->setLink("http://www.espl.fr");
				echo($button1->getOutput());
				
			?>
		</div>
		
		<div class="item1">
			<?php
			
			//$item = new Item('My Digital School', 'Johan');
			
			?>
				
		</div>
   
   <?php
		
		$new = htmlspecialchars("<a href='test'>Test</a>", ENT_QUOTES);
		//echo $new; // &lt;a href=&#039;test&#039;&gt;Test&lt;/a&gt;
		
		$strdecode = 'ASSISTANT DE GESTION 1�ANNEE ALTERNANT';
		$strencode = 'ASSISTANT DE GESTION 1Â°ANNEE ALTERNANT';
		$str = 'ASSISTANT DE GESTION 1°ANNEE ALTERNANT';
		
		echo('<br>' . 'Version decode');
		echo('<br>' . utf8_decode($str));
		echo('<br>' . 'Version encode');
		echo('<br>' . utf8_encode($str));
		echo('<br>' . 'Version normal');
		echo('<br>' . $str);
		
		
		echo('<br>' . 'text decode');
		echo('<br>' . 'Version decode');
		echo('<br>' . utf8_decode($strdecode));
		echo('<br>' . 'Version encode');
		echo('<br>' . utf8_encode($strdecode));
		echo('<br>' . 'Version normal');
		echo('<br>' . $strdecode);
		
		
		
		echo('<br>' . 'text encode');
		echo('<br>' . 'Version decode');
		echo('<br>' . utf8_decode($strencode));
		echo('<br>' . 'Version encode');
		echo('<br>' . utf8_encode($strencode));
		echo('<br>' . 'Version normal');
		echo('<br>' . $strencode);
		
		
		
		echo('<br>');
		echo('<br>');
		echo('<br>');
		
		echo('<br>Décoder ' . $strencode . ' : ' . utf8_decode($strencode));
		
		
		
			
		echo('<br>');
		echo('<br>');
		echo('<br>');echo('<br>');
		echo('<br>');
		echo('<br>');
		
		
		

		$str = '& MARKETING COMMUNICATION PUBLICITE B';
		$strbug = '&amp; MARKETING COMMUNICATION PUBLICITE B';
		
		echo('<br>' . 'Version decode');
		echo('<br>' . utf8_decode($str));
		echo('<br>' . 'Version encode');
		echo('<br>' . utf8_encode($str));
		echo('<br>' . 'Version normal');
		echo('<br>' . $str);
		
		
		echo('<br>' . 'text bug');
		echo('<br>' . 'Version decode');
		echo('<br>' . htmlspecialchars_decode($strbug, ENT_HTML5));
		echo('<br>' . 'Version encode');
		echo('<br>' . utf8_encode($strbug));
		echo('<br>' . 'Version normal');
		echo('<br>' . $strbug);
		
		echo('<br>');
		echo('<br>');
		echo('<br>');
		echo('<br>String est égale au string bug decode ? = ' . (htmlspecialchars_decode($str) == htmlspecialchars_decode($strbug)));
		
		echo('<br>');
		echo('<br>');
		echo('<br>');echo('<br>');
		echo('<br>');
		echo('<br>');echo('<br>');
		echo('<br>');
		echo('<br>');echo('<br>');
		echo('<br>');
		echo('<br>');echo('<br>');
		echo('<br>');
		$lasthours = '0h45';
		$newhours = '2h45';
		echo('AddHours ' . $lasthours . ' + ' . $newhours);
		echo('<br>');
		
		echo(addHours($lasthours, $newhours));
		
		function addHours($strh1, $strh2){
			$tempstr = explode('h', $strh1);
			$h1 = $tempstr[0];
			$m1 = $tempstr[1];
			
			$tempstr = explode('h', $strh2);
			$h2 = $tempstr[0];
			$m2 = $tempstr[1];
			
			$hout = $h1 + $h2;
			$mout = $m1 + $m2;
			if($mout >= 60){
				$hout++;
				
				$mout = $mout - 60;
			}
			$output = ($hout . 'h' . $mout);
			return($output);
		}
	
		
		?>
    </body>
</html>