<?php 
	include('button.php');		
?>
	<div class="popup container">
		<div class="inner">
				<div class="title">
					<h1>Signaler un problème</h1>
					<img src="img/cross-out.svg">
				</div>
				<div class="form">
					<div class="name">
						<img src="img/ic_person_black_24px.svg">

						<input type="text" name="name" id="name" placeholder="Nom prénom">
					</div>
					<div class="mail">
						<img src="img/ic_email_black_24px.svg">
						<input type="text" name="name" id="name" placeholder="Email">
					</div>
				</div>
				<div class="message">
					<div class="text">
						<img src="img/ic_question_answer_black_24px.svg">
						<span>Votre message :</span>
					</div>
					<textarea name="" cols="40" rows=""></textarea>
				</div>
				<div class="button">
					<?php
						$buttonnav = new Button('ENVOYER', true);
						$buttonnav->setLink('Lauralabest');
						echo($buttonnav->getOutput());
					?>
				</div>
		</div>
	</div>
<script type="text/javascript">
