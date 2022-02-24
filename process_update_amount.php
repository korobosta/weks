<?php 
include 'db.php';
$school_year=$_POST['school_year'];
$semester=$_POST['semester'];
$student=$_POST['student'];
$study_year=$_POST['study_year'];

$student=$conn->query("SELECT PROGRAM from students where STUDENT_ID='$student'");
$student=mysqli_fetch_assoc($student);
$course_id=$student['PROGRAM'];

$amount=$conn->query("SELECT amount from fee where semester='$semester' AND school_year='$school_year' AND course='$course_id' AND study_year='$study_year'");
if (!$amount){
	echo $conn->error;
}
$amount=mysqli_fetch_assoc($amount);
$amount=$amount['amount'];
echo $amount;

?>