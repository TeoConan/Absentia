<?php

class Student
{
	const MOTIVE_DELAY = 68456903;
	const MOTIVE_UNJUSTIFIED = 30369812;
	
	const SEND_DELAY_NOTE = 62018630;
	const SEND_DELAY_LETTER = 75036920;
	const SEND_NONE = 11598423;
	
	public $_class;
	public $_id;
	public $_hours_missed;
	public $_lesson_missed;
	public $_date;
	public $_name;
	
	public $_send_letter;
	public $_send_sms;
	public $_justificatory;
	public $_motive;
	public $_nbr_absence;
	public $_attachement;
	
	public function __construct($name, $class, $strdate, $missed_hours, $missed_lesson, $attachement, $motive, $send_letter, $send_sms, $justificatory) {
		$this->_id = uniqid('student_');
		if(!empty($name)){
			$this->_name = $name;
		} else {$this->_name = 'NAME MISSING';}
		
		$this->_class = $class;
		$this->_date = $strdate;
		$this->_hours_missed = $missed_hours;
		$this->_lesson_missed = $missed_lesson;
		$this->_attachement = $attachement;
		$this->_motive = $motive;
		$this->_send_letter = $send_letter;
		$this->_send_sms = $send_sms;
		$this->_justificatory = $justificatory;
		$this->_nbr_absence = 1;
	}
	
	public function getOutput(){
		$output = '';
		$output .= $this->_id . ';';
		$output .= $this->_name . ';';
		$output .= $this->_class . ';';
		$output .= $this->_date . ';';
		$output .= $this->_hours_missed . ';';
		$output .= $this->_lesson_missed . ';';
		$output .= $this->_attachement . ';';
		$output .= $this->_motive . ';';
		$output .= $this->_send_letter . ';';
		$output .= $this->_send_sms . ';';
		$output .= $this->_justificatory . ';';
		$output .= $this->_nbr_absence;
		
		return($output);
	}
	
	public function getArrayOutput(){
		$output = $this->getOutput();
		$output = explode(';', $output);
		return($output);
	}
	
	
	
	/*Merge*/
	
	public function merge($other){
		if ($this->_name == $other->_name){
			
		}
	}
	
	
	
}
?>