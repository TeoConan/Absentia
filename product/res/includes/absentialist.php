<?php

class AbsentiaList
{
	
	public $_class;
	public $_id;
	public $_responsable;
	public $_nbr_students;
	public $_students;
	public $_date;
	
	public function __construct($promo, $students) {
		$this->_id = uniqid('absentia_list_');
		$this->_class = $promo;
		$this->_students = $students;
		$this->_nbr_students = sizeof($students);
		$date = getdate();
		if (sizeof($date['mon']) == 1){$date['mon'] = '0' . $date['mon'];}
		$this->_date = $date['mday'] . '/' . $date['mon'] . '/' . $date['year'];
		
		//echo('		Contruct v delete double		');
	}
	
	public function getResponsable(){
		
	}
	
	public function getStudentByName($name){
		$allstudents = $this->_students;
		$output = false;
		
		foreach ($allstudents as $student) {
			if($student->_name == $name){
				$output = $student;
			}
		}
		
		return($output);
	}
	
	public function getStudentIndex($name){
		$allstudents = $this->_students;
		$output = false;
		
		//print_r($this->_students);
		//echo('	Recherche de ' . $name . ' dans un tableau de ' . sizeof($this->_students) . ' cases	/	');
		for ($i = 0; $i < sizeof($this->_students); $i++){
			//echo('	Comparaison recherche : ' . $this->_students[$i]->_name . ' ? ' . $name . ' = ' . ($this->_students[$i]->_name == $name) . ' /		');
			if($this->_students[$i]->_name == $name){
				$output = $i;
			}
		}
		
		if(!is_numeric($output)){
			//echo('		ERREUR dans la recherche d\'un student appelé ' . $name . ' INDEX : ' . $output . ' /		');
		}
		//echo('		Index de recherche de ' . $name . ' : ' . $output . '		/		');
		return($output);
	}
	
	public function exist($student, $remplace){
		$exist = false;
		$array = $this->_students;
		$current_item;

		for($i=0;$i<sizeof($array);$i++){
			$current_item = $array[$i];
			
			if($student->_name == $current_item->_name){
				$exist = true;
				//echo('---------Comparator : ' . $student->_name . ' and ' . $current_item->_name . ' = ' . ($student->_name == $current_item->_name) . '		');
				/*if ($remplace){
					echo('		Remplace ' . $this->_students[$i] . ' by ' . $student->_name);
					$this->_students[$i] = $student;
				}*/
			}
		}

		return $exist;
	}
	
	public function addStudent($student){
		//Ajoute un étudiant uniquement s'il n'existe pas, sinon l'additionner à l'existant
		if($this->exist($student, false)){
			
			
			$current_student = $this->getStudentByName($student->_name);
			
			$index_existing_student = $this->getStudentIndex($student->_name);
			//echo(' addStudent and Merge / index = ' . $index_existing_student . '		');
			$this->_students[$index_existing_student] = $this->mergeStudents($this->_students[$index_existing_student], $student);
			
			
			
		} else {
			$this->_students[] = $student;
		}
		
		
		$this->_nbr_students = sizeof($this->_students);
	}
	
	function addHours($strh1, $strh2){
		//echo('//Add h ' . $strh1 . ' + ' . $strh2. '	//	');
		
		$tempstr = explode('h', $strh1);
		$h1 = $tempstr[0];
		if(!empty($tempstr[1])){
			$m1 = $tempstr[1];
		} else {$m1 = '0';}
		
		//echo('//h1 = ' . intval($h1) . ' + m1 = ' . intval($m1) . '	//	');
		

		$tempstr = explode('h', $strh2);
		$h2 = $tempstr[0];
		if(!empty($tempstr[1])){
			$m2 = $tempstr[1];
		} else {$m2 = '0';}
		
		//echo('//h2 = ' . intval($h2) . ' + m2 = ' . intval($m2) . '	//	');
		
		$hout = intval($h1) + intval($h2);
		$mout = intval($m1) + intval($m2);
		
		//echo('//Actual hout = ' . $hout . ' mout = ' . $mout. '	//	');
		
		if($mout >= 60){
			$hout++;

			//$mout = $mout - 60;
			$mout = "00";
		}
		
		$output = ($hout . 'h' . $mout);
		
		return($output);
	}
	
	public function groupAll(){
		$students = $this->_students;
		$newarray = array();
		
		
		
		//
	}
	
	public function mergeStudents($st1, $st2){
		$output = "";
		
		if (is_numeric($st1->_lesson_missed) &&
			is_numeric($st2->_lesson_missed)) {
			$lessons = (
				$st1->_lesson_missed + $st2->_lesson_missed
			);

			//echo('//	nbr lessons = ' + $lessons);

			if($st1->_hours_missed == null || $st2->_hours_missed == null){
				echo('	//	Missing info for merging hours : st1 = ' . $st1->_hours_missed . ' st2 = ' . $st2->_hours_missed . '	//	');
			} else {
				$hours = $this->addHours($st1->_hours_missed, $st2->_hours_missed);
			}
			
			$sms = $st1->_send_sms;
			if ($sms == 'Aucun destinataire SMS' || $sms == 'Aucun'){
				$sms = $st2->_send_sms;
			}

			$letter = $st1->_send_letter;
			if ($letter == 'Aucun'){
				$letter = $st2->_send_letter;
			}


			if(!empty($st1->_date || !empty($st2->_date))){
				$date = $st1->_date . ' & ' . $st2->_date;
			}

			$newst = new Student($st1->_name, $st1->_class, $date, $hours, $lessons, $st1->_attachement, $st1->_motive, $letter, $sms, $st1->_justificatory);
			$output = $newst;

			/*echo('		ST1  : ');
			print_r($st1);
			echo('		ST2  : ');
			print_r($st2);
			echo('		MERGE result : ');
			print_r($newst);*/
		}
		
			
		
		return($output);
	}
	
	public function delete_double(){
		$students = $this->_students;
		$newarray = array();
		
		for($i = 1; $i < sizeof($students); $i++){
			if (!exist_in_tab($students[$i], $students)){
				$newarray[] = $students[$i];
			}
		}
	}
	
	public function remove_double($array, $replace){
		$newarray = array();

		for($i = 1; $i < sizeof($array); $i++){
			if (!exist_in_tab($array[$i]->_name, $newarray)){
				$newarray[] = $array[$i];
			}
		}

		if ($replace){
			$this->_students = $newarray;
		}
		
		return($newarray);
	}
	
	public function getStudents(){
		return($this->_students);
	}
	
	function exist_in_tab($key, $array) {
		$exist = false;

		foreach($array as $elem){
			if($key->_name == $elem->_name){
				$exist = true;
				//echo('---------Comparator : ' . $key->_name . ' and ' . $elem->_name . ' = ' . ($key->_name == $elem->_name) . '		');
			}
		}

		return $exist;
	}
}
?>