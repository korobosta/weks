<?php 

	include 'db.php';
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$errors = array();

	if(preg_match("/\S+/", $_POST['student']) === 0){
		$errors['course'] = "* Course is required.";
	}
	if(preg_match("/\S+/", $_POST['semester']) === 0){
		$errors['semester'] = "* Semester is required.";
	}
	if(preg_match("/\S+/", $_POST['amount']) === 0){
		$errors['amount'] = "* Amount is required.";
	}

	if(preg_match("/\S+/", $_POST['school_year']) === 0){
		$errors['school_year'] = "* School Year is required.";
	}
	if(count($errors) === 0){


	$student=$_POST['student'];
	$semester=$_POST['semester'];
	$amount=$_POST['amount'];
	$school_year=$_POST['school_year'];
	$study_year=$_POST['study_year'];
	$user= $_SESSION['ID'];
	$payment_method=$_POST['payment_method'];
	$paid_by=$_POST['paid_by'];
	$date_of_payment=$_POST['date_of_payment'];



	if($_POST['id'] == ""){
		$check_repetition=$conn->query("SELECT * from payments WHERE student='$student' AND semester='$semester' AND school_year='$school_year' AND study_year='$study_year'");
	if(mysqli_num_rows($check_repetition)>0){
		echo "<b style='color:red'>The Student has already paid fee for that semester</b> ";

	}

	else{

		$payment_date=date('Y-m-d H:i:s');

	if ($sql=mysqli_query($conn, "INSERT into payments (student, semester, amount,school_year,study_year,payment_date,payment_method,paid_by,date_of_payment) 
		VALUES ('$student', '$semester', '$amount','$school_year','$study_year','$payment_date','$payment_method','$paid_by','$date_of_payment')")){
		$payment_id=mysqli_insert_id($conn);
		mysqli_query($conn, "INSERT into history_log (transaction,user_id,date_added) 
		VALUES ('recorded fee for student $student','$user',NOW() )");
	echo "<div class='erlert-success col-sm-12 col-sm-offset-2' style='width:300px;z-index:1000;position:fixed;left:500'><center><h4>Fee Record added Successfully </h4></center></div>";
	echo "<script>
	document.getElementsByTagName('body')[0].setAttribute('style', 'filter:blur()');
	setTimeout(function(){	window.location.href='print.php?id=".$payment_id."';  }, 2000);</script>";
	} else {
		echo "<script>
		alert('Failed to add record!" .$sql."');
		window.location.href='rms.php?page=record_payment';
		</script>";
		unset($_POST);
 
	}
	}}else{
		$id=$_POST['id'];
		$check_repetition=$conn->query("SELECT id from payments WHERE student='$student' AND semester='$semester' AND school_year='$school_year' AND study_year='$study_year' AND id != '$id'");
	if(mysqli_num_rows($check_repetition)>0){
		echo "<b style='color:red'>Student has already paid fee</b> ";

	}
	else{
	
		$sql = "UPDATE payments SET student='$student',semester='$semester',amount='$amount',school_year='$school_year',study_year='$study_year',paid_by='$paid_by',date_of_payment='date_of_payment' WHERE id='$id'";
		mysqli_query($conn, "INSERT into history_log (transaction,user_id,date_added) 
		VALUES ('updated payment $id','$user',NOW() )");

		if (mysqli_query($conn, $sql)) {
			echo "<div class='erlert-success col-sm-12 col-sm-offset-2' style='width:300px;z-index:1000;position:fixed;left:500'><center><h4>Record Successfully Updated.</h4></center></div>";
			echo "<script>
			document.getElementsByTagName('body')[0].setAttribute('style', 'filter:blur()');
			setTimeout(function(){	window.location.href='rms.php?page=record_payment';  }, 2000);</script>";

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