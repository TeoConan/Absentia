<?php

class Item
{
	const COLOR_DEFAULT = '#d0171e';
	const COLOR_WHITE = '#2f3336';
	const COLOR_VALIDATE = '#2f3336';
	
	const ITEM_TYPE_DEFAULT = 68456903;
	const ITEM_TYPE_CUSTOM = 30369812;
	
	private $_classes;
	private $_only_use_classes;
	private $_id;
	private $_src;

	private $_text;
	private $_responsable;
	private $_link;
	
	private $_selected;


	public function __construct($promo) {
		$this->_text = $promo;
		//$this->_responsable = $resp;
		$this->_selected = false;
		$this->_classes = 'item';
	}
	
	/* Functions */
	
	public function getOutput(){
		return('
		<div class="' . $this->_classes . '">
				<div class="inner">
					<img src="1.jpg" alt="Ajouter" class="icon"/>
					<p>' . $this->_text . ' - 
					<span>' . $this->_responsable . '</span>' '
					</p>
				</div>
			</div>
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

		public function getText(){
			return($this->_text);
		}
	
		public function getResponsable(){
			return($this->_responsable);
		}
	
		public function getLink(){
			return($this->_link);
		}

		/* Set */

		public function setID($id){
			$this->_id = $id;
		}
	
		public function setText($text){
			$this->_text = $text;
		}
	
		public function setResponsable($text){
			$this->_responsable = $text;
		}
	
		public function setLink($link){
			$this->_link = $link;
		}
	
	
	
	/* Doc */
	
	private function test(){
		
	}
}
?>