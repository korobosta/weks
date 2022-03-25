<?php 

	include 'db.php';
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$errors = array();

	if(preg_match("/\S+/", $_POST['unit']) === 0){
		$errors['unit'] = "* Unit is required.";
	}
	if(preg_match("/\S+/", $_POST['student']) === 0){
		$errors['student'] = "* Student is required.";
	}

	$cat_marks=$_POST['cat_marks'];
	$main_exam_marks=$_POST['main_exam_marks'];
	$marks=null;
	if($cat_marks != ''){
		if($main_exam_marks != ''){
			$marks=$cat_marks+$main_exam_marks;
		} 
		else{
			$main_exam_marks=null;
		}		
	}
	else{
		$cat_marks=null;
		if($main_exam_marks != ''){
			$errors['main_exam_marks'] = "* You cannot enter main exam marks before cat marks";
		}
		else{
			$marks=null;
		}
	}

	$extra_update_sql="";

	if(!empty($cat_marks)){
		$extra_update_sq=",'cat_marks'='$cat_marks'";
	}
	if(!empty($main_exam_marks)){
		$extra_update_sq=",'main_exam_marks'='$main_exam_marks'";
	}
	if(!empty($marks)){
		$extra_update_sq=",'marks'='$marks'";
	}

	

	if(count($errors) === 0){
	$unit=$_POST['unit'];
	$student=$_POST['student'];
	$user= $_SESSION['ID'];

	$current_study_year=$conn->query("SELECT study_year from students WHERE STUDENT_ID='$student' LIMIT 1");
	$current_study_year=mysqli_fetch_assoc($current_study_year);
	$current_study_year=$current_study_year['study_year'];

	$current_school_year=$conn->query("SELECT SY_ID from school_year WHERE status='Yes' LIMIT 1");
	$current_school_year=mysqli_fetch_assoc($current_school_year);
	$current_school_year=$current_school_year['SY_ID'];

	$current_semester=$conn->query("SELECT grade_id from grade WHERE status='Yes' LIMIT 1");
	$current_semester=mysqli_fetch_assoc($current_semester);
	$current_semester=$current_semester['grade_id'];



	if($_POST['id'] == ""){
		$check_repetition=$conn->query("SELECT * from registered_units WHERE unit='$unit' AND student='$student'");
	if(mysqli_num_rows($check_repetition)>0){
		echo "<b style='color:red'>Unit already registered for student</b> ";
		echo "<script>
	document.getElementsByTagName('body')[0].setAttribute('style', 'filter:blur()');
	setTimeout(function(){	window.location.href='rms.php?page=unit_students&id=".$unit."';  }, 1000);</script>";

	}

	else{

		$fee_payment=$conn->query("SELECT id FROM payments WHERE student='$student' AND semester='$current_semester' AND study_year='$current_study_year' AND school_year='$current_school_year'");
		if(mysqli_num_rows($fee_payment) < 1){
			echo "<b style='color:red'>Fee payment not done</b> ";
			echo "<script>
	document.getElementsByTagName('body')[0].setAttribute('style', 'filter:blur()');
	setTimeout(function(){	window.location.href='rms.php?page=unit_students&id=".$unit."';  }, 1000);</script>";

		}
		else{

	if ($sql=mysqli_query($conn, "INSERT into registered_units (unit, student,school_year,semester,study_year,cat_marks,main_exam_marks) 
		VALUES ('$unit', '$student','$current_school_year','$current_semester','$current_study_year','$cat_marks','$main_exam_marks')")){
		mysqli_query($conn, "INSERT into history_log (transaction,user_id,date_added) 
		VALUES ('registered unit for student ','$user',NOW() )");
	    echo "<div class='erlert-success col-sm-12 col-sm-offset-2' style='width:300px;z-index:1000;position:fixed;left:500'><center><h4>Unit Registered Successfully </h4></center></div>";
	  echo "<script>
	document.getElementsByTagName('body')[0].setAttribute('style', 'filter:blur()');
	setTimeout(function(){	window.location.href='rms.php?page=unit_students&id=".$unit."';  }, 2000);</script>";
	} else {
		echo "<script>
		alert('Failed to register unit!" .$sql."');
		window.location.href='rms.php?page=unit_students&id=".$unit."';
		</script>";
		unset($_POST);
 
	}
}
	}
    }else{
		$id=$_POST['id'];

		$check_repetition=$conn->query("SELECT id from registered_units WHERE unit='$unit' AND student='$student' AND id != '$id'");
	if(mysqli_num_rows($check_repetition)>0){
		echo "<b style='color:red'>Unit already registered</b> ";

	}
	else{
		$date_uploaded=date('Y-m-d H:i:s');
	
		$sql = "UPDATE registered_units SET unit='$unit',student='$student',marks='$marks', date_updated='$date_uploaded'".$extra_update_sql." WHERE id='$id'";
		mysqli_query($conn, "INSERT into history_log (transaction,user_id,date_added) 
		VALUES ('updated $id in the semester unit list','$user',NOW() )");

		if (mysqli_query($conn, $sql)) {
			echo "<div class='erlert-success col-sm-12 col-sm-offset-2' style='width:300px;z-index:1000;position:fixed;left:500'><center><h4>Record Successfully Updated.</h4></center></div>";
			echo "<script>
			document.getElementsByTagName('body')[0].setAttribute('style', 'filter:blur()');
			setTimeout(function(){	window.location.href='rms.php?page=unit_students&id=".$unit."';  }, 2000);</script>";

		} else {
    echo "Error updating record: " . mysqli_error($conn);
		}
	}}
}else{
	echo "<script>setTimeout(function(){	$('.erlert').hide()  }, 3000);</script>";
}

}

	mysqli_close($conn);

 ?>