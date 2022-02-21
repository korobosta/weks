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

	if(count($errors) === 0){
	$unit=$_POST['unit'];
	$student=$_POST['student'];
	$marks=$_POST['marks'];
	$user= $_SESSION['ID'];



	if($_POST['id'] == ""){
		$check_repetition=$conn->query("SELECT * from registered_units WHERE unit='$unit' AND student='$student'");
	if(mysqli_num_rows($check_repetition)>0){
		echo "<b style='color:red'>Unit already registered for student</b> ";

	}

	else{

	if ($sql=mysqli_query($conn, "INSERT into registered_units (unit, student) 
		VALUES ( '$unit', '$student')")){
		mysqli_query($conn, "INSERT into history_log (transaction,user_id,date_added) 
		VALUES ('registered unit for student ','$user',NOW() )");
	echo "<div class='erlert-success col-sm-12 col-sm-offset-2' style='width:300px;z-index:1000;position:fixed;left:500'><center><h4>Unit Registered Successfully </h4></center></div>";
	echo "<script>
	document.getElementsByTagName('body')[0].setAttribute('style', 'filter:blur()');
	setTimeout(function(){	window.location.href='rms.php?page=registered_units';  }, 2000);</script>";
	} else {
		echo "<script>
		alert('Failed to register unit!" .$sql."');
		window.location.href='rms.php?page=registered_units';
		</script>";
		unset($_POST);
 
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
	
		$sql = "UPDATE registered_units SET unit='$unit',student='$student',marks='$marks', date_updated='$date_uploaded' WHERE id='$id'";
		mysqli_query($conn, "INSERT into history_log (transaction,user_id,date_added) 
		VALUES ('updated $id in the semester unit list','$user',NOW() )");

		if (mysqli_query($conn, $sql)) {
			echo "<div class='erlert-success col-sm-12 col-sm-offset-2' style='width:300px;z-index:1000;position:fixed;left:500'><center><h4>Record Successfully Updated.</h4></center></div>";
			echo "<script>
			document.getElementsByTagName('body')[0].setAttribute('style', 'filter:blur()');
			setTimeout(function(){	window.location.href='rms.php?page=registered_units';  }, 2000);</script>";

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