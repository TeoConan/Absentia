<?php

class Button
{
	const COLOR_DEFAULT = '#d0171e';
	const COLOR_WHITE = '#2f3336';
	const COLOR_GREY = '#2f3336';
	
	const BUTTON_TYPE_DEFAULT = 68456903;
	const BUTTON_TYPE_CUSTOM = 30369812;
	
	private $_classes;
	private $_only_use_classes;
	private $_id;
	
	private $_back_color;
	private $_border_radius;
	private $_height;
	private $_width;

	private $_text;
	private $_font_size;
	private $_font_color;
	private $_font_family;
	private $_link;


	public function __construct($text, $default) {
		$this->_text = $text;
		
		if ($default){
			$this->_classes = 'button default';
		} else {
			$this->_classes = '';
			$this->_only_use_classes = true;
		}
	}
	
	/* Functions */
	
	public function getOutput(){
		return('
		<a href="' . $this->_link . '" class="' . $this->_classes . '">
			<span>
				' . $this->_text . '
			</span>
		</a>
		');
	}
	
	/* Unite */
	private function px($px){
		return($px . 'px');
	}
	
	private function rem($rem){
		return($rem . 'rem');
	}
	
		/* Get */

		public function getID(){
			return($this->_id);
		}
	
		public function getBackColor(){
			return($this->_back_color);
		}

		public function getBorderSize(){
			return($this->_border_size);
		}

		public function getBorderColor(){
			return($this->_border_color);
		}
	
		public function getBorderRadius(){
			return($this->_border_radius);
		}

		public function getHeight(){
			return($this->_height);
		}

		public function getWidth(){
			return($this->_width);
		}

		public function getText(){
			return($this->_text);
		}

		public function getFontSize(){
			return($this->_font_size);
		}

		public function getFontColor(){
			return($this->_font_color);
		}
	
		public function getFontFamily(){
			return($this->_font_family);
		}
	
		public function getLink(){
			return($this->_link);
		}

		/* Set */

		public function setID($id){
			$this->_id = $id;
		}
	
		public function setBackColor($color){
			$this->_back_color = $color;
		}
	
		public function setBorderSize($size){
			$this->_border_size = $size;
		}
	
		public function setBorderColor($color){
			$this->_border_color = $color;
		}
	
		public function setBorderRadius($size){
			$this->_border_radius = $size;
		}
	
		public function setHeight($size){
			$this->_height = $size;
		}
	
		public function setWidth($size){
			$this->_width = $size;
		}
	
		public function setText($text){
			$this->_text = $text;
		}
	
		public function setFontSize($size){
			$this->_font_size = $size;
		}
	
		public function setFontColor($color){
			$this->_font_color = $color;
		}
	
		public function setFontFamily($family){
			$this->_font_family = $family;
		}
	
		public function setLink($link){
			$this->_link = $link;
		}
	
	
	
	/* Doc */
	
	private function test(){
		//Bouton par default
		$button1 = new Button('Coucou', true);
		$button1->setLink("google.fr");
		$button1->getOutput();

		//Bouton blanc
		$buttonblanc = new Button('Bouton blanc', true);
		$buttonblanc->setLink("google.fr");
		$buttonblanc->buildByType(Button::BUTTON_TYPE_WHITE);
		$buttonblanc->getOutput();

		//Custom bouton
		$custombutton = new Button('Custom', false);
		$custombutton->setHeight('33px');
		$custombutton->setBackColor(Button::COLOR_RED);
		echo($custombutton->getOutput());
	}
}
?>