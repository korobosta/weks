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

		$payment_date=date('Y-m-d H:i:s');

		$student_record=mysqli_query($conn,"SELECT fee_balance FROM students where STUDENT_ID='$student' LIMIT 1");
		$student_record=mysqli_fetch_assoc($student_record);

		$fee_balance=$student_record['fee_balance'];

		$new_fee_balance=$fee_balance-$amount;

		if ($sql=mysqli_query($conn, "INSERT into payments (student, semester, amount,school_year,study_year,payment_date,payment_method,paid_by,date_of_payment) 
			VALUES ('$student', '$semester', '$amount','$school_year','$study_year','$payment_date','$payment_method','$paid_by','$date_of_payment')")){

			$payment_id=mysqli_insert_id($conn);

			mysqli_query($conn, "INSERT into history_log (transaction,user_id,date_added) 
				VALUES ('recorded fee for student $student','$user',NOW() )");

			mysqli_query($conn,"UPDATE students SET fee_balance='$new_fee_balance' WHERE STUDENT_ID='$student'");

			echo "<div class='erlert-success col-sm-12 col-sm-offset-2' style='width:300px;z-index:1000;position:fixed;left:500'><center><h4>Fee Record added Successfully </h4></center></div>";

			echo "<script>
			document.getElementsByTagName('body')[0].setAttribute('style', 'filter:blur()');
			setTimeout(function(){	window.location.href='print.php?id=".$payment_id."';  }, 2000);</script>";

		} 
		else {
			echo "<script>
			alert('Failed to add record!" .$student."');
			window.location.href='rms.php?page=fee_balances';
			</script>";
			unset($_POST);
		}
	}
	else{
		echo "<script>setTimeout(function(){	$('.erlert').hide()  }, 3000);</script>";
	}
}
mysqli_close($conn);

?>