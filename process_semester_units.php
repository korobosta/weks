<?php 

	include 'db.php';
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$errors = array();

	if(preg_match("/\S+/", $_POST['unit']) === 0){
		$errors['unit'] = "* Unit is required.";
	}
	if(preg_match("/\S+/", $_POST['semester']) === 0){
		$errors['semester'] = "* Semester is required.";
	}

	if(count($errors) === 0){


	$unit=$_POST['unit'];
	$semester=$_POST['semester'];
	$user= $_SESSION['ID'];



	if($_POST['id'] == ""){
		$check_repetition=$conn->query("SELECT * from semester_units WHERE unit='$unit'");
	if(mysqli_num_rows($check_repetition)>0){
		echo "<b style='color:red'>Unit already configured</b> ";

	}

	else{

	

	if ($sql=mysqli_query($conn, "INSERT into semester_units (unit, semester) 
		VALUES ( '$unit', '$semester')")){
		mysqli_query($conn, "INSERT into history_log (transaction,user_id,date_added) 
		VALUES ('added semister unit configuraion','$user',NOW() )");
	echo "<div class='erlert-success col-sm-12 col-sm-offset-2' style='width:300px;z-index:1000;position:fixed;left:500'><center><h4>Record added Successfully </h4></center></div>";
	echo "<script>
	document.getElementsByTagName('body')[0].setAttribute('style', 'filter:blur()');
	setTimeout(function(){	window.location.href='rms.php?page=semester_units';  }, 2000);</script>";
	} else {
		echo "<script>
		alert('Failed to add record!" .$sql."');
		window.location.href='rms.php?page=semester_units';
		</script>";
		unset($_POST);
 
	}
	}
    }else{
		$id=$_POST['id'];
		$check_repetition=$conn->query("SELECT id from semester_units WHERE unit='$unit' AND id != '$id'");
	if(mysqli_num_rows($check_repetition)>0){
		echo "<b style='color:red'>Unit already configured</b> ";

	}
	else{
	
		$sql = "UPDATE semester_units SET unit='$unit',semester='$semester' WHERE id='$id'";
		mysqli_query($conn, "INSERT into history_log (transaction,user_id,date_added) 
		VALUES ('updated $id in the semester unit list','$user',NOW() )");

		if (mysqli_query($conn, $sql)) {
			echo "<div class='erlert-success col-sm-12 col-sm-offset-2' style='width:300px;z-index:1000;position:fixed;left:500'><center><h4>Record Successfully Updated.</h4></center></div>";
			echo "<script>
			document.getElementsByTagName('body')[0].setAttribute('style', 'filter:blur()');
			setTimeout(function(){	window.location.href='rms.php?page=semester_units';  }, 2000);</script>";

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