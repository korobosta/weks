<?php
function calculate_grade($marks){
	$grade="";
	if ($marks>70){
		$grade='A';
	}
	else if ($marks>=60 & $marks<70){
		$grade='B';
	}
	else if ($marks>=50 & $marks<60){
		$grade='C';
	}
	else if ($marks>=40 & $marks<50){
		$grade='D';
	}
	else if ($marks<40 & !empty($marks)){
		$grade='E';
	}

	return $grade;

}
?>