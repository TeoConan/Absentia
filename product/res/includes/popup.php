<div class="popup container" id="popup">
		<div class="inner">
				<div class="title">
					<h1>Signaler un problème</h1>
					<img src="img/cross-out.svg" id="close">
				</div>
				<div class="form">
					<div class="name">
						<img src="img/ic_person_black_24px.svg">

						<input type="text" name="name" id="input_name" placeholder="Nom prénom">
					</div>
					<div class="mail">
						<img src="img/ic_email_black_24px.svg">
						<input type="text" name="name" id="input_mail" placeholder="Email">
					</div>
				</div>
				<div class="message">
					<div class="text">
						<img src="img/ic_question_answer_black_24px.svg">
						<span>Votre message :</span>
					</div>
					<textarea name="" cols="40" rows="" maxlength="400" id="input_message"></textarea>
				</div>
				
				<p id="text" style="display: none;">Des champs n'ont pas étés saisis</p>
				
				<div class="button">
					<?php
						$buttonnav = new Button('ENVOYER', true);
						$buttonnav->setID('button_send');
						echo($buttonnav->getOutput());
					?>
				</div>
		</div>
	</div>