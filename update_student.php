<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$id=$_POST['id'];
$student_user_id=$_POST['student_user_id'];
$registration_number=$_POST['registration_number'];
$pg_name=$_POST['pg_name'];
$pg_address=$_POST['pg_address'];
$pg_phone=$_POST['pg_phone'];
$hs_name=$_POST['hs_name'];
$hs_grade=$_POST['hs_grade'];
$hs_year_completed=$_POST['hs_year_completed'];
$program=$_POST['program'];
$lname=$_POST['lname'];
$fname=$_POST['fname'];
$mname=$_POST['mname'];
$address=$_POST['address'];
$gender=$_POST['gender'];
$email = $_POST['email'];
$user = $_SESSION['ID'];
$user_type="STUDENT";
$dob=$_POST['dob'];
$program=$_POST['program'];
 
include 'db.php';

$search_query = mysqli_query($conn, "SELECT * FROM students WHERE REGISTRATION_NUMBER = '$registration_number' and STUDENT_ID != '$id' ");
		$num_row = mysqli_num_rows($search_query);
		if($num_row >= 1){
			echo '<script>alert("Registration number is not available."); location.replace(document.referrer);</script>';

		}else{
			$sql = "UPDATE user set
			 
			 LASTNAME='$lname',FIRSTNAME='$fname',MIDDLE_NAME='$mname',USER_TYPE='$user_type',ADDRESS='$address',GENDER='$gender',EMAIL='$email',DOB='$dob',USERNAME='$email',EMAIL='$email'
			 	where USER_ID = '$student_user_id' ";

		if (mysqli_query($conn, $sql)) {
			$update_stude=$conn->query("UPDATE students SET REGISTRATION_NUMBER='$registration_number',PG_NAME='$pg_name',PG_ADDRESS='$pg_address',PG_PHONE='$pg_phone',HS_NAME='$hs_name',HS_GRADE='$hs_grade',HS_YEAR_COMPLETED='$hs_year_completed',PROGRAM='$program' WHERE STUDENT_ID='$id'");
			if($update_stude){

			}
			else{
				echo $conn->error;

			}

			mysqli_query($conn, "INSERT into history_log (transaction,user_id,date_added) 
		VALUES ('updated $id in the student list','$user',NOW() )");
		echo   "<div id='message' class='erlert-success'><center><h4>" . "Data Successfuly updated." . "</h4></center></div>";
		"<script>
		setTimeout(function(){ $('#message').hide)();  }, 2000); 
		</script>";
		} else {
		    "<script>
			alert('Failed to Submit.');
			 location.replace(document.referrer);
			</script>";
		}


		}
	}
mysqli_close($conn);

  ?>